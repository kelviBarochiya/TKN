<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faq;

class FaqController extends Controller
{
    public function index()
    {
        
        $faq = Faq::orderBy('id', 'desc')->get();
        return view('admin.faq.list',compact('faq'));
    }

    public function create()
    {
        return view('admin.faq.form');   
    }

    public function save(Request $request)
    {
        
        $request->validate([
            'question' => 'required',
            'answer' => 'required',
            'status' => 'required'
        ]);
        
        $faq = new Faq();
        $faq->master_id = '19';
        $faq->question = $request->question;
        $faq->answer = $request->answer;
        $faq->status = $request->status;
        if($faq->save()){
            return redirect()->route('faq.index')->with('success', 'FAQ Created successfully!');
        }
    }

    public function edit($id)
    {
        $faq = Faq::find($id);
        return view('admin.faq.form',compact('faq'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'question' => 'required',
            'answer' => 'required',
            'status' => 'required'
        ]);

        $faq_id = $request->faq_id;
        $faq = Faq::find($faq_id);
        $faq->question = $request->question;
        $faq->answer = $request->answer;
        $faq->status = $request->status;
        if($faq->save()){
            return redirect()->route('faq.index')->with('success', 'FAQ Updated successfully!');
        }
    }

    public function delete($id)
    {
        if(Faq::find($id)->delete()){
            return redirect()->route('faq.index')->with('success', 'FAQ Deleted successfully!');
        }

    }

    public function deleteMultipleCategory(Request $request)
    {
        $ids = $request->ids;
        $deleteMultipleCategory = Faq::whereIn('id', $ids)->delete();
        if ($deleteMultipleCategory) {
            echo json_encode('success');
        }
    }

    public function changeStatusCategory(Request $request)
    {
        $changeStatus = Faq::find($request->id);
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
