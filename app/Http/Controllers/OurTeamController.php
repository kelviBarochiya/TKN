<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OurTeam;
use Image;

class OurTeamController extends Controller
{
    public function index()
    {
        $ourTeams = OurTeam::orderBy('id', 'desc')->get();
        return view('admin.our_team.list',compact('ourTeams'));
    }

    public function create()
    {         
        return view('admin.our_team.form');   
    }

    public function save(Request $request)
    {
        $request->validate([
            'name' => 'required',
           
            'designation' => 'required',
            
            'image' => 'required|image',
            'status' => 'required'
        ]);
        $fileName = "";
        list($height,$width) = getImageHeightWidthForResize('Our Team');
        
        if($request->has('image')){
            $image = $request->image;
            $imageName = $image->getClientOriginalName();
            $destination = public_path('images/');
            $resizeImage = Image::make($image->getRealPath());
            $resizeImage->resize($width,$height);
            $resizeImage->save($destination.$imageName,80);
            $fileName = $imageName;
        }

        
       
        $ourTeam = new OurTeam();
        $ourTeam->master_id = '20';
        $ourTeam->name = $request->name;
        $ourTeam->email = $request->email ?? null;
        $ourTeam->designation = $request->designation ?? null;
        $ourTeam->description = $request->description;
        if($request->has('image')){
        $ourTeam->image = $fileName;
        }
        $ourTeam->status = $request->status;
        if($ourTeam->save()){
            return redirect()->route('our-team.index')->with('success', 'Our Team Created successfully!');
        }
    }


    public function sortTable(Request $request)
    {
       
        $teams = OurTeam::get();
        foreach($teams as $team){
            $id = $team->id;
            
            foreach($request->sortOrder as $sort){
                if($sort['id'] == $id){
                    $team->update(['sort_id' => $sort['position']]);
                }
            }
        }
        
        return 'success';
    }
    public function edit($id)
    {
        $ourTeam = OurTeam::find($id);
        return view('admin.our_team.form',compact('ourTeam'));
    }

    public function update(Request $request)
    {

        $request->validate([
            'name' => 'required',
            
            'designation' => 'required',
           
            'status' => 'required'
        ]);
        
        list($height,$width) = getImageHeightWidthForResize('Our Team');
        
        if($request->has('image')){
            $image = $request->image;
            $imageName = $image->getClientOriginalName();
            $destination = public_path('images/');
            $resizeImage = Image::make($image->getRealPath());
            $resizeImage->resize($width,$height);
            $resizeImage->save($destination.$imageName,80);
            $fileName = $imageName;
        }
        $our_team_id = $request->our_team_id;
        $ourTeam = OurTeam::find($our_team_id);

        $ourTeam->master_id = '20';
        $ourTeam->name = $request->name;
        $ourTeam->email = $request->email ?? "";
        $ourTeam->designation = $request->designation ?? "";
        $ourTeam->description = $request->description ?? "";
        if($request->has('image')){
            $ourTeam->image = $fileName;
        }
        $ourTeam->status = $request->status;
        if($ourTeam->save()){
            return redirect()->route('our-team.index')->with('success', 'Our Team Updated successfully!');
        }
    }

    public function delete($id)
    {
        if(OurTeam::find($id)->delete()){
            return redirect()->route('our-team.index')->with('success', 'Our Team Deleted successfully!');
        }

    }

    public function deleteMultipletestimonail(Request $request)
    {
        $ids = $request->ids;
        $deleteMultipleCategory = OurTeam::whereIn('id', $ids)->delete();
        if ($deleteMultipleCategory) {
            echo json_encode('success');
        }
    }

    public function changeStatusCategory(Request $request)
    {
        $changeStatus = OurTeam::find($request->id);
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
