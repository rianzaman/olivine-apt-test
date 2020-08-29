<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Traits\SlugHelper;
use App\User;
use Auth;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    use SlugHelper;

    public function profile(){
        $data['breadcrumb'] = 'Profile info';
        $data['breadcrumb_brief'] = 'Manage your profile info from here.';
        $data['user'] = User::withTrashed()->where('id',Auth::user()->id)->first();
        return view('backend.admins.profile.index',$data);
    }

    public function update_profile(User $user, Request $request){
     $request->validate([
         'name' => 'required',
         'password' => 'confirmed',
         'image' => 'nullable|image|max:2000'
     ]);

     $user->name = $request->name;
     if ($request->password) {
         $user->password = bcrypt($request->password);
     }
     if($request->file('image')){
        $image = $request->file('image');
        $pre = substr(uniqid(), 7, 6);
        $directory = 'uploads/admins/'.$this->str_slug($request->name).'/';
        $extension = strtolower($image->getClientOriginalExtension());
        $full_name = $pre.'_'.'image_of_'.$this->str_slug($request->name).'.'. $extension;
        $image->move($directory, $full_name);
        $path = $directory.$full_name;
        $user->image = $path;
    }
    $user->save();
    Toastr::success('Profile update successfully','Updated');
    return redirect()->back();


}
}
