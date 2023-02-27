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


<section class="container my-5">
  <div class="d-flex justify-content-between align-items-center">
    <h2>Profile de {{Auth::user()->name}}</h2>
    <a href="{{ route('user.edit', Auth::user()->id)}}" class="btn btn-primary">@lang('lang.btn_update')</a>
  </div>

  <div class="row text-center  mt-5">
    <div class="col-sm-3 ">
        <a href="{{ route('blog.index')}}" class=" card bg-secondary text-primary text-uppercase display-6 py-5 shadow">@lang('lang.blog')</a>
    </div>

    <div class="col-sm-3">
 
        <a href="{{ route('file.index')}}" class="card bg-secondary text-primary text-uppercase display-6 py-5 shadow">@lang('lang.file')</a>
     
    </div>

    <div class="col-sm-3 ">
      
        <a href="#" class="card text-uppercase display-6 py-5 c-disabled shadow">@lang('lang.coming')</a>
    
    </div>  

    <div class="col-sm-3 ">
        <a href="#" class="card text-uppercase display-6 py-5 c-disabled shadow">@lang('lang.coming')</a>
    </div> 
    
  </div> 

</section>



@endsection

