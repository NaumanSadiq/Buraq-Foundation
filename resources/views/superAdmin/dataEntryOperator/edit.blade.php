@extends('layouts.master')
@section('body')
    <form class="form fv-plugins-bootstrap5 fv-plugins-framework" action="{{URL::signedRoute('superAdmin.update.data.entry.operator',$dataEntryOperator->id)}}" method="post">
        @csrf
        @method('PUT')
        <div class="col-6 p-10 bg-white">
            <div class="mb-13 text-center">
                <h1 class="mb-3">Edit Data Entry Operator</h1>
            </div>
            <div class="fv-row mb-10">
                <label class="form-label fs-6 fw-bolder text-dark">Name</label>
                <input class="form-control form-control-lg form-control-solid  @error('name') is-invalid @enderror" type="text" name="name" value="{{$dataEntryOperator->name}}" required />
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="fv-row mb-10">
                <label class="form-label fs-6 fw-bolder text-dark">Email</label>
                <input class="form-control form-control-lg form-control-solid  @error('email') is-invalid @enderror" type="email" name="email" autocomplete="off" value="{{$dataEntryOperator->email}}" required />
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="text-center">
                <button type="submit" id="kt_sign_in_submit" class="btn btn-lg btn-primary w-100 mb-5">
                    <span class="indicator-label">Update</span>
                </button>
            </div>
        </div>
    </form>
@endsection
