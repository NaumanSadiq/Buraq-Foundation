@extends('layouts.master')
@section('body')
    <div class="row g-5 g-xl-8">
        <div class="col-xl-5">
            <div class="card card-xxl-stretch mb-5 mb-xl-8" style="background-color: #F7D9E3">
                <div class="card-body d-flex flex-column">
                    <div class="d-flex flex-column mb-7">
                        <a href="#" class="text-dark text-hover-primary fw-bolder fs-3">Summary</a>
                    </div>
                    <div class="row g-0">
                        <div class="col-6">
                            <div class="d-flex align-items-center mb-9 me-2">
                                <div class="symbol symbol-40px me-3">
                                    <div class="symbol-label bg-white bg-opacity-50">
                                        <span class="svg-icon svg-icon-1 svg-icon-dark">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <path opacity="0.3" d="M22 8H8L12 4H19C19.6 4 20.2 4.39999 20.5 4.89999L22 8ZM3.5 19.1C3.8 19.7 4.4 20 5 20H12L16 16H2L3.5 19.1ZM19.1 20.5C19.7 20.2 20 19.6 20 19V12L16 8V22L19.1 20.5ZM4.9 3.5C4.3 3.8 4 4.4 4 5V12L8 16V2L4.9 3.5Z" fill="black"></path>
                                                <path d="M22 8L20 12L16 8H22ZM8 16L4 12L2 16H8ZM16 16L12 20L16 22V16ZM8 8L12 4L8 2V8Z" fill="black"></path>
                                            </svg>
                                        </span>
                                    </div>
                                </div>
                                <div>
                                    <div class="fs-5 text-dark fw-bolder lh-1">{{$pendingApplicationForms}}</div>
                                    <div class="fs-7 text-gray-600 fw-bold">Pending Applications</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="d-flex align-items-center mb-9 me-2">
                                <div class="symbol symbol-40px me-3">
                                    <div class="symbol-label bg-white bg-opacity-50">
                                        <span class="svg-icon svg-icon-1 svg-icon-dark">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <path opacity="0.3" d="M22 8H8L12 4H19C19.6 4 20.2 4.39999 20.5 4.89999L22 8ZM3.5 19.1C3.8 19.7 4.4 20 5 20H12L16 16H2L3.5 19.1ZM19.1 20.5C19.7 20.2 20 19.6 20 19V12L16 8V22L19.1 20.5ZM4.9 3.5C4.3 3.8 4 4.4 4 5V12L8 16V2L4.9 3.5Z" fill="black"></path>
                                                <path d="M22 8L20 12L16 8H22ZM8 16L4 12L2 16H8ZM16 16L12 20L16 22V16ZM8 8L12 4L8 2V8Z" fill="black"></path>
                                            </svg>
                                        </span>
                                    </div>
                                </div>
                                <div>
                                    <div class="fs-5 text-dark fw-bolder lh-1">{{$approvedApplicationForms}}</div>
                                    <div class="fs-7 text-gray-600 fw-bold">Approved Applications</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="d-flex align-items-center mb-9 me-2">
                                <div class="symbol symbol-40px me-3">
                                    <div class="symbol-label bg-white bg-opacity-50">
                                        <span class="svg-icon svg-icon-1 svg-icon-dark">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <path opacity="0.3" d="M22 8H8L12 4H19C19.6 4 20.2 4.39999 20.5 4.89999L22 8ZM3.5 19.1C3.8 19.7 4.4 20 5 20H12L16 16H2L3.5 19.1ZM19.1 20.5C19.7 20.2 20 19.6 20 19V12L16 8V22L19.1 20.5ZM4.9 3.5C4.3 3.8 4 4.4 4 5V12L8 16V2L4.9 3.5Z" fill="black"></path>
                                                <path d="M22 8L20 12L16 8H22ZM8 16L4 12L2 16H8ZM16 16L12 20L16 22V16ZM8 8L12 4L8 2V8Z" fill="black"></path>
                                            </svg>
                                        </span>
                                    </div>
                                </div>
                                <div>
                                    <div class="fs-5 text-dark fw-bolder lh-1">{{$rejectedApplicationForms}}</div>
                                    <div class="fs-7 text-gray-600 fw-bold">Rejected Applications</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
