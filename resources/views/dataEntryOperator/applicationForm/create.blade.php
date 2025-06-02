@extends('layouts.master')
@section('body')
    <form class="form fv-plugins-bootstrap5 fv-plugins-framework" action="{{route('dataEntry.store.application.form')}}" method="post">
        @csrf
        <div class="col-12 p-10 bg-white">
            <div class="mb-13 text-center">
                <h1 class="mb-3">Create Application Form</h1>
            </div>
            <div class="row g-9 mb-8">
                <div class="col-4 mb-10">
                    <label class="form-label fs-6 fw-bolder text-dark">Name</label>
                    <input class="form-control form-control-lg form-control-solid  @error('name') is-invalid @enderror"
                           type="text"
                           name="name"
                           value="{{ old('name') }}"
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
                           value="{{ old('father_or_husband_name') }}"
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
                           value="{{ old('age') }}"
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
                        <option value="single">Single</option>
                        <option value="married">Married</option>
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
                           value="{{ old('cnic') }}"
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
                           value="{{ old('education') }}"
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
                           value="{{ old('family_members') }}"
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
                           value="{{ old('total_men') }}"
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
                           value="{{ old('total_women') }}"
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
                           value="{{ old('total_children') }}"
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
                              placeholder="Please Type Your Complete Address Here"
                              required></textarea>
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
                            <option value="owner">Owner</option>
                            <option value="rental">Rental</option>
                    </select>
                    <input class="form-control form-control-lg form-control-solid mt-2"
                           placeholder="Please Enter Rent Amount"
                           type="number"
                           name="rent"
                           value="{{ old('rent') }}"
                           style="display: none;"/>
                </div>
                <div class="col-4 mb-10">
                    <label class="form-label fs-6 fw-bolder text-dark">Home Area (Sq. ft)</label>
                    <input class="form-control form-control-lg form-control-solid @error('home_area') is-invalid @enderror"
                           type="number"
                           step="any"
                           name="home_area"
                           value="{{ old('home_area') }}"
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
                           value="{{ old('source_of_income') }}"
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
                           value="{{ old('monthly_income') }}"
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
                           value="{{ old('total_expenses') }}"
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
                           value="{{ old('account_number') }}"
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
                           value="{{ old('phone_number') }}"
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
                           value="{{ old('other_financial_support') }}"
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
                              required></textarea>
                    @error('application_detail')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-lg btn-primary w-100 mb-5">
                    <span class="indicator-label">Create</span>
                </button>
            </div>
        </div>
    </form>
@endsection
@section('js')
    @include('dataEntryOperator.partials.applicationFormJs')
@endsection

{{--<div class="row g-9 mb-8">--}}
{{--    <div class="mb-2 text-center">--}}
{{--        <h4>Confirmation Of Approval</h4>--}}
{{--    </div>--}}
{{--    <div class="col-4 mt-0 mb-10">--}}
{{--        <label class="form-label fs-6 fw-bolder text-dark">Signatory Name 1</label>--}}
{{--        <input class="form-control form-control-lg form-control-solid  @error('first_signatory_name') is-invalid @enderror"--}}
{{--               type="text"--}}
{{--               name="first_signatory_name"--}}
{{--               value="{{ old('first_signatory_name') }}" required />--}}
{{--        @error('first_signatory_name')--}}
{{--        <span class="invalid-feedback" role="alert">--}}
{{--                        <strong>{{ $message }}</strong>--}}
{{--                    </span>--}}
{{--        @enderror--}}
{{--    </div>--}}
{{--    <div class="col-4 mt-0 mb-10">--}}
{{--        <label class="form-label fs-6 fw-bolder text-dark">Position</label>--}}
{{--        <input class="form-control form-control-lg form-control-solid  @error('first_signatory_position') is-invalid @enderror" type="text" name="first_signatory_position" value="{{ old('first_signatory_position') }}" required />--}}
{{--        @error('first_signatory_position')--}}
{{--        <span class="invalid-feedback" role="alert">--}}
{{--                        <strong>{{ $message }}</strong>--}}
{{--                    </span>--}}
{{--        @enderror--}}
{{--    </div>--}}
{{--    <div class="col-4 mt-0 mb-10">--}}
{{--        <label class="form-label fs-6 fw-bolder text-dark">Phone No</label>--}}
{{--        <input class="form-control form-control-lg form-control-solid  @error('first_signatory_phone') is-invalid @enderror" type="text" name="first_signatory_phone" value="{{ old('first_signatory_phone') }}" required />--}}
{{--        @error('first_signatory_phone')--}}
{{--        <span class="invalid-feedback" role="alert">--}}
{{--                        <strong>{{ $message }}</strong>--}}
{{--                    </span>--}}
{{--        @enderror--}}
{{--    </div>--}}

{{--    <div class="col-4 mt-0 mb-10">--}}
{{--        <label class="form-label fs-6 fw-bolder text-dark">Signatory Name 2</label>--}}
{{--        <input class="form-control form-control-lg form-control-solid  @error('second_signatory_name') is-invalid @enderror" type="text" name="second_signatory_name" value="{{ old('second_signatory_name') }}"  />--}}
{{--        @error('second_signatory_name')--}}
{{--        <span class="invalid-feedback" role="alert">--}}
{{--                        <strong>{{ $message }}</strong>--}}
{{--                    </span>--}}
{{--        @enderror--}}
{{--    </div>--}}
{{--    <div class="col-4 mt-0 mb-10">--}}
{{--        <label class="form-label fs-6 fw-bolder text-dark">Position</label>--}}
{{--        <input class="form-control form-control-lg form-control-solid  @error('second_signatory_position') is-invalid @enderror" type="text" name="second_signatory_position" value="{{ old('second_signatory_position') }}"  />--}}
{{--        @error('second_signatory_position')--}}
{{--        <span class="invalid-feedback" role="alert">--}}
{{--                        <strong>{{ $message }}</strong>--}}
{{--                    </span>--}}
{{--        @enderror--}}
{{--    </div>--}}
{{--    <div class="col-4 mt-0 mb-10">--}}
{{--        <label class="form-label fs-6 fw-bolder text-dark">Phone No</label>--}}
{{--        <input class="form-control form-control-lg form-control-solid  @error('second_signatory_phone') is-invalid @enderror" type="number" name="second_signatory_phone" value="{{ old('second_signatory_phone') }}"  />--}}
{{--        @error('second_signatory_phone')--}}
{{--        <span class="invalid-feedback" role="alert">--}}
{{--                        <strong>{{ $message }}</strong>--}}
{{--                    </span>--}}
{{--        @enderror--}}
{{--    </div>--}}
{{--</div>--}}

{{--<div class="row g-9 mb-8">--}}
{{--    <div class="col-4 mt-0 mb-10">--}}
{{--        <label class="form-label fs-6 fw-bolder text-dark">Approved Amount</label>--}}
{{--        <input class="form-control form-control-lg form-control-solid  @error('approved_amount') is-invalid @enderror" type="number" name="approved_amount" value="{{ old('approved_amount') }}" required />--}}
{{--        @error('approved_amount')--}}
{{--        <span class="invalid-feedback" role="alert">--}}
{{--                        <strong>{{ $message }}</strong>--}}
{{--                    </span>--}}
{{--        @enderror--}}
{{--    </div>--}}
{{--    <div class="col-4 mt-0 mb-10">--}}
{{--        <label class="form-label fs-6 fw-bolder text-dark">President</label>--}}
{{--        <input class="form-control form-control-lg form-control-solid  @error('president') is-invalid @enderror" type="text" name="president" value="{{ old('president') }}" required />--}}
{{--        @error('president')--}}
{{--        <span class="invalid-feedback" role="alert">--}}
{{--                        <strong>{{ $message }}</strong>--}}
{{--                    </span>--}}
{{--        @enderror--}}
{{--    </div>--}}
{{--    <div class="col-4 mt-0 mb-10">--}}
{{--        <label class="form-label fs-6 fw-bolder text-dark">Committee</label>--}}
{{--        <input class="form-control form-control-lg form-control-solid  @error('committee') is-invalid @enderror" type="text" name="committee" value="{{ old('committee') }}" required />--}}
{{--        @error('committee')--}}
{{--        <span class="invalid-feedback" role="alert">--}}
{{--                        <strong>{{ $message }}</strong>--}}
{{--                    </span>--}}
{{--        @enderror--}}
{{--    </div>--}}
{{--</div>--}}
