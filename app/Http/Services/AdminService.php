<?php

namespace App\Http\Services;

use App\Models\User;

class AdminService
{
    public function storeAdmin($request)
    {
        User::create([
            'role_id' => User::ADMIN_ROLE_ID,
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return [
            'status' => 'success',
            'message' => 'Admin Created Successfully'
        ];
    }

    public function updateAdmin($id, $request)
    {
        $admin = User::findOrFail($id);

        if ($admin) {
            $admin->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);

            return [
                'status' => 'success',
                'message' => 'Admin Updated Successfully'
            ];
        }
    }

    public function deleteAdmin($id)
    {
        $admin = User::findOrFail($id);

        if ($admin) {
            $admin->delete();

            return [
                'status' => 'success',
                'message' => 'Admin Deleted Successfully'
            ];
        }
    }
}
