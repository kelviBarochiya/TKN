<?php

namespace App\Http\Controllers;
use App\Models\MetaTag;
use App\Models\Blog;
use App\Models\CaseStudy;
use App\Models\Page;
use App\Models\Service;
use App\Models\Master;
use Illuminate\Http\Request;

class MetaTagController extends Controller
{
    public function index()
    {	
        $metatags = MetaTag::orderBy('id', 'desc')->get();
        return view('admin.meta_tags.list',compact('metatags'));
    }

    public function create()
    {  
        
        $modules = [];
        $services = Service::where('status','1')->pluck('title')->toArray();
        $blogs = Blog::where('status','1')->pluck('title')->toArray();
        
        $caseStudy = CaseStudy::where('status','1')->pluck('type')->toArray();
        $page = Page::where('status','1')->pluck('title')->toArray();
        $modules = array_merge_recursive($services,$blogs);
        // $modules = array_merge_recursive($modules,$portfolio);
        $modules = array_merge_recursive($modules,$caseStudy);
        $modules = array_merge_recursive($modules,$page);
        
        
        return view('admin.meta_tags.form',compact('modules'));   
    }
    
     public function getMetaTagController(Request $request)
    {
        $html = "";
        $page = $request->page;
        if($page == "blog"){
            $data = Blog::where('status','1')->pluck('title')->toArray();
        }elseif($page == "project"){
            $data = CaseStudy::where('status','1')->pluck('type')->toArray();
        }elseif($page == "service"){
            $data = Service::where('status','1')->pluck('title')->toArray();
        }elseif($page == "jobs"){
            $data = JobListing::where('status','1')->pluck('title')->toArray();
        }elseif($page == "about-us"){
        $requiredTitles = ['Company Overview','Mission and Values','Corporate Governance','Values and Ethics','Environmental Sustainability','Client Services','Work and Culture']; // specify allowed titles
        $data = Page::where('status', '1')
                    ->whereIn('title', $requiredTitles)
                    ->pluck('title')
                    ->toArray();
    }

        
        foreach($data as $key => $value){
            $html.='<option value="'.$value.'">'.$value.'</option>';
        }

       
        return json_encode($html);
    }

    public function save(Request $request)
    {
       
        $request->validate([
            'type' => 'required',
            'meta_title' => 'required',
            'meta_description' => 'required',
            'status' => 'required',
        ]);
       
        $metaTag = new MetaTag();
        $metaTag->master_id = '31';
        $metaTag->module = $request->module;
        $metaTag->type = $request->type;
        $metaTag->meta_title = $request->meta_title;
        $metaTag->meta_description = $request->meta_description;
        $metaTag->meta_keyword = $request->meta_keyword;
        $metaTag->status = $request->status;
        if($metaTag->save()){
            return redirect()->route('meta_tag.index')->with('success', 'Meta Tag Created successfully!');
        }
    }
    public function edit($id)
    {
        $data = [];
        $metaTag = MetaTag::find($id);
        if($metaTag->type == "blog"){
            $data = Blog::where('status','1')->pluck('title')->toArray();
        }elseif($metaTag->type == "project"){
            $data = CaseStudy::where('status','1')->pluck('type')->toArray();
        }elseif($metaTag->type == "service"){
            $data = Service::where('status','1')->pluck('title')->toArray();
        }elseif($metaTag->type == "jobs"){
            $data = JobListing::where('status','1')->pluck('title')->toArray();
        }
        
        return view('admin.meta_tags.form',compact('metaTag','data'));
    }

    public function update(Request $request)
    {
       
        $request->validate([
            
            'meta_title' => 'required',
            'meta_description' => 'required',
            'status' => 'required'
        ]);
        
        
        $meta_tag_id = $request->meta_tag_id;
        $metaTag = MetaTag::find($meta_tag_id);
        $metaTag->master_id = '31';
        $metaTag->module = $request->module;
        $metaTag->type = $request->type;
        $metaTag->meta_title = $request->meta_title;
        $metaTag->meta_description = $request->meta_description;
        $metaTag->meta_keyword = $request->meta_keyword;
        $metaTag->status = $request->status;
        if($metaTag->save()){
            return redirect()->route('meta_tag.index')->with('success', 'Meta Tag Updated successfully!');
        }
    }

    public function delete($id)
    {
        if(MetaTag::find($id)->delete()){
            return redirect()->route('meta_tag.index')->with('success', 'Meta Tag Deleted successfully!');
        }

    }

    public function deleteMultipleCategory(Request $request)
    {
        $ids = $request->ids;
        $deleteMultipleCategory = MetaTag::whereIn('id', $ids)->delete();
        if ($deleteMultipleCategory) {
            echo json_encode('success');
        }
    }
}
