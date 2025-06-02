@extends('layouts.master')
@section('body')
    <div class="card mb-5 mb-xl-8">
        <div class="card-header border-0 pt-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bolder fs-3 mb-1">Application Form</span>
            </h3>
            @if(auth()->user()->isAdmin())
                <form action="{{route('admin.get.application.forms')}}" method="get" id="getApplicationForms" style="width: 20%; !important;">
                    <select class="form-select form-select-solid select2-hidden-accessible applicationFormStatus"
                            data-control="select2"
                            data-hide-search="true"
                            name="applications"
                            tabindex="-1"
                            aria-hidden="true">
                        <option value="All">All</option>
                        <option value="Approved" {{request()->applications == 'Approved' ? 'selected' : ''}}>Approved</option>
                        <option value="Rejected" {{request()->applications == 'Rejected' ? 'selected' : ''}}>Rejected</option>
                        <option value="Pending" {{request()->applications == 'Pending' ? 'selected' : ''}}>Pending</option>
                    </select>
                </form>
            @endif
        </div>
        <div class="card-body pt-3">
            <div class="table-responsive">
                <table class="table table-row-dashed table-row-gray-300 align-middle gs-4 gy-4 bg-white">
                    <thead>
                    <tr class="border-0">
                        <th class="text-dark fw-bolder">CNIC</th>
                        <th class="text-dark fw-bolder">Name</th>
                        <th class="text-dark fw-bolder text-nowrap">Father/Husband Name</th>
                        <th class="text-dark fw-bolder">Age</th>
                        <th class="text-dark fw-bolder text-nowrap">Martial Status</th>
                        <th class="text-dark fw-bolder text-nowrap">Family Members</th>
                        <th class="text-dark fw-bolder">Actions</th>
                        @if(auth()->user()->isSuperAdmin())
                            <th class="text-dark fw-bolder text-nowrap">Admin Side Status</th>
                        @endif
                        <th class="text-dark fw-bolder">Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($applicationForms as $applicationForm)
                        <tr>
                            <td class="text-nowrap">{{$applicationForm->cnic}}</td>
                            <td class="text-nowrap" title="{{$applicationForm->name}}">
                                {{mb_strimwidth($applicationForm->name, 0 ,10, '...') }}
                            </td>
                            <td title="{{$applicationForm->father_or_husband_name}}">
                                {{mb_strimwidth($applicationForm->father_or_husband_name, 0 ,10, '...') }}
                            </td>
                            <td>{{$applicationForm->age}}</td>
                            <td>{{$applicationForm->martial_status}}</td>
                            <td>{{$applicationForm->family_members}}</td>
                            <td class="d-flex border-0">
                                <a href="javascript:void(0)"
                                   class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-2 applicationFormModal"
                                   data-bs-toggle="modal"
                                   data-bs-target="#applicationFormModalPopup"
                                   data-id="{{$applicationForm->id}}">
                                    <i class="bi bi-eye"></i>
                                </a>
                                @if(auth()->user()->isDataEntryOperator() && $applicationForm->approved_by_admin == 0)
                                    <form
                                        action="{{URL::signedRoute('dataEntry.delete.application.form',$applicationForm->id)}}"
                                        method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm"
                                                onclick="return confirm('Are you sure you want to delete this application form')">
                                            <span class="svg-icon svg-icon-3">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                     viewBox="0 0 24 24" fill="none">
                                                    <path
                                                        d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z"
                                                        fill="black"></path>
                                                    <path opacity="0.5"
                                                          d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z"
                                                          fill="black"></path>
                                                    <path opacity="0.5"
                                                          d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z"
                                                          fill="black"></path>
                                                </svg>
                                            </span>
                                        </button>
                                    </form>
                                @endif
                            </td>
                            @if(auth()->user()->isSuperAdmin())
                                <td>
                                    <p class="badge fw-bold fs-5 me-1
                                            {{$applicationForm->approved_by_admin == 0 ? 'badge-light-primary' : ($applicationForm->approved_by_admin == 1 ? 'badge-light-success' : 'badge-light-danger')}}">
                                        {{$applicationForm->approved_by_admin == 0 ? 'Pending' : ($applicationForm->approved_by_admin == 1 ? 'Approved' : 'Rejected')}}
                                    </p>
                                </td>
                            @endif
                            @if(auth()->user()->isAdmin())
                                <td>
                                    @if($applicationForm->approved_by_admin != 0)
                                        <p class="badge fw-bold fs-5 me-1 {{$applicationForm->approved_by_admin == 1 ? 'badge-light-success' : 'badge-light-danger' }}">
                                            {{$applicationForm->approved_by_admin == 1 ? 'Approved' : 'Rejected'}}
                                        </p>
                                    @else
                                        <form action="{{URL::signedRoute('admin.change.application.form.status', $applicationForm->id)}}"
                                              method="post"
                                              id="adminChangeFormStatus{{$applicationForm->id}}">
                                            @csrf
                                            <select class="form-select form-select-solid select2-hidden-accessible adminChangeFormStatus"
                                                data-id="{{$applicationForm->id}}"
                                                data-control="select2"
                                                data-hide-search="true"
                                                name="application_form_status"
                                                tabindex="-1"
                                                aria-hidden="true">
                                                <option value="Pending" selected disabled>Pending</option>
                                                <option value="Approve">Approve</option>
                                                <option value="Reject">Reject</option>
                                            </select>
                                        </form>
                                    @endif
                                </td>
                            @elseif(auth()->user()->isDataEntryOperator())
                                <td class="text-nowrap">
                                    Admin:
                                        @if($applicationForm->approved_by_admin == 0)
                                            <span class="badge-light-primary"> pending</span>
                                        @else
                                            <span class="{{$applicationForm->approved_by_admin == 1 ? 'badge-light-success' : 'badge-light-danger' }}">
                                                {{$applicationForm->approved_by_admin == 1 ? ' approved' : ' rejected' }}
                                            </span>
                                        @endif
                                    <br>
                                    Super Admin:
                                        @if($applicationForm->approved_by_super_admin == 0)
                                            <span class="badge-light-primary"> pending</span>
                                        @else
                                            <span class="{{$applicationForm->approved_by_super_admin == 1 ? 'badge-light-success' : 'badge-light-danger' }}">
                                                {{$applicationForm->approved_by_super_admin == 1 ? ' approved' : ' rejected' }}
                                            </span>
                                        @endif
                                    <br>
                                </td>
                            @elseif(auth()->user()->isSuperAdmin())
                                <td>
                                    @if($applicationForm->approved_by_admin == 1)
                                        @if($applicationForm->approved_by_super_admin != 0)
                                            <p class="badge fw-bold fs-5 me-1 {{$applicationForm->approved_by_super_admin == 1 ? 'badge-light-success' : 'badge-light-danger' }}">
                                                {{$applicationForm->approved_by_super_admin == 1 ? 'Approved' : 'Rejected'}}
                                            </p>
                                        @else
                                            <form action="{{URL::signedRoute('superAdmin.change.application.form.status', $applicationForm->id)}}"
                                                  method="post"
                                                  id="superChangeFormStatus{{$applicationForm->id}}">
                                                @csrf
                                                <select class="form-select form-select-solid select2-hidden-accessible superChangeFormStatus"
                                                        data-id="{{$applicationForm->id}}"
                                                        data-control="select2"
                                                        data-hide-search="true"
                                                        name="application_form_status"
                                                        tabindex="-1"
                                                        aria-hidden="true">
                                                    <option value="Pending" selected disabled>Pending</option>
                                                    <option value="Approve">Approve</option>
                                                    <option value="Reject">Reject</option>
                                                </select>
                                            </form>
                                        @endif
                                    @endif
                                </td>
                            @endif
                        </tr>
                    @empty
                        <td>
                            No Application Form Found
                        </td>
                    @endforelse
                </table>
            </div>
            {{$applicationForms->links()}}
        </div>
    </div>

    <div class="modal fade" id="applicationFormModalPopup" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" style="max-width: 80%; !important;">
            <div class="modal-content rounded">
                <div class="modal-header pb-0 border-0 justify-content-end">
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <span class="svg-icon svg-icon-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none">
                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
                                      transform="rotate(-45 6 17.3137)" fill="black"/>
                                <rect x="7.41422" y="6" width="16" height="2" rx="1"
                                      transform="rotate(45 7.41422 6)" fill="black"/>
                            </svg>
                        </span>
                    </div>
                    @if(auth()->user()->isDataEntryOperator())
                        <span>
                            <form action="{{route('dataEntry.edit.application.form')}}" id="editApplicationForm" method="post">
                                @csrf
                                <input type="hidden" name="applicationformId" value="">
                                <button type="submit" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm ms-3">
                                    <span class="svg-icon svg-icon-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="black"></path>
                                            <path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="black"></path>
                                        </svg>
                                    </span>
                                </button>
                            </form>
                        </span>
                    @endif
                </div>
                <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
                    <div class="col-12 p-5 bg-white">
                        <div class="text-center">
                            <h1 class="mb-3">Application Form</h1>
                        </div>
                        <div class="row g-9 my-5">
                            <div class="col-4 mb-10">
                                <label class="form-label fs-6 fw-bolder text-dark">Name</label>
                                <input class="form-control form-control-lg form-control-solid"
                                       type="text"
                                       name="name"
                                       readonly />
                            </div>
                            <div class="col-4 mb-10">
                                <label class="form-label fs-6 fw-bolder text-dark">Father/Husband Name</label>
                                <input class="form-control form-control-lg form-control-solid"
                                       type="text"
                                       name="father_or_husband_name"
                                       readonly />
                            </div>
                            <div class="col-4 mb-10">
                                <label class="form-label fs-6 fw-bolder text-dark">Age</label>
                                <input class="form-control form-control-lg form-control-solid"
                                       type="number"
                                       name="age"
                                       readonly />
                            </div>
                            <div class="col-4 mb-10">
                                <label class="form-label fs-6 fw-bolder text-dark">Martial Status</label>
                                <input class="form-control form-control-lg form-control-solid"
                                       type="string"
                                       name="martial_status"
                                       readonly />
                            </div>
                            <div class="col-4 mb-10">
                                <label class="form-label fs-6 fw-bolder text-dark">CNIC</label>
                                <input class="form-control form-control-lg form-control-solid"
                                       type="text"
                                       name="cnic"
                                       readonly />
                            </div>
                            <div class="col-4 mb-10">
                                <label class="form-label fs-6 fw-bolder text-dark">Education</label>
                                <input class="form-control form-control-lg form-control-solid"
                                       type="text"
                                       name="education"
                                       readonly />
                            </div>
                        </div>

                        <div class="row g-9 mb-8">
                            <div class="col-3 mb-10">
                                <label class="form-label fs-6 fw-bolder text-dark">No. Of Family Members</label>
                                <input class="form-control form-control-lg form-control-solid"
                                       type="number"
                                       name="family_members"
                                       readonly />
                            </div>
                            <div class="col-3 mb-10">
                                <label class="form-label fs-6 fw-bolder text-dark">No. Of Men</label>
                                <input class="form-control form-control-lg form-control-solid"
                                       type="number"
                                       name="total_men"
                                       readonly />
                            </div>
                            <div class="col-3 mb-10">
                                <label class="form-label fs-6 fw-bolder text-dark">No. Of Women</label>
                                <input class="form-control form-control-lg form-control-solid"
                                       type="number"
                                       name="total_women"
                                       readonly />
                            </div>
                            <div class="col-3 mb-10">
                                <label class="form-label fs-6 fw-bolder text-dark">No. Of Children</label>
                                <input class="form-control form-control-lg form-control-solid"
                                       type="number"
                                       name="total_children"
                                       readonly />
                            </div>
                        </div>

                        <div class="row g-9 mb-8">
                            <div class="col-4 mb-10">
                                <label class="form-label fs-6 fw-bolder text-dark">Address</label>
                                <textarea class="form-control form-control-solid"
                                          rows="3"
                                          name="address"
                                          id="address"
                                          placeholder="Please Type Your Complete Address Here"
                                          readonly></textarea>
                            </div>
                            <div class="col-4 mb-10">
                                <label class="form-label fs-6 fw-bolder text-dark">Home Ownership</label>
                                <input class="form-control form-control-lg form-control-solid"
                                       type="text"
                                       name="home_ownership"
                                       readonly />
                                <input class="form-control form-control-lg form-control-solid mt-2"
                                       type="text"
                                       name="rent"
                                />
                            </div>
                            <div class="col-4 mb-10">
                                <label class="form-label fs-6 fw-bolder text-dark">Home Area (Sq. ft)</label>
                                <input class="form-control form-control-lg form-control-solid"
                                       type="number"
                                       step="any"
                                       name="home_area"
                                       readonly/>
                            </div>
                            <div class="col-4 mb-10">
                                <label class="form-label fs-6 fw-bolder text-dark">Source Of Income</label>
                                <input class="form-control form-control-lg form-control-solid"
                                       type="text"
                                       name="source_of_income"
                                       readonly />
                            </div>
                            <div class="col-4 mb-10">
                                <label class="form-label fs-6 fw-bolder text-dark">Total Monthly Income</label>
                                <input class="form-control form-control-lg form-control-solid"
                                       type="number"
                                       name="monthly_income"
                                       readonly />
                            </div>
                            <div class="col-4 mb-10">
                                <label class="form-label fs-6 fw-bolder text-dark">Total Expenses</label>
                                <input class="form-control form-control-lg form-control-solid"
                                       type="number"
                                       name="total_expenses"
                                       readonly />
                            </div>
                            <div class="col-4 mb-10">
                                <label class="form-label fs-6 fw-bolder text-dark">Account Number</label>
                                <input class="form-control form-control-lg form-control-solid"
                                       type="text"
                                       name="account_number"
                                       readonly />
                            </div>
                            <div class="col-4 mb-10">
                                <label class="form-label fs-6 fw-bolder text-dark">Phone Number</label>
                                <input class="form-control form-control-lg form-control-solid "
                                       type="tel"
                                       name="phone_number"
                                       readonly />
                            </div>
                            <div class="col-4 mb-10">
                                <label class="form-label fs-6 fw-bolder text-dark">Other Financial Support</label>
                                <input class="form-control form-control-lg form-control-solid "
                                       type="text"
                                       name="other_financial_support"
                                />
                            </div>
                        </div>

                        <div class="row g-9 mb-8">
                            <div class="mb-2 text-center">
                                <h4>Application From Detail</h4>
                            </div>
                            <div class="col-12 mt-0">
                                <label class="form-label fs-6 fw-bolder text-dark">Detail</label>
                                <textarea class="form-control form-control-solid"
                                          rows="6"
                                          name="application_detail"
                                          id="application_detail"
                                          placeholder="Please Type Application Details Here"
                                          readonly></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function () {
            //Open application form detail modal
            $(document).on('click', '.applicationFormModal', async function () {
                let url = '{{route('view.application.form')}}';
                let data = {
                    '_token': '{{csrf_token()}}',
                    'id': $(this).data('id')
                }
                await $.post(url, data, function (response) {
                    if (response.status == 'success') {

                        let url = "{{route('dataEntry.edit.application.form')}}";
                        $('input[name="applicationformId"]').val(response.applicationFrom.id);

                        $('input[name="name"]').val(response.applicationFrom.name);
                        $('input[name="father_or_husband_name"]').val(response.applicationFrom.father_or_husband_name);
                        $('input[name="age"]').val(response.applicationFrom.age);
                        $('input[name="martial_status"]').val(response.applicationFrom.martial_status);
                        $('input[name="cnic"]').val(response.applicationFrom.cnic);
                        $('input[name="education"]').val(response.applicationFrom.education);
                        $('input[name="family_members"]').val(response.applicationFrom.family_members);
                        $('input[name="total_men"]').val(response.applicationFrom.total_men);
                        $('input[name="total_women"]').val(response.applicationFrom.total_women);
                        $('input[name="total_children"]').val(response.applicationFrom.total_children);
                        $("textarea#address").val(response.applicationFrom.address);
                        $('input[name="home_ownership"]').val(response.applicationFrom.home_ownership);
                        $('input[name="rent"]').val(response.applicationFrom.rent == null ? 'null' : response.applicationFrom.rent);
                        $('input[name="home_area"]').val(response.applicationFrom.home_area);
                        $('input[name="source_of_income"]').val(response.applicationFrom.source_of_income);
                        $('input[name="monthly_income"]').val(response.applicationFrom.monthly_income);
                        $('input[name="total_expenses"]').val(response.applicationFrom.total_expenses);
                        $('input[name="account_number"]').val(response.applicationFrom.account_number);
                        $('input[name="phone_number"]').val(response.applicationFrom.phone_number);
                        $('input[name="other_financial_support"]').val(response.applicationFrom.other_financial_support);
                        $("textarea#application_detail").val(response.applicationFrom.application_detail);
                    }
                });
            });

            //Admin change application form status
            $(document).on('change', '.adminChangeFormStatus', function () {
                let val = $(this).find(':selected').val();
                let id = $(this).data('id');
                $('#adminChangeFormStatus'+id).submit();
            });

            //Super Admin change application form status
            $(document).on('change', '.superChangeFormStatus', function () {
                let val = $(this).find(':selected').val();
                let id = $(this).data('id');
                $('#superChangeFormStatus'+id).submit();
            });

            //Filter to see applications forms by status
            $(document).on('change', '.applicationFormStatus', function () {
                let val = $(this).find(':selected').val();
                if(val == 'All') {
                    window.location.href = "{{ route('admin.get.application.forms')}}";
                }else {
                    $('#getApplicationForms').submit();
                }
            });
        });
    </script>
@endsection
