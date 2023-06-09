<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function UserDashboard()
    {
        $id = Auth::user()->id;
        $userData = User::find($id);
        return view('index', compact('userData'));
    } //End Method
    public function UserProfileStore(Request $request)
    {
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->name = $request->name;

        $current_phone_number = User::find($id)->phone;
        $current_email = User::find($id)->email;
        if ($current_phone_number == $request->phone && $current_email == $request->email) {
            if ($request->file('photo')) {
                $request->validate([
                    'photo' => 'image|max:2048'
                ], [
                    'photo.image' => 'The uploaded file must be an image in one of the following formats: jpg, jpeg, png, bmp, gif, svg, or webp.',
                    'photo.max' => 'The maximum upload image size is 2MB.',
                ]);
                $file = $request->file('photo');
                $filename = hexdec(uniqid()) . '_user' . '.' . $file->getClientOriginalExtension();
                @unlink(public_path('upload/user_images/' . $data->photo));
                $file->move(public_path('upload/user_images/'), $filename);
                $data['photo'] = $filename;
            }
            $data->save();
            $notification = array(
                'message' => 'User Profile Updated Successfully!',
                'alert-type' => 'success',
            );
            return redirect()->back()->with($notification);
        } else if ($current_phone_number != $request->phone && $current_email == $request->email) {
            $request->validate([
                'phone' => ['unique:' . User::class],
            ], [
                'phone.unique' => 'The phone number already exists. Please enter another phone number.'
            ]);
            if ($request->file('photo')) {
                $request->validate([
                    'photo' => 'image|max:2048'
                ], [
                    'photo.image' => 'The uploaded file must be an image in one of the following formats: jpg, jpeg, png, bmp, gif, svg, or webp.',
                    'photo.max' => 'The maximum upload image size is 2MB.',
                ]);
                $file = $request->file('photo');
                $filename = hexdec(uniqid()) . '_user' . '.' . $file->getClientOriginalExtension();
                @unlink(public_path('upload/user_images/' . $data->photo));
                $file->move(public_path('upload/user_images/'), $filename);
                $data['photo'] = $filename;
            }
            $data->phone = $request->phone;
            $data->save();
            $notification = array(
                'message' => 'User Profile Updated Successfully!',
                'alert-type' => 'success',
            );
            return redirect()->back()->with($notification);
        } else if ($current_phone_number == $request->phone && $current_email != $request->email) {
            $request->validate([
                'email' => ['unique:' . User::class],
            ], [
                'email.unique' => 'The email already exists. Please enter another email.'
            ]);
            if ($request->file('photo')) {
                $request->validate([
                    'photo' => 'image|max:2048'
                ], [
                    'photo.image' => 'The uploaded file must be an image in one of the following formats: jpg, jpeg, png, bmp, gif, svg, or webp.',
                    'photo.max' => 'The maximum upload image size is 2MB.',
                ]);
                $file = $request->file('photo');
                $filename = hexdec(uniqid()) . '_user' . '.' . $file->getClientOriginalExtension();
                @unlink(public_path('upload/user_images/' . $data->photo));
                $file->move(public_path('upload/user_images/'), $filename);
                $data['photo'] = $filename;
            }
            $data->email = $request->email;
            $data->save();
            $notification = array(
                'message' => 'User Profile Updated Successfully!',
                'alert-type' => 'success',
            );
            return redirect()->back()->with($notification);
        } else if ($current_phone_number != $request->phone && $current_email != $request->email) {
            $request->validate([
                'email' => ['unique:' . User::class],
                'phone' => ['unique:' . User::class],
            ], [
                'email.unique' => 'The email already exists. Please enter another email.',
                'phone.unique' => 'The phone number already exists. Please enter another phone number.'
            ]);
            if ($request->file('photo')) {
                $request->validate([
                    'photo' => 'image|max:2048'
                ], [
                    'photo.image' => 'The uploaded file must be an image in one of the following formats: jpg, jpeg, png, bmp, gif, svg, or webp.',
                    'photo.max' => 'The maximum upload image size is 2MB.',
                ]);
                $file = $request->file('photo');
                $filename = hexdec(uniqid()) . '_user' . '.' . $file->getClientOriginalExtension();
                @unlink(public_path('upload/user_images/' . $data->photo));
                $file->move(public_path('upload/user_images/'), $filename);
                $data['photo'] = $filename;
            }
            $data->email = $request->email;
            $data->phone = $request->phone;
            $data->save();
            $notification = array(
                'message' => 'User Profile Updated Successfully!',
                'alert-type' => 'success',
            );
            return redirect()->back()->with($notification);
        }
    } // End Mehtod
    public function UserLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $notification = array(
            'message' => 'Logged Out Successfully!',
            'alert-type' => 'success',
        );

        return redirect('/login')->with($notification);
    } // End Mehtod
    public function UserUpdatePassword(Request $request)
    {
        //Match the old password
        if (!Hash::check($request->old_password, auth::user()->password)) {
            $notification = array(
                'message' => "Old Password Doesn't Match!",
                'alert-type' => 'error',
            );
            return redirect()->back()->with($notification);
        }
        //Update the new password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);
        $notification = array(
            'message' => 'Password Changed Successfully!',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    } //End Method
}
