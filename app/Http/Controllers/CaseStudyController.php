<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\CaseStudy;
use Image;

class CaseStudyController extends Controller
{
    public function index()
    {
    	
        $caseStudy = CaseStudy::with('category')->orderBy('id', 'desc')->get();
        
        return view('admin.case_study.list',compact('caseStudy'));
    }

    public function create()
    {         
        // $getChildCategory = getChildCategory('Case Study');
        // if(isset($getChildCategory)){
        //     $category = Category::where('status','1')->where('parent_id',$getChildCategory)->get();
        // }else{
        //     $category = null;
        // }
        
        // $caseStudy = CaseStudy::with('category')->find($id);

        
    
        return view('admin.case_study.form');   
    }

    public function save(Request $request)
    {
        $request->validate([
           
            'type' => 'required',
            'description' => 'required',
            'image' => 'required|image',
            'status' => 'required'
        ]);
        $fileName = "";
        $fileNameNew = "";
        list($height,$width) = getImageHeightWidthForResize('Case Study');
       
        if($request->has('image')){
            $image = $request->image;
            $imageName = $image->getClientOriginalName();
            $destination = public_path('images/');
            $resizeImage = Image::make($image->getRealPath());
            $resizeImage->resize($width,$height);
            $resizeImage->save($destination.$imageName,80);
            $fileName = $imageName;
        }
        
        if($request->has('original_image')){
            $file = $request->original_image;
            $fileNameNew = $file->getClientOriginalName();
            $destination = public_path('images_original/');
            $resizeImage = Image::make($file->getRealPath());
            $resizeImage->resize($widthOne,$heightOne);
            $resizeImage->save($destination.$fileNameNew,80);
        }
        
       
        $Portfolio = new CaseStudy();
        $Portfolio->master_id = '18';
        $Portfolio->category_id = $request->category_id;
        $Portfolio->type = $request->type;
        $Portfolio->description = $request->description;
        if($request->has('image')){
            $Portfolio->image = $fileName;
        }
        if($request->has('original_image')){
            $Portfolio->original_image = $fileNameNew;
        }
        $Portfolio->status = $request->status;
        if($Portfolio->save()){
            return redirect()->route('case_study.index')->with('success', 'Case Study Created successfully!');
        }
    }

    public function edit($id)
    {
        $caseStudy = CaseStudy::with('category')->find($id);
        
        return view('admin.case_study.form',compact('caseStudy'));
    }

    public function update(Request $request)
    {
        $fileNameNew = "";
        $request->validate([
            'type' => 'required',
            'description' => 'required',
            'status' => 'required'
        ]);
        
       list($height,$width) = getImageHeightWidthForResize('Case Study');
        
        if($request->has('image')){
            $image = $request->image;
            $imageName = $image->getClientOriginalName();
            $destination = public_path('images/');
            $resizeImage = Image::make($image->getRealPath());
            $resizeImage->resize($width,$height);
            $resizeImage->save($destination.$imageName,80);
            $fileName = $imageName;
        }
        $case_study_id = $request->case_study_id;
        $caseStudy = CaseStudy::find($case_study_id);

        // $testimonial->master_id = "1";
        $caseStudy->master_id = '18';
        $caseStudy->category_id = $request->category_id;
        $caseStudy->type = $request->type;
        $caseStudy->description = $request->description;
        if($request->has('image')){
            $caseStudy->image = $fileName;
        }
        
        $caseStudy->status = $request->status;
        if($caseStudy->save()){
            return redirect()->route('case_study.index')->with('success', 'Case Study Updated successfully!');
        }
    }


      public function deleteMultipleTechnology(Request $request)
    {
        $getPortFolio = CaseStudy::find($request->portfolio_id)->first();
        
        if(isset($getPortFolio)){
            $technologies = explode(",",$getPortFolio->technologies);
            if(in_array($request->technology,$technologies)){
              
                $newTechnology = $this->removeArrayElementByValue($technologies,$request->technology);
                
                $newTechnology = implode(",",$newTechnology);
                $updateRecord = \DB::table('case_studies')->where('id',$request->portfolio_id)->update(['technologies'=>$newTechnology]);
                if($updateRecord){
                    return json_encode('success');
                }
            }
        }
    }

    public function removeArrayElementByValue($arr,$value){
        return array_values(array_diff($arr, array($value)));
    }
    public function delete($id)
    {
        if(CaseStudy::find($id)->delete()){
            return redirect()->route('case_study.index')->with('success', 'Case Study Deleted successfully!');
        }

    }

    public function deleteMultipleBlog(Request $request)
    {
        $ids = $request->ids;
        $deleteMultipleCategory = CaseStudy::whereIn('id', $ids)->delete();
        if ($deleteMultipleCategory) {
            echo json_encode('success');
        }
    }

   
}
