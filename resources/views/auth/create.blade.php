@extends('layouts.app')
@section('title', 'Ajout')
@section('content')

<!-- page-title -->
<section class="page-title bg-cover" data-background="{{asset('images/backgrounds/page-title.jpg')}}">
  <div class="container">
    <div class="row">
      <div class="col-12 text-center">
        <h1 class=" text-white font-weight-bold font-primary">@lang('lang.title_signup')</h1>
      </div>
    </div>
  </div>
</section>
<!-- /page-title -->

<div class="d-flex justify-content-center my-5">
    <div class="bg-white p-4 w-50">
      @if($errors)
      <div class="alert alert-danger alert-dismissible fade show " role="alert" >
          <ul>
            @foreach($errors->all() as $error)
            <li class="text-danger py-2">{{ $error }}</li>
            @endforeach
          </ul>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <form action="" method="post">
          @csrf
          <input type="text" id="name" name="name" class="form-control mb-4" placeholder="@lang('lang.user_name')" value="{{old('name')}}">

          <input type="email" id="email" name="email" class="form-control mb-4" placeholder="@lang('lang.user_email')" value="{{old('email')}}">

          <input type="text" id="address" name="address" class="form-control mb-4" placeholder="@lang('lang.user_address')" value="{{old('address')}}">

          <label for="city_id">@lang('lang.user_city'):</label>
          <select name="city_id" id="city_id" class="form-control mb-4">
            @foreach($cities as $city)
            <option value="{{ $city->id}}" {{$city->id == old('$city->id')  ? 'selected' : ''}}>{{ $city->name }}</option>
            @endforeach
          </select>

          <input type="text" id="phone" name="phone" class="form-control mb-4" placeholder="@lang('lang.user_phone')" value="{{old('phone')}}">

          <input type="date" id="birthday" name="birthday" class="form-control mb-4" value="{{old('birthday')}}">

          <input type="password" id="password" name="password" placeholder="@lang('lang.user_pass')" class="form-control mb-4">

          <div class="d-grid mx-auto">
            <input type="submit" value="@lang('lang.save')" class="btn btn-primary btn-block">
          </div>
        </form>
      </div>
</div>

@endsection