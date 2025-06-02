<?php

namespace App\Http\Controllers\Admin\Main;

use App\Http\Controllers\Controller;
use App\Models\ApplicationForm;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function dashboard()
    {
        $pendingApplicationForms = ApplicationForm::where('approved_by_admin', 0)->count();
        $approvedApplicationForms = ApplicationForm::where('approved_by_admin', 1)->count();
        $rejectedApplicationForms = ApplicationForm::where('approved_by_admin', 2)->count();

        return view('admin.dashboard', compact('pendingApplicationForms', 'approvedApplicationForms', 'rejectedApplicationForms'));
    }
}
