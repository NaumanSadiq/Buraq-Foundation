<?php

namespace App\Http\Controllers\DataEntryOperator\ApplicationForm;

use App\Http\Controllers\Controller;
use App\Http\Services\ApplicationFormService;
use App\Models\ApplicationForm;
use Illuminate\Http\Request;

class ApplicationFormController extends Controller
{
    public $applicationFormService;

    public function __construct(ApplicationFormService $applicationFormService)
    {
        $this->applicationFormService = $applicationFormService;
    }

    public function list()
    {
        $applicationForms = ApplicationForm::where('user_id', auth()->user()->id)->orderBy('id', 'desc')->paginate(10);

        return view('dataEntryOperator.applicationForm.list', compact('applicationForms'));
    }

    public function create()
    {
        return view('dataEntryOperator.applicationForm.create');
    }

    public function store(Request $request)
    {
        $response = $this->applicationFormService->storeApplicationForm($request);

        return redirect(route('dataEntry.application.forms.list'))->with($response['status'], $response['message']);
    }

    public function view(Request $request)
    {
        $applicationForm = ApplicationForm::findOrFail($request->id);

        if ($applicationForm) {
            return response()->json([
                'status' => 'success',
                'applicationFrom' => $applicationForm
            ]);
        }
    }

    public function edit(Request $request)
    {
        $applicationForm = ApplicationForm::findOrFail($request->applicationformId);

        if ($applicationForm && $applicationForm->approved_by_admin == 0) {
            return view('dataEntryOperator.applicationForm.edit', compact('applicationForm'));
        } else {
            return redirect()->back()->with('error', 'Cannot Edit This Application. Because It\'s Not In Pending Status');
        }
    }

    public function update($id, Request $request)
    {
        $response = $this->applicationFormService->updateApplicationForm($id, $request);

        return redirect(route('dataEntry.application.forms.list'))->with($response['status'], $response['message']);
    }

    public function delete($id)
    {
        $response = $this->applicationFormService->deleteApplicationForm($id);

        return redirect(route('dataEntry.application.forms.list'))->with($response['status'], $response['message']);
    }

}
