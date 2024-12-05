<?php

namespace App\Http\Controllers\Admin\Report;

use App\Http\Controllers\Controller;
use App\Models\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        $reports = Report::with('user')
            ->with('doctor')
            ->paginate(12);
        return view('admin.pages.reports.index', compact('reports'));
    }

    public function search(Request $request)
    {
        $reports = Report::where('patient_id', 'like', "%$request->search%")
            ->with('user')
            ->with('doctor')
            ->paginate(5);
        return view('admin.pages.reports.index', compact('reports'));
    }

    public function destroy(Report $report)
    {
        $report->delete();
        return back()->with('success', 'Report deleted successfully');
    }
}
