@extends('layouts.app')
@section('title', 'Ajout')
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

<div class="d-flex justify-content-center">
    <div class="bg-white p-4 w-50">
        <form action="" method="post">
          @csrf
          <input type="text" id="name" name="name" class="form-control mb-4 px-0" placeholder="Nom complet">
          <input type="email" id="email" name="email" class="form-control mb-4 px-0" placeholder="Adresse courriel">
          <input type="text" id="adress" name="adress" class="form-control mb-4 px-0" placeholder="Adresse">
          <label for="city_id">Ville:</label>
          <select name="city_id" id="city_id">
            @foreach($cities as $city)
            <option value="{{ $city->id }}">{{ $city->name }}</option>
            @endforeach
          </select>
          <input type="text" id="phone" name="phone" class="form-control mb-4 px-0" placeholder="Téléphone">
          <input type="date" id="birthday" name="birthday" class="form-control mb-4 px-0" placeholder="Date de naissance">
          <button class="btn btn-primary" type="submit" >Enregistrer</button>
        </form>
      </div>
</div>

@endsection