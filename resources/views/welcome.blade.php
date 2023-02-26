@extends('layouts.app')
@section('title', 'Welcome')
@section('content')

<!-- banner -->
<section class="banner bg-cover position-relative d-flex justify-content-center align-items-center mb-5"
  data-background="{{asset('images/banner/banner2.jpg')}}">
  <div class="container">
    <div class="row">
      <div class="col-12 text-center">
        <h1 class="display-1 text-white font-weight-bold font-primary">@lang('lang.home_welcome')</h1>
      </div>
    </div>
    <a href="{{ route('auth.create') }}" class="btn btn-primary">@lang('lang.nav_register')</a>
    <a href="{{ route('login') }}" class="btn btn-primary">@lang('lang.nav_login')</a>
  </div>
</section>
<!-- /banner -->


@endsection