<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brands;
use Illuminate\Http\Request;

class BrandsController extends Controller
{
    public function brands(){
        $brands = Brands::get()->toArray();
        //dd($brands);

        return view('admin.brands.brands')->with(compact('brands'));
    }

    public function updateBrandStatus(Request $request){
        if ($request->ajax()) {
            $data = $request->all();
            //echo "<pre>"; print_r($data); die ;
            if ($data['status'] == 'Active') {
                $status = 0;
            } else {
                $status = 1;
            }
            Brands::where('id', $data['brand_id'])->update([
                'status' => $status
            ]);
            return response()->json([
                'status' => $status,
                'brand_id' => $data['brand_id']
            ]);
        }
    }

    public function addBrands(Request $request)
    {

        $section = new Brands();
        $message = "Brand added succesfully";
        if ($request->isMethod('post')) {
            $data = $request->all();
            $rules = [
                'brand_name' => 'required|max:255|min:5|regex:/(^([a-zA-z]+)(\d+)?$)/u',
            ];
            $this->validate($request, $rules);
            $section->name = $data['brand_name'];
            $section->status = 1;
            $section->save();
            return redirect()->route('brands')->with('success_message', $message);
        }

        return view('admin.brands.add_brand');
    }

    public function editBrands(Request $request, Brands $brand){

        $message = "Brand Updated succesfully";
        if ($request->isMethod('post')) {
            $data = $request->all();
            $rules = [
                'brand_name' => 'required|max:255|min:5|regex:/(^([a-zA-z]+)(\d+)?$)/u',
            ];
            $this->validate($request, $rules);
            $brand->update([
                'name' => $data['brand_name'],
                'status' => 1
            ]);
            return redirect()->route('brands')->with('success_message', $message);
        }

        return view('admin.brands.edit_brand')->with(compact('brand'));
    }
}
