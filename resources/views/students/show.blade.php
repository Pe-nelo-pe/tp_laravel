@extends('layouts.app')
@section('title') {{ $student->name }} @endsection
@section('content')

<!-- page-title -->
<section class="page-title bg-cover" data-background="{{asset('images/backgrounds/page-title.jpg')}}">
  <div class="container">
    <div class="row">
      <div class="col-12 text-center">
        <h1 class="display-1 text-white font-weight-bold font-primary">{{ $student->name }}</h1>
      </div>
    </div>
  </div>
</section>
<!-- /page-title -->

<!-- team single -->
<section>
  <div class="container">
     @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show mt-4" role="alert">
      <strong>{{session('success')}}</strong> 
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif
    <div class="row mb-100">
      <div class="col-lg-4 col-md-6 pt-5">
        <div class="bg-secondary p-4 text-center">
          <div class="img-thumb-circle mx-auto mb-3">
            <img src="{{asset('images/team/member-3.jpg')}}" alt="team-member" class="img-fluid">
          </div>
          <h3 class="text-white">{{ $student->name }}</h3>
    
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
            dolore magna aliqua.enim ad minim veniam,</p>

        </div>
      </div>
      <div class="col-lg-7 offset-lg-1 col-md-6">
        <div class="pt-5">
          <h2>À propros de {{ $student->name }}</h2>
          <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
            labore et
            dolore magna aliqua. Ut enim ad minim veniam.</p>


            <table class="table">
              
                <tr>
                  <th scope="row" style="border-top: none;">Courriel</th>
                  <td class="text-right" style=" border-top: none;">{{ $student->email }}</td>
                </tr>
                <tr>
                  <th scope="row">Addresse</th>
                  <td class="text-right">{{ $student->address }}</td>
                </tr>
                <tr>
                  <th scope="row">Téléphone</th>
                  <td class="text-right">{{ $student->phone }}</td>
                </tr>
                <tr>
                  <th scope="row">Date de naissance</th>
                  <td  class="text-right" > {{ $student->birthday }}</td>
                </tr>
                <tr>
                  <td><a href="{{ route('students.edit', $student->id)}}" class="btn btn-success">Mettre à jour</a></td>

                  <td><!-- Button trigger modal -->
                  <button type="button" class="btn btn-danger float-right text-align-end" data-bs-toggle="modal" data-bs-target="#deleteModal">
                    Supprimer

                  </button></td>
                </tr>
            </table> 
        </div>
      </div>
    </div>
    
  </div>
</section>
<!-- /team -->

 
<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Suppression</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Voulez-vous vraiment effacer cet étudiant?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
        <form action="{{ route('students.edit', $student->id)}}" method="post">
          @csrf
          @method('delete')
          <input type="submit" value="Supprimer" class="btn btn-danger">
      </form>
      </div>
    </div>
  </div>
</div>

@endsection