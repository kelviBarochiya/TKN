<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $getSetting = Setting::first();
        return view('admin.setting.form', compact('getSetting'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $getSetting = Setting::orderBy('id', 'desc')->first();
        return view('admin.setting.form', compact('getSetting'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function save(Request $request)
    {
        
        $imageName = "";
        $setting = new Setting;
        $setting->master_id = "1";

        if ($request->has('logo')) {
            $file = $request->file('logo');

            $imageName = time() . $file->getClientOriginalName();

            $file->move(public_path('images/'), $imageName);
        }

        $setting->site_name = $request->site_name;
        $setting->site_url = $request->site_url ?? "test";
        $setting->primary_color = $request->primary_color ?? "";
        $setting->secondary_color = $request->secondary_color ?? "";
        if ($request->has('logo')) {
            $setting->logo = $imageName;
        }
        $setting->footer_content = $request->footer_content;
        // $footer_phone = preg_replace('/\s+/', '', $request->footer_phone);
        // $setting->footer_phone = $request->footer_phone;
        $setting->list_link = "";
        $setting->template_id = $request->template;
        $setting->twitter = $request->twitter;
        $setting->facebook = $request->facebook;
        $setting->linkedin = $request->linkedin;
        $setting->instagram = $request->instagram;
        $setting->youtube = $request->youtube;
        if ($setting->save()) {
            return redirect()->route('settings.index')->with('success', 'Setting Created successfully!');
        }
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $getSetting = Setting::where('id', $id)->first();
        return view('admin.setting.form', compact('getSetting'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $fileName = "";
        if ($request->has('logo')) {
            $file = $request->file('logo');

            $fileName = time() . $file->getClientOriginalName();

            $file->move(public_path('images/'), $fileName);
        }
      
        $setting_id = $request->setting_id;
        $setting = Setting::find($setting_id);

        $setting->master_id = "1";
        if ($request->has('logo')) {
            $setting->logo = $fileName;
        }

        $setting->site_name = $request->site_name;
        $setting->site_url = $request->site_url;
        $setting->primary_color = $request->primary_color ?? "";
        $setting->secondary_color = $request->secondary_color ?? "";
        $setting->template_id = $request->template;
        $setting->twitter = $request->twitter ?? "";
        $setting->facebook = $request->facebook ?? "";
        $setting->linkedin = $request->linkedin ?? "";
        $setting->instagram = $request->instagram ?? "";
        $setting->youtube = $request->youtube ?? "";
        $setting->footer_content = $request->footer_content;
        // $footer_phone = preg_replace('/\s+/', '', $request->footer_phone);
        // $setting->footer_phone = $request->footer_phone;

        if ($setting->save()) {
            return redirect()->route('settings.index')->with('success', 'Setting Updated successfully!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        if (Setting::find($id)->delete()) {
            return redirect()->route('settings.index')->with('success', 'Setting Deleted successfully!');
        }
    }

    public function deleteMultipleSetting(Request $request)
    {
        $ids = $request->ids;
        $deleteMultipleCategory = Setting::whereIn('id', $ids)->delete();
        if ($deleteMultipleCategory) {
            echo json_encode('success');
        }
    }
}
