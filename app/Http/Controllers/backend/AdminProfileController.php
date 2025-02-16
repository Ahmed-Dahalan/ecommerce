<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Intervention\Image\Facades\Image;
use Symfony\Component\HttpFoundation\Response;

class AdminProfileController extends Controller
{
    //

    public function index(){
        return view('cms.profile.index');
    }

    public function EditProfile(){
       $guard =  Auth::guard('admin')->check()?'admin':'web';
        return view('cms.profile.edit',compact('guard'));
    }

    public function StoreProfile(Request $request,$id){

        $admin = Admin::find($id);
        if ($request->file('profile_image')) {
            $image = $request->file('profile_image');
            @unlink(public_path('upload/admin_image/'.$admin->image));
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();  // 3434343443.jpg

            Image::make($image)->resize(200, 200)->save('upload/admin_image/' . $name_gen);
            $save_url =  $name_gen;

            Admin::findOrFail($id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'image' => $save_url,

            ]);
            $notification = array(
                'message' => 'Blog Updated with Image Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('cms.profile')->with($notification);
        } else {

            Admin::findOrFail($id)->update([
                'name' => $request->name,
                'email' => $request->email,

            ]);

            $notification = array(
                'message' => 'Blog Updated without Image Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('cms.profile')->with($notification);
        } // end Else
    }

    public function editPassword()
    {
        $guard =  Auth::guard('admin')->check() ? 'admin' : 'web';
        return response()->view('cms.profile.edit-password',compact('guard'));
    }

    public function updatePassword(Request $request)
    {
        $guard = auth('admin')->check() ? 'admin' : 'patient';
        $validator = validator($request->all(), [
            'old_password' => 'required|current-password:' . $guard,
            'new_password' => ['required', 'confirmed', Password::min(8)->letters()->symbols()->mixedCase()->uncompromised()]

        ]);
        if (!$validator->fails()) {
            $user = $request->user();
            $user->forceFill([
                'password' => Hash::make($request->input('new_password')),
            ]);
            $isSaved = $user->save();
            $notification = array(
                'message' => $isSaved ? 'update change password Successfully' : 'update change password faild',
                'alert-type' => 'success'
            );

            return redirect()->route('cms.profile')->with($notification);       
         } 
            else {
            return response()->json(['message' => $validator->getMessageBag()->first()], Response::HTTP_BAD_REQUEST);
        }
    }

    public function AllUsers()
    {
        $users = User::latest()->get();
        return view('cms.user.all_user', compact('users'));
    }
}
