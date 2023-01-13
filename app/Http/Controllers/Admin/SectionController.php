<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    public function sections(){
        $sections = Section::get()->toArray();
        //dd($sections);
        return view('admin.sections.sections')->with(compact('sections'));
    }

    public function updateSectionStatus(Request $request){
        if ($request->ajax()) {
            $data = $request->all();
            //echo "<pre>"; print_r($data); die ;
            if ($data['status'] == 'Active') {
                $status = 0;
            } else {
                $status = 1;
            }
            Section::where('id', $data['section_id'])->update([
                'status' => $status
            ]);
            return response()->json([
                'status' => $status,
                'section_id' => $data['section_id']
            ]);
        }
    }

    public function addSections(Request $request){

        $section = new Section();
        $message = "Section added succesfully";
        if ($request->isMethod('post')) {
            $data = $request->all();
            $rules = [
                'section_name' => 'required|max:255|min:5|regex:/(^([a-zA-z]+)(\d+)?$)/u',
            ];
            $this->validate($request, $rules);
            $section->name = $data['section_name'];
            $section->status = 1;
            $section->save();
            return redirect()->route('sections')->with('success_message', $message);
        }

        return view('admin.sections.add_section');

    }

    public function editSections(Request $request, Section $section){

        $message = "Section Updated succesfully";
        if ($request->isMethod('post')) {
            $data = $request->all();
            $rules = [
                'section_name' => 'required|max:255|min:5|regex:/(^([a-zA-z]+)(\d+)?$)/u',
            ];
            $this->validate($request, $rules);
            $section->update([
                'name' => $data['section_name'],
                'status' => 1
            ]);
            return redirect()->route('sections')->with('success_message', $message);
        }

        return view('admin.sections.edit_section')->with(compact('section'));
    }

    public function deletesections(Section $section){
        $section->delete();
        //Section::where('id',$id)->delete();
        $message = 'Section has been deleted successfully';
        return redirect()->back()->with('success_messag',$message);
    }
}
