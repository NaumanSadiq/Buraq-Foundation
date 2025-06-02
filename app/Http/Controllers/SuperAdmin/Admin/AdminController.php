<?php

namespace App\Http\Controllers\SuperAdmin\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\AdminService;
use App\Http\Services\DataEntryService;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{
    public $adminService;

    public function __construct(AdminService $adminService)
    {
        $this->adminService = $adminService;
    }


    public function list()
    {
        $admins = User::where('role_id', User::ADMIN_ROLE_ID)->orderBy('id', 'desc')->paginate(10);

        return view('superAdmin.admin.list', compact('admins'));
    }

    public function create()
    {
        return view('superAdmin.admin.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|confirmed|min:8',
        ]);

        $response = $this->adminService->storeAdmin($request);

        return redirect(route('superAdmin.admins.list'))->with($response['status'], $response['message']);
    }

    public function edit($id)
    {
        $admin = User::findOrFail($id);

        if ($admin) {
            return view('superAdmin.admin.edit', compact('admin'));
        }
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => ['required', Rule::unique('users')->ignore($id)],
        ]);


        $response = $this->adminService->updateAdmin($id, $request);

        return redirect(route('superAdmin.admins.list'))->with($response['status'], $response['message']);
    }

    public function delete($id)
    {
        $response = $this->adminService->deleteAdmin($id);

        return redirect(route('superAdmin.admins.list'))->with($response['status'], $response['message']);
    }
}
