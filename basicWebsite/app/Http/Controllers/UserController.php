<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{

    public function logout(){
        Auth::logout();
        return redirect()->route('login')->with('message','کاربر گرامی شما با موفقیت خارج شدید');
    }
    public function changePass(){
        if(Auth::user()->utype === 'ADM'){
            return view('admin.profile.change_pass');
        }else{
            return view('user.profile.change_pass');
        }
    }
    public function updatePass(Request $request){
         $validated = $request->validate([
            'oldpass' => 'required',
            'password' => 'required|confirmed',
        ],[
            'oldpass.required' => 'لطفا این فیلد را پر کنید',
            'password.required' => 'لطفا این فیلد را پر کنید',
            'password.confirmed' => 'تکرار پسورد اشتباه بود',
        ]);
        $tableHashPass=Auth::user()->password;
        if(Hash::check($request->oldpass,$tableHashPass)){
            $user=User::find(Auth::user()->id);
            $user->password=Hash::make($request->password);
            $user->save();
            Auth::logout();
            return redirect()->route('login')->with('message','کاربر گرامی پسورد شما با موفقیت تغییر یافت');
        }else{
            return redirect()->back()->with('message','کاربر گرامی پسورد فعلی شما نامعتبر است لطفا دوباره تلاش کنید');
        }
    }
    public function profile(){
        $user=User::find(Auth::user()->id);
        if(Auth::user()->utype === 'ADM'){
            return view('admin.profile.info',compact('user'));
        }else{
            return view('user.profile.info',compact('user'));
        }
    }
    public function updateImage(Request $request,$id){
        $user=User::find($id);
        if($user->status === 1){
            //delete
            unlink($user->profile_photo_path);
            $user->status=0;
            $user->save();
            return redirect()->back()->with('message','عکس پروفایل با موفقیت حدف شد');
        }else{
            //upload
            $image=$request->file('image');
            $unicName=hexdec(uniqid());
            $extension=strtolower($image->getClientOriginalExtension());
            $imageName=$unicName. '.' .$extension;
            $locat="image/profile/";
            $image->move($locat,$imageName);
            $tableName=$locat.$imageName;
            $user->profile_photo_path=$tableName;
            $user->status=1;
            $user->save();
            return redirect()->back()->with('message','عکس پروفایل با موفقیت بارگذاری شد');
        }
    }

    public function updateProfile(Request $request,$id){
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required',
        ],[
            'name.required' => 'لطفا این فیلد را پر کنید',
            'email.required' => 'لطفا این فیلد را پر کنید',
        ]);
        $user=User::find($id);
        $user->name=$request->name;
        $user->email=$request->email;
        if($request->bio)
        {
            $user->bio=$request->bio;
        }
        $user->save();
        return redirect()->back()->with('message','اطلاعات پروفایل با موفقیت به روز رسانی شد');
    }
}
