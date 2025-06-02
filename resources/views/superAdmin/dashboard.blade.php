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
                                    <a href="{{route('superAdmin.admins.list')}}">
                                        <div class="fs-5 text-dark fw-bolder lh-1">{{$admins}}</div>
                                        <div class="fs-7 text-gray-600 fw-bold">Admins</div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="d-flex align-items-center mb-9 ms-2">
                                <div class="symbol symbol-40px me-3">
                                    <div class="symbol-label bg-white bg-opacity-50">
                                        <span class="svg-icon svg-icon-1 svg-icon-dark">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <path d="M8 22C7.4 22 7 21.6 7 21V9C7 8.4 7.4 8 8 8C8.6 8 9 8.4 9 9V21C9 21.6 8.6 22 8 22Z" fill="black"></path>
                                                <path opacity="0.3" d="M4 15C3.4 15 3 14.6 3 14V6C3 5.4 3.4 5 4 5C4.6 5 5 5.4 5 6V14C5 14.6 4.6 15 4 15ZM13 19V3C13 2.4 12.6 2 12 2C11.4 2 11 2.4 11 3V19C11 19.6 11.4 20 12 20C12.6 20 13 19.6 13 19ZM17 16V5C17 4.4 16.6 4 16 4C15.4 4 15 4.4 15 5V16C15 16.6 15.4 17 16 17C16.6 17 17 16.6 17 16ZM21 18V10C21 9.4 20.6 9 20 9C19.4 9 19 9.4 19 10V18C19 18.6 19.4 19 20 19C20.6 19 21 18.6 21 18Z" fill="black"></path>
                                            </svg>
                                        </span>
                                    </div>
                                </div>
                                <div>
                                    <a href="{{route('superAdmin.data.entry.operators.list')}}">
                                        <div class="fs-5 text-dark fw-bolder lh-1">{{$dataEntryOperators}}</div>
                                        <div class="fs-7 text-gray-600 fw-bold text-nowrap">Data Entry Operators</div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
