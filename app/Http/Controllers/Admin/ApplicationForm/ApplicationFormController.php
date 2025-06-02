<?php

namespace App\Http\Controllers\Admin\ApplicationForm;

use App\Http\Controllers\Controller;
use App\Models\ApplicationForm;
use Illuminate\Http\Request;

class ApplicationFormController extends Controller
{
    public function applicationForms(Request $request)
    {
        $result = ApplicationForm::query();

        if ($request->applications && $request->applications != null) {

            $status = $request->applications == 'Pending' ? 0 : ($request->applications == 'Approved' ? 1 : 2);

            $result = ApplicationForm::when($request->applications, function ($query) use ($status) {
                $query->where('approved_by_admin', $status);
            });
        }

        $applicationForms = $result->orderBy('id', 'desc')->paginate(10);

        return view('superAdmin.applicationForm.all', compact('applicationForms'));
    }

    public function changeStatus(Request $request, $id)
    {
        $applicationForm = ApplicationForm::findOrFail($id);
        if ($applicationForm) {

            $applicationForm->approved_by_admin = $request->application_form_status == 'Approve' ? 1 : 2;
            $applicationForm->approved_by_admin_id = auth()->user()->id;

            $applicationForm->save();

            return redirect()->back()->with('success', 'Application ' . $request->application_form_status . ' Successfully');
        }
    }
}
