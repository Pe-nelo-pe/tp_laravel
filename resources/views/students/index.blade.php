@extends('layouts.app')
@section('title', 'Bienvenue')
@section('content')


<section class="container">
  @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>{{session('success')}}</strong> 
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif
  <a href="{{ route('auth.create') }}" class="btn btn-outline-primary mb-4 float-right"> Ajouter un étudiant</a>
  <table class="table mb-5">
    <thead>
      <tr>
        <th scope="col">Nom</th>
        <th scope="col">Courriel</th>
        <th scope="col">Adresse</th>
      </tr>
    </thead>
    <tbody class="table-group-divider">
    @foreach($students as $student)
      <tr>
        <th scope="row"><a href="{{ route('students.show', $student->id)}}">{{ $student->name }}</a></th>
        <td>{{ $student->email }}</td>
        <td>{{ $student->address }}</td>

      </tr>
    @endforeach
    </tbody>
  </table>
  <div class="mb-5 d-flex justify-content-center">

    {{$students}}
  </div>
  </section>
@endsection