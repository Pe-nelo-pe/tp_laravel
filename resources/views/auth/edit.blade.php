@extends('layouts.app')
@section('title', 'Modification')
@section('content')

<!-- page-title -->
<section class="page-title bg-cover" data-background="{{asset('images/backgrounds/page-title.jpg')}}">
  <div class="container">
    <div class="row">
      <div class="col-12 text-center">
        <h1 class="display-1 text-white font-weight-bold font-primary">@lang('lang.title_edit')</h1>
      </div>
    </div>
  </div>
</section>
<!-- /page-title -->

<div class="d-flex justify-content-center my-5">
    <div class="bg-white p-4 w-50">
      <div>
        @if($errors)
          <ul>
            @foreach($errors->all() as $error)
            <li class="text-danger">{{ $error }}</li>
            @endforeach
          </ul>
        @endif
      </div>
        <form action="" method="post">
          @csrf
          @method('put')
          <input type="text" id="name" name="name" class="form-control mb-4" placeholder="@lang('lang.user_name')" value="{{ $user->name }}">
          <input type="email" id="email" name="email" class="form-control mb-4" placeholder="@lang('lang.user_email')"
          value="{{ $user->email }}">
          <input type="text" id="address" name="address" class="form-control mb-4" placeholder="@lang('lang.user_address')" value="{{ $student->address }}">
          <label for="city_id">@lang('lang.user_city'):</label>
          <select name="city_id" id="city_id" class="mb-4">
            @foreach($cities as $city)
            <option value="{{ $city->id }}" {{$student->city_id == $city->id  ? 'selected' : ''}}>{{ $city->name }}</option>
            @endforeach
          </select>
          <input type="text" id="phone" name="phone" class="form-control my-4" placeholder="@lang('lang.user_phone')" value="{{ $student->phone }}">
          <input type="date" id="birthday" name="birthday" class="form-control mb-4" placeholder="Date de naissance" value="{{ $student->birthday }}">
          <div class="d-flex justify-content-between justify-content-between mt-4">
            <button class="btn btn-primary" type="submit" >@lang('lang.save')</button>
            <a href="{{ route ('dashboard')}}" class="btn btn-danger">@lang('lang.btn_cancel')</a>

          </div>

        </form>
      </div>

</div>

@endsection