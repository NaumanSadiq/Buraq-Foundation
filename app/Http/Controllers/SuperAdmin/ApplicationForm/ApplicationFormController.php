<?php

namespace App\Http\Controllers\SuperAdmin\ApplicationForm;

use App\Http\Controllers\Controller;
use App\Models\ApplicationForm;
use Illuminate\Http\Request;

class ApplicationFormController extends Controller
{
    public function all()
    {
        $applicationForms = ApplicationForm::orderBy('id', 'desc')->paginate(10);

        return view('superAdmin.applicationForm.all', compact('applicationForms'));
    }

    public function changeStatus(Request $request, $id)
    {
        $applicationForm = ApplicationForm::findOrFail($id);
        if ($applicationForm) {

            $applicationForm->approved_by_super_admin = $request->application_form_status == 'Approve' ? 1 : 2;
            $applicationForm->approved_by_super_admin_id = auth()->user()->id;

            $applicationForm->save();

            return redirect()->back()->with('success', 'Application ' . $request->application_form_status . ' Successfully');
        }
    }
}
