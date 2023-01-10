<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use App\Models\Vendor;
use Illuminate\Http\Request;
use App\Models\VendorsBankDetails;
use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use App\Models\VendorsBusinessDetails;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    public function  dashboard() {
        Session::put('page', 'admin.dashboard');
        return view('admin.dashboard');
    }

    public function updateAdminPassword(Request $request){
        Session::put('page', 'update_admin_password');

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
        Session::put('page', 'update_admin_details');
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


    public function updateVendorsBusinessDetails(Request $request){
        Session::put('page', 'update_vendor_business_details');

        if ($request->isMethod('post')) {
            $data = $request->all();
            $rules = [
                'shop_name' => 'required|max:255|min:5',
                'shop_address' => 'required',
                'shop_city' => 'required|string',
                'shop_state' => 'required',
                'shop_country' => 'required',
                'shop_pincode' => 'required',
                'shop_mobile' => 'required',
                'shop_website' => 'required|string',
                'shop_email' => 'required|string|email',
                'address_proof' => 'required',
                'business_licence_number' => 'required|string',
                'gst_number' => 'required|string',
                'pan_number' => 'required|string',
            ];
            $this->validate($request, $rules);
            //upload admin photo
            if ($request->hasFile('address_proof_image')) {
                $image_tmp = $request->file('address_proof_image');
                if ($image_tmp->isValid()) {
                    //get image extention
                    $extension = $image_tmp->getClientOriginalExtension();
                    //generate new image name
                    $imageName = rand(111, 99999) . '.' . $extension;
                    $imagePath = 'admin/images/proofs/'. $imageName;
                    //upload the image
                    Image::make($image_tmp)->save($imagePath);
                }
                //dd($imagePath);
            } else if (!empty($data['current_address_proof_image'])) {
                $imagePath = $data['current_address_proof_image'];
            } else {
                $imagePath = "";
            }

            //update vendor Businessdetails in vendorsBusinessDetails table
            VendorsBusinessDetails::where('vendor_id', Auth::guard('admin')->user()->vendor_id)->update([
                'shop_name' => $data['shop_name'],
                'shop_address' => $data['shop_address'],
                'shop_city' => $data['shop_city'],
                'shop_state' => $data['shop_state'],
                'shop_country' => $data['shop_country'],
                'shop_pincode' => $data['shop_pincode'],
                'shop_mobile' => $data['shop_mobile'],
                'shop_website' => $data['shop_website'],
                'shop_email' => $data['shop_email'],
                'address_proof_image' => $imagePath,
                'address_proof' => $data['address_proof'],
                'business_licence_number' => $data['business_licence_number'],
                'gst_number' => $data['gst_number'],
                'pan_number' => $data['pan_number'],
            ]);
            return redirect()->back()->with('success_message', 'Your details has been updated succesfully');
        }
        $vendorDetails = VendorsBusinessDetails::where('vendor_id', Auth::guard('admin')->user()->vendor_id)->first()->toArray();

        $countries = Country::where('status',1)->get()->toArray();

        return view('admin.settings.update_vendor_business_details')->with(compact('vendorDetails','countries'));

    }

    public function updateVendorsPersonalDetails(Request $request){
        Session::put('page', 'update_vendor_personal_details');

        if ($request->isMethod('post')) {
            $data = $request->all();
            $rules = [
                'vendor_name' => 'required|max:255|min:5|regex:/(^([a-zA-z]+)(\d+)?$)/u',
                'vendor_mobile' => 'required|numeric|',
                'vendor_address' => 'required|string',
                'vendor_city' => 'required',
                'vendor_state' => 'required',
                'vendor_country' => 'required|string',
                'vendor_pincode' => 'required|string',
            ];
            $this->validate($request, $rules);
            //upload admin photo
            if ($request->hasFile('vendor_image')) {
                $image_tmp = $request->file('vendor_image');
                if ($image_tmp->isValid()) {
                    //get image extention
                    $extension = $image_tmp->getClientOriginalExtension();
                    //generate new image name
                    $imageName = rand(111, 99999) . '.' . $extension;
                    $imagePath = 'admin/images/photos/' . $imageName;
                    //upload the image
                    Image::make($image_tmp)->save($imagePath);
                }
            } else if (!empty($data['current_vendor_image'])) {
                $imagePath = $data['current_vendor_image'];
            } else {
                $imagePath = "";
            }

            // update admin details in admin table
            Admin::where('id', Auth::guard('admin')->user()->id)->update([
                'name' => $data['vendor_name'],
                'mobile' => $data['vendor_mobile'],
                'image' => $imagePath
            ]);

            //update vendor details in vendors table
            Vendor::where('id', Auth::guard('admin')->user()->vendor_id)->update([
                'name' => $data['vendor_name'],
                'mobile' => $data['vendor_mobile'],
                'address' => $data['vendor_address'],
                'city' => $data['vendor_city'],
                'state' => $data['vendor_state'],
                'country' => $data['vendor_country'],
                'pincode' => $data['vendor_pincode'],
            ]);
            return redirect()->back()->with('success_message', 'Your details has been updated succesfully');
        }

        $vendorDetails = Vendor::where('id', Auth::guard('admin')->user()->vendor_id)->first()->toArray();

        $countries = Country::where('status', 1)->get()->toArray();

        return view('admin.settings.update_vendor_personal_details')->with(compact('vendorDetails','countries'));
    }

    public function updateVendorsBankDetails(Request $request){
        Session::put('page', 'update_vendor_bank_details');

        if ($request->isMethod('post')) {
            $data = $request->all();
            $rules = [
                'account_holder_name' => 'required|min:5',
                'bank_name' => 'required',
                'account_number' => 'required|string',
                'bank_ifsc_code' => 'required',
            ];
            $this->validate($request, $rules);

            //update vendor bank details in vendorsbankdetails table
            VendorsBankDetails::where('vendor_id', Auth::guard('admin')->user()->vendor_id)->update([
                'account_holder_name' => $data['account_holder_name'],
                'bank_name' => $data['bank_name'],
                'account_number' => $data['account_number'],
                'bank_ifsc_code' => $data['bank_ifsc_code'],
            ]);
            return redirect()->back()->with('success_message', 'Your details has been updated succesfully');
        }

        $vendorDetails = VendorsBankDetails::where('vendor_id', Auth::guard('admin')->user()->vendor_id)->first()->toArray();

        $countries = Country::where('status', 1)->get()->toArray();

        return view('admin.settings.update_vendor_bank_details')->with(compact('vendorDetails','countries'));
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

    public function admins($type=null){

        $admins = Admin::query();

        if (!empty($type)) {
            $admins = Admin::where('type',$type);
            $title = ucfirst($type).'s';
            Session::put('page', 'view_'.strtolower($title));
        }
        $admins = $admins->get()->toArray();


        return view('admin.admins.admins')->with(compact('admins','title'));
    }

    public function allAdmins(){
        Session::put('page', 'admins.alladmins');
        $admins = Admin::all()->toArray();

        $title = 'All Admins / Subadmins / Vendors';

        return view('admin.admins.alladmins')->with(compact('admins', 'title'));
    }

    public function viewVendorDetails($id){
        Session::put('page', 'view_vendor_details');

        $vendorDetails = Admin::with('vendorPersonal', 'vendorBusiness', 'vendorBank')->where('id',$id)->first();
        $vendorDetails = json_decode(json_encode($vendorDetails),true);
        //dd($vendorDetails);
        return view('admin.admins.view_vendor_details')->with(compact('vendorDetails'));
    }

    public function updateAdminStatus(Request $request){
        if ($request->ajax()) {
            $data = $request->all();
            //echo "<pre>"; print_r($data); die ;
            if ($data['status']=='Active') {
                $status = 0;
            } else {
                $status = 1;
            }
            Admin::where('id',$data['admin_id'])->update([
                'status' => $status
            ]);
            return response()->json([
                'status' => $status,
                'admin_id' => $data['admin_id']
            ]);

        }
    }
}

