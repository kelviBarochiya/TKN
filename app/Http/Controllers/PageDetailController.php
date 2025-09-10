<?php

namespace App\Http\Controllers;
use App\Models\PageDetail;
use Illuminate\Http\Request;
use Image;

class PageDetailController extends Controller
{
    public function index()
    {
    	
        $pageDetails = PageDetail::orderBy('id', 'desc')->get();
        return view('admin.page_detail.list',compact('pageDetails'));
    }

    public function create()
    {         
        $modules = ['PortFolio','Service','Case Study'];
        return view('admin.page_detail.form',compact('modules'));   
    }

    public function save(Request $request)
    {
        $fileName = "";
        $request->validate([
            'module' => 'required',
            'title' => 'required',
            'description' => 'required',
            'image' => 'required',
            'status' => 'required'
        ]);

        list($height,$width) = getImageHeightWidthForResize('Page');
        
        if($request->has('image')){
            $image = $request->image;
            $imageName = $image->getClientOriginalName();
            $destination = public_path('images/');
            $resizeImage = Image::make($image->getRealPath());
            $resizeImage->resize($width,$height);
            $resizeImage->save($destination.$imageName,80);
            $fileName = $imageName;
        }
       
        $pageDetail = new PageDetail();
        $pageDetail->module = $request->module;
        $pageDetail->title = $request->title;
        $pageDetail->description = $request->description;
        $pageDetail->image = $request->image;
        if($request->has('image')){
            $pageDetail->image = $fileName;
        }
        $pageDetail->status = $request->status;
        if($pageDetail->save()){
            return redirect()->route('page_detail.index')->with('success', 'Page Detail Created successfully!');
        }
    }

    public function edit($id)
    {
        $modules = ['PortFolio','Service','Case Study'];
        $PageDetail = PageDetail::find($id);
        
        return view('admin.page_detail.form',compact('PageDetail','modules'));
    }

    public function update(Request $request)
    {
       $fileName = "";
        
       
        list($height,$width) = getImageHeightWidthForResize('Page');
        
        if($request->has('image')){
            $image = $request->image;
            $imageName = $image->getClientOriginalName();
            $destination = public_path('images/');
            $resizeImage = Image::make($image->getRealPath());
            $resizeImage->resize($width,$height);
            $resizeImage->save($destination.$imageName,80);
            $fileName = $imageName;  
        }
       
        $page_detail_id = $request->page_detail_id;
        $pageDetail = PageDetail::find($page_detail_id);
        $pageDetail->module = $request->module;
        $pageDetail->title = $request->title;
        $pageDetail->description = $request->description;
        if($request->has('image')){
           
            $pageDetail->image = $fileName;
        }
        
        $pageDetail->status = $request->status;
        if($pageDetail->save()){
            return redirect()->route('page_detail.index')->with('success', 'Page Detail Created successfully!');
        }
    }

    public function delete($id)
    {
        if(PageDetail::find($id)->delete()){
            return redirect()->route('page_detail.index')->with('success', 'Page Detail Deleted successfully!');
        }

    }

    public function deleteMultipleslider(Request $request)
    {
        $ids = $request->ids;
        $deleteMultipleCategory = PageDetail::whereIn('id', $ids)->delete();
        if ($deleteMultipleCategory) {
            echo json_encode('success');
        }
    }
}
