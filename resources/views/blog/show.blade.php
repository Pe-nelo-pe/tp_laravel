@extends('layouts.app')
@section('title', 'Blog')
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

<div class="container my-5">
  <a href="{{ route('blog.index') }}" class="btn btn-outline-primary btn-sm">@lang('lang.btn_back')</a>
  <div class="row">
    <div class="col-12 pt-2 mt-4">
      <h4 class="display-one mt-2">{{ $blog->title }}</h4>
      <hr>
      <p>{{ $blog->content }}</p> 

      <strong>Auteur: {{ $blog->blogHasUser->name }}</strong>
      <div>

      </div>
      <hr>
    </div>

  </div>


  @if(auth()->user()->id == $blog->user_id)
    <div class="row text-center mb-2">
      <div class="col-4">
        <a href="{{ route('blog.edit', $blog->id)}}" class="btn btn-success">@lang('lang.btn_update')</a>
      </div>
      <div class="col-4">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
         @lang('lang.btn_delete')
        </button>
      </div>
    </div>
  @endif
</div>


<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Effacer l'article</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Voulez-vous vraiment effacer cet article?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
        <form action="{{ route('blog.edit', $blog->id)}}" method="post">
          @csrf
          @method('delete')
          <input type="submit" value="Effacer" class="btn btn-danger">
      </form>
      </div>
    </div>
  </div>
</div>


@endsection