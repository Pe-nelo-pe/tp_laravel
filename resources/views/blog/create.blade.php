@extends('layouts.app')
@section('title', 'Ajout')
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
  <div class="row justify-content-center my-5">
    <div>
        @if($errors)
          <ul>
            @foreach($errors->all() as $error)
            <li class="text-danger">{{ $error }}</li>
            @endforeach
          </ul>
        @endif
      </div>

    <div class="col-6">
      <div class="card">
        <form action="" method="post">
          @csrf
          <div class="card-body">
            <div class="control-group col-12">
              <label for="title">Title</label>
              <input type="text" id="title" name="title" class="form-control" value="{{old('title')}}">
            </div>

            <div class="control-group col-12 mt-3">
              <label for="content">Content</label>
              <textarea type="text" id="content" name="content" class="form-control">{{old('content')}}</textarea>
            </div>

             <div class="control-group col-12 mt-5">
              <label for="title_fr">Titre</label>
              <input type="text" id="title_fr" name="title_fr" class="form-control" value="{{old('title_fr')}}">
            </div>

            <div class="control-group col-12 mt-3">
              <label for="content_fr">Article</label>
              <textarea type="text" id="content_fr" name="content_fr" class="form-control">{{old('content_fr')}}</textarea>
            </div>

           
          </div>

          <div class="card-footer d-flex justify-content-between">
            <input type="submit" name="" id="" value="@lang('lang.save')" class="btn btn-success">
            <a href="{{ route ('blog.index')}}" class="btn btn-danger">@lang('lang.btn_cancel')</a>

          </div>

        </form>
      </div>
    </div>
  </div>
</div>

@endsection