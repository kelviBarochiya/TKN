<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inquiry;

class EnquiryController extends Controller
{
    public function index()
    {
        $enquiry = Inquiry::orderBy('id', 'desc')->get();
        return view('admin.enquiry.list',compact('enquiry'));
    }
    
    public function serviceIndex()
    {
        $enquiry = \DB::table('service_contacts')->orderBy('id', 'desc')->get();
        return view('admin.enquiry.service_enquiry',compact('enquiry'));
    }

    public function create()
    {
        return view('admin.enquiry.form');   
    }

    public function save(Request $request)
    {

        $request->validate([
            'email' => 'required',
            'password' => 'required',
            'status' => 'required'
        ]);
        
        $enquiry = new Inquiry();
        $enquiry->master_id = '13';
        $enquiry->email = $request->email;
        $enquiry->password = bcrypt($request->password);
        $enquiry->status = $request->status;
        if($enquiry->save()){
            return redirect()->route('enquiries.index')->with('success', 'Enquiry Created successfully!');
        }
    }

    public function view($id)
    {
        $enquiry = Inquiry::find($id);
        return view('admin.enquiry.form',compact('enquiry'));
    }
    
    public function viewService($id)
    {
        $enquiry = \DB::table('service_contacts')->where('id', $id)->first();
        return view('admin.enquiry.formService',compact('enquiry'));
    }
    
    public function export()
    {
         $html = "";
        $count = 1;
        $html .= "<table class='table' bordered='1'>
        <tr>
            <th>Sr.no</th>
            <th>Name</th>
            <th>Email</th>
            <th>Mobile Number</th>
            <th>Subject</th>
            <th>Message</th>
        </tr>";
        $newsletter = \DB::table('inquiries')->get();
        foreach($newsletter as $key => $value)
        {
            $html .= "
                <tr>
                    <td>" . $count . "</td>
                    <td>" . $value->name . "</td>
                    <td>" . $value->email . "</td>
                    <td>" . $value->mobile . "</td>
                    <td>" . $value->subject . "</td>
                    <td>" . $value->message . "</td>
                </tr>";
            $count++;
        }
        $html .= "</table>";
        
        header('Content-Type: application/xls');
        header('Content-Disposition: attachment; filename=enquiries.xls');
        echo $html;
    }

    public function update(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
            'status' => 'required'
        ]);
        $enquiry_id = $request->enquiry_id;
        $enquiry = Inquiry::find($enquiry_id);
        $enquiry->master_id = '13';
        $enquiry->email = $request->email;
        $enquiry->password = bcrypt($request->password);
        $enquiry->status = $request->status;
        if($enquiry->save()){
            return redirect()->route('enquiries.index')->with('success', 'Enquiry Updated successfully!');
        }
    }
    
    public function deleteService($id)
    {
        if(\DB::table('service_contacts')->where('id',$id)->delete()){
            return redirect()->route('service-enquiries.index')->with('success', 'Enquiry Deleted successfully!');
        }

    }

    public function delete($id)
    {
        if(Inquiry::find($id)->delete()){
            return redirect()->route('enquiries.index')->with('success', 'Enquiry Deleted successfully!');
        }

    }

    public function deleteMultipleEnquiry(Request $request)
    {
        $ids = $request->ids;
        $deleteMultipleCategory = Inquiry::whereIn('id', $ids)->delete();
        if ($deleteMultipleCategory) {
            echo json_encode('success');
        }
    }

    public function changeStatusCategory(Request $request)
    {
        $changeStatus = Inquiry::find($request->id);
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
