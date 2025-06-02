<?php

namespace App\Http\Controllers\SuperAdmin\DataEntry;

use App\Http\Controllers\Controller;
use App\Http\Services\DataEntryService;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class DataEntryController extends Controller
{
    public $dataEntryService;

    public function __construct(DataEntryService $dataEntryService)
    {
        $this->dataEntryService = $dataEntryService;
    }

    public function list()
    {
        $dataEntryOperators = User::where('role_id', User::DATA_ENTRY_ROLE_ID)->orderBy('id', 'desc')->paginate(10);

        return view('superAdmin.dataEntryOperator.list', compact('dataEntryOperators'));
    }

    public function create()
    {
        return view('superAdmin.dataEntryOperator.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|confirmed|min:8',
        ]);

        $response = $this->dataEntryService->storeDataEntryOperator($request);

        return redirect(route('superAdmin.data.entry.operators.list'))->with($response['status'], $response['message']);
    }

    public function edit($id)
    {
        $dataEntryOperator = User::findOrFail($id);

        if ($dataEntryOperator) {
            return view('superAdmin.dataEntryOperator.edit', compact('dataEntryOperator'));
        }
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => ['required', Rule::unique('users')->ignore($id)],
        ]);


        $response = $this->dataEntryService->updateDataEntryOperator($id, $request);

        return redirect(route('superAdmin.data.entry.operators.list'))->with($response['status'], $response['message']);
    }

    public function delete($id)
    {
        $response = $this->dataEntryService->deleteDataEntryOperator($id);

        return redirect(route('superAdmin.data.entry.operators.list'))->with($response['status'], $response['message']);
    }
}
