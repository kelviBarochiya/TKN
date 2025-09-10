<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use Image;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::orderBy('id', 'desc')->get();
        return view('admin.testimonials.list',compact('testimonials'));
    }

    public function create()
    {         
        return view('admin.testimonials.form');   
    }

    public function save(Request $request)
    {
        $request->validate([
            'name' => 'required',
            
            'description' => 'required',
            // 'image' => 'required|image|mimes:jpeg,jpg,png,svg|max:2048|dimensions:min_width=200,min_height=200',
            'status' => 'required'
        ]);
        $fileName = "";
        list($height,$width) = getImageHeightWidthForResize('Testimonials');
        
        if($request->has('image')){
            $image = $request->image;
            $imageName = $image->getClientOriginalName();
            $destination = public_path('images/');
            $resizeImage = Image::make($image->getRealPath());
            $resizeImage->resize($width,$height);
            $resizeImage->save($destination.$imageName,80);
            $fileName = $imageName;
        }

        
       
        $testimonial = new Testimonial();
        $testimonial->master_id = '11';
        $testimonial->name = $request->name;
        $testimonial->email = $request->email ?? null;
        $testimonial->description = $request->description;
        if($request->has('image')){
            $testimonial->image = $fileName;
        }
        $testimonial->status = $request->status;
        if($testimonial->save()){
            return redirect()->route('testimonails.index')->with('success', 'Testimonial Created successfully!');
        }
    }

    public function edit($id)
    {
        $testimonial = Testimonial::find($id);
        return view('admin.testimonials.form',compact('testimonial'));
    }

    public function update(Request $request)
    {

        $request->validate([
             'name' => 'required',
            
            'description' => 'required',
            'status' => 'required'
        ]);
        
        list($height,$width) = getImageHeightWidthForResize('Testimonials');
        
        if($request->has('image')){
            $image = $request->image;
            $imageName = $image->getClientOriginalName();
            $destination = public_path('images/');
            $resizeImage = Image::make($image->getRealPath());
            $resizeImage->resize($width,$height);
            $resizeImage->save($destination.$imageName,80);
            $fileName = $imageName;
        }
        $testimonial_id = $request->testimonial_id;
        $testimonial = Testimonial::find($testimonial_id);

        $testimonial->master_id = '11';
        $testimonial->name = $request->name;
        $testimonial->email = $request->email ?? null;
        $testimonial->description = $request->description;
        if($request->has('image')){
            $testimonial->image = $fileName;
        }
        $testimonial->status = $request->status;
        if($testimonial->save()){
            return redirect()->route('testimonails.index')->with('success', 'Testimonial Updated successfully!');
        }
    }

    public function delete($id)
    {
        if(Testimonial::find($id)->delete()){
            return redirect()->route('testimonails.index')->with('success', 'Testimonial Deleted successfully!');
        }

    }

    public function deleteMultipletestimonail(Request $request)
    {
        $ids = $request->ids;
        $deleteMultipleCategory = Testimonial::whereIn('id', $ids)->delete();
        if ($deleteMultipleCategory) {
            echo json_encode('success');
        }
    }

    public function changeStatusCategory(Request $request)
    {
        $changeStatus = Testimonial::find($request->id);
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
