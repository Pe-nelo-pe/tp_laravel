@extends('layouts.app')
@section('title', 'Profil')
@section('content')


<!-- page-title -->
<section class="page-title bg-cover" data-background="{{asset('images/backgrounds/page-title.jpg')}}">
  <div class="container">
    <div class="row">
      <div class="col-12 text-center">
        <h1 class="display-1 text-white font-weight-bold font-primary">@lang('lang.title_profil')</h1>
      </div>
    </div>
  </div>
</section>
<!-- /page-title -->


<section class="container">
  <h2>Profile de {{Auth::user()->name}}</h2>
  <a href="{{ route('user.edit', Auth::user()->id)}}" class="btn btn-primary">@lang('lang.btn_update')</a>
  <a href="{{ route('blog.index')}}" class="btn btn-primary">@lang('lang.blog')</a>
  <a href="{{ route('file.index')}}" class="btn btn-primary">@lang('lang.file')</a>

</section>



@endsection

