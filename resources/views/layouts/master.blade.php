<!DOCTYPE html>
<html lang="en">
<head>
@include('layouts.css')
@yield('css')
</head>
<body id="kt_body" class="header-tablet-and-mobile-fixed aside-enabled">
<div class="d-flex flex-column flex-root">
    <div class="page d-flex flex-row flex-column-fluid">
        @include('layouts.sidebar')
        <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
            @include('layouts.header')
            <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                <div class="post d-flex flex-column-fluid" id="kt_post">
                    <div id="kt_content_container" class="container-xxl">
                        <div class="row g-5 g-xl-12">
                            <div class="col-xl-12">
                                @yield('body')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('layouts.js')
@yield('js')
</body>
</html>
