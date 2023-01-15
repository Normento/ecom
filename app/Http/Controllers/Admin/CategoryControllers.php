<?php

namespace App\Http\Controllers\Admin;

use App\Models\Section;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class CategoryControllers extends Controller
{
    public function categories(){
        $categories = Category::with(['section','parentcategory'])->get()->toArray();
        //dd($categories);

        return view('admin.categories.categories')->with(compact('categories'));
    }

    public function updateCategoryStatus(Request $request){
        if ($request->ajax()) {
            $data = $request->all();
            //echo "<pre>"; print_r($data); die ;
            if ($data['status'] == 'Active') {
                $status = 0;
            } else {
                $status = 1;
            }
            Category::where('id', $data['category_id'])->update([
                'status' => $status
            ]);
            return response()->json([
                'status' => $status,
                'category_id' => $data['category_id']
            ]);
        }
    }

    public function addCategory(Request $request){

        $category = new Category();
        $getCategories = array();
        $message = "Category added succesfully";
        $getSection = Section::get()->toArray();
        if ($request->isMethod('post')) {
            $data = $request->all();
            if ($data['category_discount'] == "") {
                $data['category_discount'] = 0.00;
            }
            if ($data['description'] == "") {
                $data['description'] = "";
            }
            //dd($data);
            $rules = [
                'category_name' => 'required|max:255|min:3',
                'section_id' => 'required',
                'parent_id' => 'required',
                //'category_discount' => 'numeric',
                //'description' => 'required|min:5',
                'url' => 'required',
                //'meta_title' => 'required',
                //'meta_description' => 'required',
                //'meta_keywords' => 'required',
            ];

            $this->validate($request, $rules);
            //upload category image
            if ($request->hasFile('category_image')) {
                $image_tmp = $request->file('category_image');
                if ($image_tmp->isValid()) {
                    //get image extention
                    $extension = $image_tmp->getClientOriginalExtension();
                    //generate new image name
                    $imageName = rand(111, 99999) . '.' . $extension;
                    $imagePath = 'front/images/category_images/' . $imageName;
                    //upload the image
                    Image::make($image_tmp)->save($imagePath);
                    $category->category_image = $imagePath;
                }
            } else {
                $category->category_image = '';
            }
            //dd($imagePath);
            $category->parent_id = $data['parent_id'];
            $category->section_id = $data['section_id'];
            $category->category_name = $data['category_name'];
            $category->category_discount = $data['category_discount'];
            $category->description = $data['description'];
            $category->url = $data['url'];
            $category->meta_title = $data['meta_title'];
            $category->meta_description = $data['meta_description'];
            $category->meta_keywords = $data['meta_keywords'];
            $category->status = 1;
            $category->save();
            return redirect()->route('categories')->with('success_message', $message);
        }

        return view('admin.categories.add_category')->with(compact('getSection', 'getCategories'));
    }

    public function editCategory(Request $request,Category $category){

        $message = "Category Updated succesfully";
        $getCategories = Category::with('subcategories')->where(['parent_id'=>0,'section_id'=>$category['section_id']])->get();
        //dd($getCategories);
        $getSection = Section::get()->toArray();
        if ($request->isMethod('post')) {
            $data = $request->all();
            if ($data['category_discount'] == "") {
                $data['category_discount'] = 0.00;
            }
            if ($data['description'] == "") {
                $data['description'] = "";
            }

            //dd($data);
            $rules = [
                'category_name' => 'required|max:255|min:3',
                'section_id' => 'required',
                'parent_id' => 'required',
                //'category_discount' => 'required|numeric',
                //'description' => 'min:5',
                'url' => 'required',
                //'meta_title' => 'required',
                //'meta_description' => 'required',
                //'meta_keywords' => 'required',
            ];

            $this->validate($request, $rules);
            //upload category image
            if ($request->hasFile('category_image')) {
                $image_tmp = $request->file('category_image');
                if ($image_tmp->isValid()) {
                    //get image extention
                    $extension = $image_tmp->getClientOriginalExtension();
                    //generate new image name
                    $imageName = rand(111, 99999) . '.' . $extension;
                    $imagePath = 'front/images/category_images/' . $imageName;
                    //upload the image
                    Image::make($image_tmp)->save($imagePath);
                }
            } else if (!empty($data['current_category_image'])) {
                $imagePath = $data['current_category_image'];
            } else {
                $imagePath = "";
            }
            $category->update([
            'parent_id' => $data['parent_id'],
            'section_id' => $data['section_id'],
            'category_name' => $data['category_name'],
            'category_discount' => $data['category_discount'],
            'description' => $data['description'],
            'url' => $data['url'],
            'meta_title' => $data['meta_title'],
            'meta_description' => $data['meta_description'],
            'meta_keywords' => $data['meta_keywords'],
            'category_image' => $imagePath,
            'status' => 1,

            ]);
            return redirect()->route('categories')->with('success_message', $message);
        }

        return view('admin.categories.edit_category')->with(compact('getSection','category', 'getCategories'));
    }

    public function appendCategoryLevel(Request $request){

        if ($request->ajax()) {
            $data = $request->all();
            $getCategories = Category::with('subcategories')->where(['parent_id' => 0, 'section_id' => $data['section_id']])->get()->toArray();
            return view('admin.categories.append_categories_level')->with(compact('getCategories'));
        }

    }

    public function deleteCategory($id){
        Category::where('id',$id)->delete();
        $message = 'Category was deleted successfully';

        return redirect()->back()->with('success_message',$message);
    }
}
