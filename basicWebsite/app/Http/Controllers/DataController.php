<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\Post;
use App\Models\HomeSlider;
use App\Models\User;
class DataController extends Controller
{
    public function category(){
        return view('admin.add_category');
    }
    public function uCategory(){
        return view('user.add_category');
    }
    public function addCat(Request $request){
        $validated = $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:categories',
        ],[
            'name.required' => 'لطفا این فیلد را پر کنید',
            'slug.required' => 'لطفا این فیلد را پر کنید',
            'slug.unique' => 'اسلاگ تکراری است',
        ]);
        $category=new Category();
        $category->name=$request->name;
        $category->slug=$request->slug;
        $category->save();
        return redirect()->back()->with('message','دسته با موفقیت ایجاد شد');
    }
    public function post(){
        $categories=Category::all();
        return view('admin.add_post',compact('categories'));
    }
    public function uPost(){
        $categories=Category::all();
        return view('user.add_post',compact('categories'));
    }
    public function addPost(Request $request){
        $validated = $request->validate([
            // 'name' => 'required',
            // 'slug' => 'required|unique:categories',
            'description' => 'required',
            'category_id' => 'required',
            'image' => 'required'
        ],[
            // 'name.required' => 'لطفا این فیلد را پر کنید',
            // 'slug.required' => 'لطفا این فیلد را پر کنید',
            // 'slug.unique' => 'اسلاگ تکراری است',
            'description.required' => 'لطفا این فیلد را پر کنید',
            'category_id.required' => 'لطفا دسته را تعیین کنید ',
            'image.required' => 'لطفا این فیلد را پر کنید',
        ]);
        $post=new Post();
        $post->name=$request->p_name;
        $post->slug=$request->p_slug;
        $post->description=$request->description;
        $post->category_id =$request->category_id;
        $post->user_id=Auth::user()->id;

        $image=$request->file('image');
        $unicName=hexdec(uniqid());
        $extension=strtolower($image->getClientOriginalExtension());
        $imageName=$unicName. '.' .$extension;
        $locat="image/post/";
        $image->move($locat,$imageName);
        $tableName=$locat.$imageName;

        $post->image=$tableName;

        $post->save();
        return redirect()->back()->with('message','پست با موفقیت ایجاد شد');
    }
    public function deletePost($id){
        $post=Post::find($id);
        unlink($post->image);
        $post->delete();
        return redirect()->back()->with('message','پست با موفقیت حدف شد');
    }
    public function deleteCategory($id){
        $category=Category::find($id);
        $category->delete();
        return redirect()->back()->with('message','دسته با موفقیت حدف شد');
    }
    public function Slider(){
        return view('admin.add_slider');
    }
    public function addSlider(Request $request){
        $validated = $request->validate([
            'title' => 'required',
            'link' => 'required',
            'description' => 'required',
            'status' => 'required',
            'image' => 'required'
        ],[
            'title.required' => 'لطفا این فیلد را پر کنید',
            'link.required' => 'لطفا این فیلد را پر کنید',
            'description.required' => 'لطفا این فیلد را پر کنید',
            'status.required' => 'لطفا دسته را تعیین کنید ',
            'image.required' => 'لطفا این فیلد را پر کنید'
        ]);
            $slider=new HomeSlider();
            $slider->title=$request->title;
            $slider->description=$request->description;
            $slider->link=$request->link;
            $slider->status=$request->status;

            $image=$request->file('image');
            $unicName=hexdec(uniqid());
            $extension=strtolower($image->getClientOriginalExtension());
            $imageName=$unicName. '.' .$extension;
            $locat="image/slider/";
            $image->move($locat,$imageName);
            $tableName=$locat.$imageName;

            $slider->image=$tableName;

            $slider->save();
            return redirect()->back()->with('message','اسلایدر با موفقیت اضافه شد');
    }
    public function deleteSlider($id){
        $slider=HomeSlider::find($id);
        $slider->delete();
        return redirect()->back()->with('message','اسلایدر با موفقیت حدف شد');
    }
    public function usersPost(){
        $posts=Post::latest()->take(9)->get();
        return view('users_post',compact('posts'));
    }
    public function details($id){
        $post=Post::where('id',$id)->first();
        return view('details',compact('post'));
    }
    public function users(){
        $users=User::whereNotNull('bio')->whereNotNull('status')->where('utype','USR')->take(9)->get();
        return view('show_user',compact('users'));
    }
    public function teams(){
        $users=User::where('utype','ADM')->take(3)->get();
        return view('show_team',compact('users'));
    }
    public function showPostInCategory($id){
        $category=Category::where('id',$id)->first();
        $category_id=$category->id;
        $category_name=$category->name;
        $posts=Post::where('category_id',$category_id)->get();
        return view('show_post',compact('posts','category_name'));
    }
    public function userPostsPage($id){
        $user=User::where('id',$id)->first();
        $user_id=$user->id;
        $user_name=$user->name;
        $posts=Post::where('user_id',$user_id)->get();
        return view('user_page',compact('posts','user_name'));
    }
}
