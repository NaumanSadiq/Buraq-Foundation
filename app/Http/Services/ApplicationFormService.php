<?php

namespace App\Http\Services;

use App\Models\ApplicationForm;

class ApplicationFormService
{
    public function storeApplicationForm($request)
    {
        ApplicationForm::create([
            "user_id" => auth()->user()->id,
            "approved_by_super_admin" => 0,
            "approved_by_admin" => 0,
            "approved_by_super_admin_id" => null,
            "approved_by_admin_id" => null,
            "name" => $request->name,
            "father_or_husband_name" => $request->father_or_husband_name,
            "age" => $request->age,
            "martial_status" => $request->martial_status,
            "cnic" => $request->cnic,
            "education" => $request->education,
            "family_members" => $request->family_members,
            "total_men" => $request->total_men,
            "total_women" => $request->total_women,
            "total_children" => $request->total_children,
            "address" => $request->address,
            "home_ownership" => $request->home_ownership,
            "rent" => $request->rent,
            "home_area" => $request->home_area,
            "source_of_income" => $request->source_of_income,
            "monthly_income" => $request->monthly_income,
            "total_expenses" => $request->total_expenses,
            "account_number" => $request->account_number,
            "phone_number" => $request->phone_number,
            "other_financial_support" => $request->other_financial_support,
            "application_detail" => $request->application_detail,
        ]);

        return [
            'status' => 'success',
            'message' => 'Application Form Created Successfully'
        ];
    }

    public function updateApplicationForm($id, $request)
    {
        $applicationForm = ApplicationForm::findOrFail($id);

        if ($applicationForm) {
            $applicationForm->update([
                "name" => $request->name,
                "father_or_husband_name" => $request->father_or_husband_name,
                "age" => $request->age,
                "martial_status" => $request->martial_status,
                "cnic" => $request->cnic,
                "education" => $request->education,
                "family_members" => $request->family_members,
                "total_men" => $request->total_men,
                "total_women" => $request->total_women,
                "total_children" => $request->total_children,
                "address" => $request->address,
                "home_ownership" => $request->home_ownership,
                "rent" => $request->rent,
                "home_area" => $request->home_area,
                "source_of_income" => $request->source_of_income,
                "monthly_income" => $request->monthly_income,
                "total_expenses" => $request->total_expenses,
                "account_number" => $request->account_number,
                "phone_number" => $request->phone_number,
                "other_financial_support" => $request->other_financial_support,
                "application_detail" => $request->application_detail,
            ]);

            return [
                'status' => 'success',
                'message' => 'Application Form Updated Successfully'
            ];
        }
    }

    public function deleteApplicationForm($id)
    {
        $applicationForm = ApplicationForm::findOrFail($id);

        if ($applicationForm) {
            $applicationForm->delete();

            return [
                'status' => 'success',
                'message' => 'Application Form Deleted Successfully'
            ];
        }
    }
}
