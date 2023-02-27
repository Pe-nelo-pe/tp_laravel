@extends('layouts.app')
@section('title', 'Welcome')
@section('content')

<!-- banner -->
<section class="banner bg-cover position-relative d-flex justify-content-center align-items-center"
  data-background="{{asset('images/banner/banner2.jpg')}}">
  <div class="container d-flex flex-column mt-6 mb-5 gap-5">
  
      <div class="col-12 text-center mb-5">
        <h1 class=" text-white font-weight-bold font-primary">@lang('lang.home_welcome')</h1>
      </div>

    <div class="d-flex justify-content-center my-5 gap-5">
      <a href="{{ route('auth.create') }}" class="btn btn-primary  mt-5">@lang('lang.nav_register')</a>
      <a href="{{ route('login') }}" class="btn btn-primary  mt-5">@lang('lang.nav_login')</a>
    </div>
  </div>
</section>
<!-- /banner -->


@endsection