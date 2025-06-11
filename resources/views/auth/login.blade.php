<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.css')
</head>
<body id="kt_body" class="bg-dark">
<div class="d-flex flex-column flex-root">
    <div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed" style="background-image: url(assets/media/illustrations/sketchy-1/14-dark.png">
        <div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
            <div class="w-lg-500px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
                <form class="form w-100" action="{{route('login')}}" method="post">
                    @csrf
                    <div class="text-center mb-10">
                        <h1 class="text-dark mb-3">Sign In</h1>
                    </div>
                    <div class="fv-row mb-10">
                        <label class="form-label fs-6 fw-bolder text-dark">Email</label>
                        <input class="form-control form-control-lg form-control-solid  @error('email') is-invalid @enderror" type="email" name="email" autocomplete="off" value="{{ old('email') }}" required />
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="fv-row mb-10">
                        <label class="form-label fs-6 fw-bolder text-dark">Password</label>
                        <input class="form-control form-control-lg form-control-solid @error('password') is-invalid @enderror" type="password" name="password" autocomplete="off" required />
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="text-center">
                        <button type="submit" id="kt_sign_in_submit" class="btn btn-lg btn-primary w-100 mb-5">
                            <span class="indicator-label">Continue</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@include('layouts.js')
<script src="{{asset('assets/js/custom/authentication/sign-in/general.js')}}"></script>
</body>
</html>
