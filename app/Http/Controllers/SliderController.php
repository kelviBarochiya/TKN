<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use Image;

class SliderController extends Controller
{
     public function index()
    {
    	
        $sliders = Slider::orderBy('id', 'desc')->get();
        return view('admin.sliders.index',compact('sliders'));
    }

    public function create()
    {         
        return view('admin.sliders.form');   
    }

    public function save(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,jpg,png,svg',
            'status' => 'required'
        ]);
        $fileName = "";
        $uploadedPaths = "";
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $fileName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('/images'), $fileName);
            $uploadedPath = $fileName;
        }
        
       
        $blog = new Slider();
        // $blog->title = $request->title;
        // $blog->description = $request->description;
        if($request->has('image')){
            $blog->image = $uploadedPath;
        }
        $blog->status = $request->status;
        if($blog->save()){
            return redirect()->route('sliders.index')->with('success', 'Slider Created successfully!');
        }
    }

    public function edit($id)
    {
        $slider = Slider::find($id);
        return view('admin.sliders.form',compact('slider'));
    }

    public function update(Request $request)
    {

        $request->validate([
            
            'status' => 'required'
        ]);
        
      
        $fileName = "";
        $uploadedPaths = "";
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $fileName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('/images'), $fileName);
            $uploadedPaths = $fileName;
        }
        $slider_id = $request->slider_id;
        $slider = Slider::find($slider_id);

        if($request->has('image')){
            $slider->image = $uploadedPaths;
        }
        $slider->status = $request->status;
        if($slider->save()){
            return redirect()->route('sliders.index')->with('success', 'Slider Updated successfully!');
        }
    }

    public function delete($id)
    {
        if(Slider::find($id)->delete()){
            return redirect()->route('sliders.index')->with('success', 'Slider Deleted successfully!');
        }

    }

    public function deleteMultipleBlog(Request $request)
    {
        $ids = $request->ids;
        $deleteMultipleCategory = Slider::whereIn('id', $ids)->delete();
        if ($deleteMultipleCategory) {
            echo json_encode('success');
        }
    }

    public function changeStatusCategory(Request $request)
    {
        $changeStatus = Slider::find($request->id);
        if ($changeStatus->status == 1) {
            $status = '0';
        } else {
            $status = '1';
        }
        $changeStatus->status = $status;
        $changeStatus->save();
        return Redirect::back();
    }
}
