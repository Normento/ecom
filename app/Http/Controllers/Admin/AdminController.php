<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Intervention\Image\Facades\Image;

class AdminController extends Controller
{
    public function  dashboard() {
        return view('admin.dashboard');
    }

    public function updateAdminPassword(Request $request){
        if ($request->isMethod('post')) {
            $data = $request->all();
            //check if current password entered by admin is correct
            if (Hash::check($data['current_password'], Auth::guard('admin')->user()->password)) {
                //check if the password and comfirmation password are same
                if ($data['comfirm_password'] == $data['new_password']) {
                    Admin::where('id', Auth::guard('admin')->user()->id)->update([
                        'password' => bcrypt($data['new_password'])
                    ]);
                    return redirect()->back()->with('success_message', 'Your password has been updated succesfully');
                }else{
                    return redirect()->back()->with('error_message', 'Your new password & comfirm password does not match');
                }
            }else{
                return redirect()->back()->with('error_message','Your current password is incorrect');
            }
        }
        $adminDetails = Admin::where('email',Auth::guard('admin')->user()->email)->first()->toArray();
        return view('admin.settings.update_admin_password')->with(compact('adminDetails'));
    }

    public function updateAdminDetails(Request $request){
        if ($request->isMethod('post')) {
            $data = $request->all();
            $rules =[
                'admin_name' => 'required|max:255|min:5|regex:/(^([a-zA-z]+)(\d+)?$)/u',
                'admin_mobile' => 'required|numeric|'
            ];
            $this->validate($request,$rules);
            //upload admin photo
            if ($request->hasFile('admin_image')) {
                $image_tmp = $request->file('admin_image');
                if ($image_tmp->isValid()) {
                    //get image extention
                    $extension = $image_tmp->getClientOriginalExtension();
                    //generate new image name
                    $imageName = rand(111,99999).'.'.$extension;
                    $imagePath = 'admin/images/photos/'.$imageName;
                    //upload the image
                    Image::make($image_tmp)->save($imagePath);
                }
            }else if(!empty($data['current_admin_image'])){
                $imagePath = $data['current_admin_image'] ;
            }else{
                $imagePath = "" ;
            }
            //update admin details
            Admin::where('id', Auth::guard('admin')->user()->id)->update([
                'name' => $data['admin_name'],
                'mobile' => $data['admin_mobile'],
                'image' => $imagePath
            ]);
            return redirect()->back()->with('success_message', 'Your details has been updated succesfully');
        }
        return view('admin.settings.update_admin_details');
    }

    public function checkCurrentPassword(Request $request){
        $data = $request->all();
        //echo '<pre>'; print_r($data); die;
        if (Hash::check($data['current_password'],Auth::guard('admin')->user()->password)) {
            return 'true';
        }else{
            return 'false';
        }
    }

    public function login(Request $request) {
        if($request->isMethod('POST')){
            $data = $request->all();
            $validated = $request->validate([
                'email' => 'required|email|max:255',
                'password' => 'required|'
            ]);

            if(Auth::guard('admin')->attempt(['email'=>$data['email'],'password'=>$data['password'],'status'=>1])){
                return redirect('admin/dashboard');
            }else{
                return back()->with('error_message','invalide email or password');
            }
        }
        return view('admin.login');
    }

    public function logout(){
        Auth::guard('admin')->logout();
        return redirect('admin/login');
    }
}

