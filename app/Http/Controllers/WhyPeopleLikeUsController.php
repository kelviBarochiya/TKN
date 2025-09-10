<?php

namespace App\Http\Controllers;

use App\Models\WhyPeopleLikeUs;
use Illuminate\Http\Request;

class WhyPeopleLikeUsController extends Controller
{
    public function index()
    {
    	
        $why = WhyPeopleLikeUs::orderBy('id', 'desc')->get();
        return view('admin.why_people_like_us.list',compact('why'));
    }

    public function create()
    {         
        return view('admin.why_people_like_us.form');   
    }

    public function save(Request $request)
    {
       
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|image',
            'status' => 'required'
        ]);
        $fileName = "";
        if($request->has('image')){
            $file = $request->file('image');
            $fileName = $file->getClientOriginalName();
            $file->move(public_path('images/'),$fileName);
        }
        
       
        $blog = new WhyPeopleLikeUs();
        $blog->master_id = '6';
        $blog->title = $request->title;
        $blog->description = $request->description;
        if(isset($fileName)){
            $blog->image = $fileName;
        }
        $blog->status = $request->status;
        if($blog->save()){
            return redirect()->route('why-people-like-us.index')->with('success', 'Why People Like Us Created successfully!');
        }
    }

    public function edit($id)
    {
        $why = WhyPeopleLikeUs::find($id);
        return view('admin.why_people_like_us.form',compact('why'));
    }

    public function update(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'status' => 'required'
        ]);
        
        if($request->has('image')){
            $fileName = "";
            $file = $request->file('image');
            $fileName = $file->getClientOriginalName();
            $file->move(public_path('images/'),$fileName);
        }
        $why_id = $request->why_id;
        $blog = WhyPeopleLikeUs::find($why_id);
        $blog->master_id = "6";
        $blog->title = $request->title;
        $blog->description = $request->description;
        if($request->has('image')){
            $blog->image = $fileName;
        }
        $blog->status = $request->status;
        if($blog->save()){
            return redirect()->route('why-people-like-us.index')->with('success', 'Why People Like Us Updated successfully!');
        }
    }

    public function delete($id)
    {
        if(WhyPeopleLikeUs::find($id)->delete()){
            return redirect()->route('why-people-like-us.index')->with('success', 'Why People Like Us Deleted successfully!');
        }

    }

    public function deleteMultipleBlog(Request $request)
    {
        $ids = $request->ids;
        $deleteMultipleCategory = WhyPeopleLikeUs::whereIn('id', $ids)->delete();
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
