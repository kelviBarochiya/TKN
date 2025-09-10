<?php

namespace App\Http\Controllers;
use App\Models\ImageSetting;
use App\Models\Master;
use Illuminate\Http\Request;

class ImageSettingController extends Controller
{
    
    public function index()
    {
    	
        $imageSettings = ImageSetting::orderBy('id', 'desc')->get();
        return view('admin.image_setting.list',compact('imageSettings'));
    }

    public function create()
    {         
        $modules = ['Slider','Gallery','Testimonials','Why People Like Us','Our Team','Case Study','Portfolio','Client Slider','Page','Service','Blog','Product','Single Portfolio','Single Case Study'];
        return view('admin.image_setting.form',compact('modules'));   
    }

    public function save(Request $request)
    {
       
        $request->validate([
            'module' => 'required',
            'width' => 'required',
            'height' => 'required',
            'status' => 'required'
        ]);
       
        $ImageSetting = new ImageSetting();
        $ImageSetting->master_id = '2';
        $ImageSetting->module_id = $request->module;
        $ImageSetting->width = $request->width;
        $ImageSetting->height = $request->height;
        $ImageSetting->status = $request->status;
        if($ImageSetting->save()){
            return redirect()->route('image_settings.index')->with('success', 'Image Setting Created successfully!');
        }
    }

    public function edit($id)
    {
        $modules = ['Slider','Gallery','Testimonials','Why People Like Us','Our Team','Case Study','Portfolio','Client Slider','Page','Service','Blog','Product','Single Portfolio','Single Case Study'];
        $imageSetting = ImageSetting::find($id);
        
        return view('admin.image_setting.form',compact('imageSetting','modules'));
    }

    public function update(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'module' => 'required',
            'width' => 'required',
            'height' => 'required',
            'status' => 'required'
        ]);
        
        
        $image_setting_id = $request->image_setting_id;
        $imageSetting = ImageSetting::find($image_setting_id);
        $imageSetting->master_id = '2';
        $imageSetting->module_id = $request->module;
        // $imageSetting->module = $request->module;
        $imageSetting->width = $request->width;
        $imageSetting->height = $request->height;
        $imageSetting->status = $request->status;
        if($imageSetting->save()){
            return redirect()->route('image_settings.index')->with('success', 'Image Setting Updated successfully!');
        }
    }

    public function delete($id)
    {
        if(ImageSetting::find($id)->delete()){
            return redirect()->route('image_settings.index')->with('success', 'Image Setting Deleted successfully!');
        }

    }

    public function deleteMultipleslider(Request $request)
    {
        $ids = $request->ids;
        $deleteMultipleCategory = ImageSetting::whereIn('id', $ids)->delete();
        if ($deleteMultipleCategory) {
            echo json_encode('success');
        }
    }

    public function changeStatusCategory(Request $request)
    {
        $changeStatus = Blog::find($request->id);
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


