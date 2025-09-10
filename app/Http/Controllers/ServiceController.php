<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Models\Category;
use Image;

class ServiceController extends Controller
{
    public function index()
    {
        // dd('here');
    //   $services = Service::with('category')->get();
      $services = Service::all();

        return view('admin.service.list',compact('services'));
    }

    public function create()
{
    
    // $categories = Category::all(); // Fetch all categories
    $homeCount = Service::where('is_home', 1)->count();

    return view('admin.service.form', compact('homeCount'));
}


    public function save(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'content' => 'required',
             // 'parent_id' => 'nullable|exists:services,id',
            'status' => 'required'
        ]);
        $fileName = "";
         list($height,$width) = getImageHeightWidthForResize('Service');
        if($request->has('image')){
            $image = $request->image;
            $imageName = $image->getClientOriginalName();
            $destination = public_path('images/');
            $resizeImage = Image::make($image->getRealPath());
            $resizeImage->resize($width,$height);
            $resizeImage->save($destination.$imageName,80);
            $fileName = $imageName;
        }
        
        $service = new Service();
        $service->title = $request->title;
        $service->description = $request->content;
        $service->icon_class = $request->icon_class;
        $service->category_id = $request->category_id ?? null;
        if($request->has('image')){
            $service->image = $fileName;
        }
        $service->slug = $request->slug ?? null;
        $service->status = $request->status;
        $service->is_home = $request->has('is_home') ? 1 : 0;

        if($service->save()){
            return redirect()->route('services.index')->with('success', 'Service Created successfully!');
        }
    }

    public function edit($id)
{
    $service = Service::findOrFail($id);
    $homeCount = Service::where('is_home', 1)->count();
   
    // $categories = Category::all(); // Fetch all categories
    return view('admin.service.form', compact('service', 'homeCount'));
}

    public function update(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'status' => 'required'
        ]);

        $fileName = "";
         list($height,$width) = getImageHeightWidthForResize('Service');
        if($request->has('image')){
            $image = $request->image;
            $imageName = $image->getClientOriginalName();
            $destination = public_path('images/');
            $resizeImage = Image::make($image->getRealPath());
            $resizeImage->resize($width,$height);
            $resizeImage->save($destination.$imageName,80);
            $fileName = $imageName;
        }
        
        
        $service_id = $request->service_id;
        $service = Service::find($service_id);
        $service->title = $request->title;
        $service->description = $request->content;
        if($request->has('image')){
            $service->image = $fileName;
        }
        $service->category_id = $request->category_id ?? null;
        $service->icon_class = $request->icon_class;
        $service->slug = $request->slug ?? null;
        $service->status = $request->status;
        $service->is_home = $request->has('is_home') ? 1 : 0;

        if($service->save()){
            return redirect()->route('services.index')->with('success', 'Service Updated successfully!');
        }
    }

    public function delete($id)
    {
        if(Service::find($id)->delete()){
            return redirect()->route('services.index')->with('success', 'Service Deleted successfully!');
        }

    }

    public function deleteMultipleservice(Request $request)
    {
        $ids = $request->ids;
        $deleteMultipleCategory = Service::whereIn('id', $ids)->delete();
        if ($deleteMultipleCategory) {
            echo json_encode('success');
        }
    }

    public function changeStatusService(Request $request)
    {
        $changeStatus = Service::find($request->id);
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
