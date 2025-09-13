<?php

namespace App\Http\Controllers;

use App\Models\Download;
use Illuminate\Http\Request;

class DownloadController extends Controller
{
    public function index()
    {
        $downloads = Download::latest()->paginate(10);
        return view('admin.downloads.index', compact('downloads'));
    }

    // ✅ Delete record
    public function destroy($id)
    {
        $download = Download::findOrFail($id);
        $download->delete();

        return redirect()->route('downloads.index')->with('success', 'Record deleted successfully.');
    }
}
