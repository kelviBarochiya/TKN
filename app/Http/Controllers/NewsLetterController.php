<?php
namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class NewsLetterController extends Controller
{
    public function index()
    {
       
        $newsletter = DB::table('newsletter')->orderBy('id', 'desc')->get();
        return view('admin.newsletter.list',compact('newsletter'));
    }
    public function export()
    {
        $html = "";
        $count = 1;
        $html .= "<table class='table' bordered='1'>
        <tr>
            <th>Sr.no</th>
            <th>Email</th>
            <th>created at</th>
        </tr>";
        $newsletter = DB::table('newsletter')->get();
        foreach($newsletter as $key => $value)
        {
            $html .= "
                <tr>
                    <td>" . $count . "</td>
                    <td>" . $value->email . "</td>
                    <td>" . $value->created_at . "</td>
                </tr>";
            $count++;
        }
        $html .= "</table>";
        
        header('Content-Type: application/xls');
        header('Content-Disposition: attachment; filename=newsletter_email.xls');
        echo $html;
    }
    
   public function delete($id)
    {
        if(DB::table('newsletter')->where('id',$id)->delete()){
            return redirect()->route('newsletter.index')->with('success', 'NewsLetter  Deleted successfully!');
        }

    }

    public function deleteMultipleNewsLetter(Request $request)
    {
        $ids = $request->ids;
       
        $deleteMultipleCategory = DB::table('newsletter')->whereIn('id', $ids)->delete();
        if ($deleteMultipleCategory) {
            echo json_encode('success');
        }
    }


}
?>