@extends('layouts.app')
@section('title', 'Directory')
@section('content')

<!-- page-title -->
<section class="page-title bg-cover" data-background="{{asset('images/backgrounds/page-title.jpg')}}">
  <div class="container">
    <div class="row">
      <div class="col-12 text-center">
        <h1 class="display-1 text-white font-weight-bold font-primary">Ajouter un étudiant</h1>
      </div>
    </div>
  </div>
</section>
<!-- /page-title -->

<div class="container">
  <div class="row">
    <div class="col-12 pt-2">
      <a href="{{ route('file.index') }}" class="btn btn-outline-primary btn-sm">Retour</a>
      
      <div>

        <h4 class="display-one mt-2">{{ $directory->name }}</h4>
        <p>{{$directory->path_file}}</p> 

      </div>

    </div>

  </div>


  @if(auth()->user()->id == $directory->user_id)
    <div class="row text-center mb-2">
      <div class="col-4">
        <a href="{{ route('file.edit', $directory->id)}}" class="btn btn-success">Mettre à jour</a>
      </div>
      <div class="col-4">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
          Effacer
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
        <form action="{{ route('file.edit', $directory->id)}}" method="post">
          @csrf
          @method('delete')
          <input type="submit" value="Effacer" class="btn btn-danger">
      </form>
      </div>
    </div>
  </div>
</div>


@endsection