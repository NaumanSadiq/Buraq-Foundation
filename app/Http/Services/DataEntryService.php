<?php

namespace App\Http\Services;

use App\Models\User;

class DataEntryService
{
    public function storeDataEntryOperator($request)
    {
        User::create([
            'role_id' => User::DATA_ENTRY_ROLE_ID,
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return [
            'status' => 'success',
            'message' => 'Data Entry Operator Created Successfully'
        ];
    }

    public function updateDataEntryOperator($id, $request)
    {
        $dataEntryOperator = User::findOrFail($id);

        if ($dataEntryOperator) {
            $dataEntryOperator->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);

            return [
                'status' => 'success',
                'message' => 'Data Entry Operator Updated Successfully'
            ];
        }
    }

    public function deleteDataEntryOperator($id)
    {
        $dataEntryOperator = User::findOrFail($id);

        if ($dataEntryOperator) {
            $dataEntryOperator->delete();

            return [
                'status' => 'success',
                'message' => 'Data Entry Operator Deleted Successfully'
            ];
        }
    }


}
