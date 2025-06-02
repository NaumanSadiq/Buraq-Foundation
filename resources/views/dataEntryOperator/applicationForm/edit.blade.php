@extends('layouts.master')
@section('body')
    <form class="form fv-plugins-bootstrap5 fv-plugins-framework" action="{{URL::signedRoute('dataEntry.update.application.form',$applicationForm->id)}}" method="post">
        @csrf
        @method('PUT')
        <div class="col-12 p-10 bg-white">
            <div class="mb-13 text-center">
                <h1 class="mb-3">Update Application Form</h1>
            </div>
            <div class="row g-9 mb-8">
                <div class="col-4 mb-10">
                    <label class="form-label fs-6 fw-bolder text-dark">Name</label>
                    <input class="form-control form-control-lg form-control-solid  @error('name') is-invalid @enderror"
                           type="text"
                           name="name"
                           value="{{ $applicationForm->name }}"
                           required />
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="col-4 mb-10">
                    <label class="form-label fs-6 fw-bolder text-dark">Father/Husband Name</label>
                    <input class="form-control form-control-lg form-control-solid  @error('father_or_husband_name') is-invalid @enderror"
                           type="text"
                           name="father_or_husband_name"
                           value="{{ $applicationForm->father_or_husband_name }}"
                           required />
                    @error('father_or_husband_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="col-4 mb-10">
                    <label class="form-label fs-6 fw-bolder text-dark">Age</label>
                    <input class="form-control form-control-lg form-control-solid  @error('age') is-invalid @enderror"
                           type="number"
                           name="age"
                           value="{{ $applicationForm->age }}"
                           required />
                    @error('age')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="col-4 mb-10">
                    <label class="form-label fs-6 fw-bolder text-dark">Martial Status</label>
                    <select class="form-select form-select-solid select2-hidden-accessible @error('martial_status') is-invalid @enderror"
                            data-control="select2"
                            data-hide-search="true"
                            data-placeholder="Please Select Martial Status"
                            name="martial_status"
                            tabindex="-1"
                            aria-hidden="true"
                            required>
                        <option value="">Please Select</option>
                        <option value="single" {{$applicationForm->martial_status == 'single' ? 'selected' : ''}}>Single</option>
                        <option value="married" {{$applicationForm->martial_status == 'married' ? 'selected' : ''}}>Married</option>
                    </select>
                    @error('martial_status')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="col-4 mb-10">
                    <label class="form-label fs-6 fw-bolder text-dark">CNIC</label>
                    <input class="form-control form-control-lg form-control-solid cnic  @error('cnic') is-invalid @enderror"
                           type="text"
                           name="cnic"
                           value="{{ $applicationForm->cnic }}"
                           data-inputmask-clearincomplete="true"
                           required />
                    @error('cnic')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="col-4 mb-10">
                    <label class="form-label fs-6 fw-bolder text-dark">Education</label>
                    <input class="form-control form-control-lg form-control-solid  @error('education') is-invalid @enderror"
                           type="text"
                           name="education"
                           value="{{ $applicationForm->education }}"
                           required />
                    @error('education')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="row g-9 mb-8">
                <div class="col-3 mb-10">
                    <label class="form-label fs-6 fw-bolder text-dark">No. Of Family Members</label>
                    <input class="form-control form-control-lg form-control-solid  @error('family_members') is-invalid @enderror"
                           type="number"
                           name="family_members"
                           value="{{ $applicationForm->family_members }}"
                           required />
                    @error('family_members')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="col-3 mb-10">
                    <label class="form-label fs-6 fw-bolder text-dark">No. Of Men</label>
                    <input class="form-control form-control-lg form-control-solid  @error('total_men') is-invalid @enderror"
                           type="number"
                           name="total_men"
                           value="{{ $applicationForm->total_men }}"
                           required />
                    @error('total_men')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="col-3 mb-10">
                    <label class="form-label fs-6 fw-bolder text-dark">No. Of Women</label>
                    <input class="form-control form-control-lg form-control-solid  @error('total_women') is-invalid @enderror"
                           type="number"
                           name="total_women"
                           value="{{ $applicationForm->total_women }}"
                           required />
                    @error('total_women')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="col-3 mb-10">
                    <label class="form-label fs-6 fw-bolder text-dark">No. Of Children</label>
                    <input class="form-control form-control-lg form-control-solid  @error('total_children') is-invalid @enderror"
                           type="number"
                           name="total_children"
                           value="{{ $applicationForm->total_children }}"
                           required />
                    @error('total_children')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="row g-9 mb-8">
                <div class="col-4 mb-10">
                    <label class="form-label fs-6 fw-bolder text-dark">Address</label>
                    <textarea class="form-control form-control-solid @error('address') is-invalid @enderror"
                              rows="3"
                              name="address"
                              required>{{ $applicationForm->address }}</textarea>
                    @error('address')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="col-4 mb-10">
                    <label class="form-label fs-6 fw-bolder text-dark">Home Ownership</label>
                    <select class="form-select form-select-solid select2-hidden-accessible homeOwnerShip @error('home_ownership') is-invalid @enderror"
                            data-control="select2"
                            data-hide-search="true"
                            data-placeholder="Please Select Home Ownership"
                            name="home_ownership"
                            tabindex="-1"
                            aria-hidden="true">
                        <option value="">Please Select</option>
                        <option value="owner" {{ $applicationForm->home_ownership == "owner" ? 'selected' : '' }}>Owner</option>
                        <option value="rental" {{ $applicationForm->home_ownership == "rental" ? 'selected' : '' }}>Rental</option>
                    </select>
                    <input class="form-control form-control-lg form-control-solid mt-2"
                           placeholder="Please Enter Rent Amount"
                           type="number"
                           name="rent"
                           value="{{ $applicationForm->rent }}"
                           style="display: {{ $applicationForm->home_ownership == "owner" ? 'none' : 'block' }}"/>
                </div>
                <div class="col-4 mb-10">
                    <label class="form-label fs-6 fw-bolder text-dark">Home Area (Sq. ft)</label>
                    <input class="form-control form-control-lg form-control-solid @error('home_area') is-invalid @enderror"
                           type="number"
                           step="any"
                           name="home_area"
                           value="{{ $applicationForm->home_area }}"
                           required/>
                    @error('home_area')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="col-4 mb-10">
                    <label class="form-label fs-6 fw-bolder text-dark">Source Of Income</label>
                    <input class="form-control form-control-lg form-control-solid  @error('source_of_income') is-invalid @enderror"
                           type="text"
                           name="source_of_income"
                           value="{{ $applicationForm->source_of_income }}"
                           required />
                    @error('source_of_income')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="col-4 mb-10">
                    <label class="form-label fs-6 fw-bolder text-dark">Total Monthly Income</label>
                    <input class="form-control form-control-lg form-control-solid  @error('monthly_income') is-invalid @enderror"
                           type="number"
                           name="monthly_income"
                           value="{{ $applicationForm->monthly_income }}"
                           required />
                    @error('monthly_income')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-4 mb-10">
                    <label class="form-label fs-6 fw-bolder text-dark">Total Expenses</label>
                    <input class="form-control form-control-lg form-control-solid  @error('total_expenses') is-invalid @enderror"
                           type="number"
                           name="total_expenses"
                           value="{{ $applicationForm->total_expenses }}"
                           required />
                    @error('total_expenses')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="col-4 mb-10">
                    <label class="form-label fs-6 fw-bolder text-dark">Account Number</label>
                    <input class="form-control form-control-lg form-control-solid  @error('account_number') is-invalid @enderror"
                           type="text"
                           name="account_number"
                           value="{{ $applicationForm->account_number }}"
                           required />
                    @error('account_number')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="col-4 mb-10">
                    <label class="form-label fs-6 fw-bolder text-dark">Phone Number</label>
                    <input class="form-control form-control-lg form-control-solid  @error('phone_number') is-invalid @enderror"
                           type="tel"
                           name="phone_number"
                           value="{{ $applicationForm->phone_number }}"
                           required />
                    @error('phone_number')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="col-4 mb-10">
                    <label class="form-label fs-6 fw-bolder text-dark">Other Financial Support</label>
                    <input class="form-control form-control-lg form-control-solid  @error('other_financial_support') is-invalid @enderror"
                           type="text"
                           name="other_financial_support"
                           value="{{ $applicationForm->other_financial_support }}"
                    />
                    @error('other_financial_support')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="row g-9 mb-8">
                <div class="mb-2 text-center">
                    <h4>Application From Detail</h4>
                </div>
                <div class="col-12 mt-0">
                    <label class="form-label fs-6 fw-bolder text-dark">Detail</label>
                    <textarea class="form-control form-control-solid @error('application_detail') is-invalid @enderror"
                              rows="6"
                              name="application_detail"
                              placeholder="Please Type Application Details Here"
                              required>{{ $applicationForm->application_detail }}</textarea>
                    @error('application_detail')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-lg btn-primary w-100 mb-5">
                    <span class="indicator-label">Update</span>
                </button>
            </div>
        </div>
    </form>
@endsection
@section('js')
    @include('dataEntryOperator.partials.applicationFormJs')
@endsection
