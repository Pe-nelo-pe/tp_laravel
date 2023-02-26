@extends('layouts.app')
@section('title', 'Mise à jour')
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
          @method('put')
          <div class="card-body">
            <div class="control-group col-12">
              <label for="title">Title</label>
              <input type="text" id="title" name="title" class="form-control" value='{{ $blog->title}}'>
            </div>

            <div class="control-group col-12">
              <label for="content">Content</label>
              <textarea type="text" id="content" name="content" class="form-control">{{ $blog->content }}</textarea>
            </div>

           
          </div>

          <div class="card-body">
            <div class="control-group col-12">
              <label for="title_fr">Titre de l'article</label>
              <input type="text" id="title_fr" name="title_fr" class="form-control" value='{{ $blog->title_fr}}'>
            </div>

            <div class="control-group col-12">
              <label for="content_fr">Article</label>
              <textarea type="text" id="content_fr" name="content_fr" class="form-control">{{ $blog->content_fr }}</textarea>
            </div>

           
          </div>

          <div class="card-footer">
            <input type="submit" name="" id="" value="@lang('lang.btn_update')" class="btn btn-success">
            <a href="{{ route ('blog.index')}}" class="btn btn-danger">@lang('lang.btn_cancel')</a>

          </div>

        </form>
      </div>
    </div>
  </div>
</div>

@endsection