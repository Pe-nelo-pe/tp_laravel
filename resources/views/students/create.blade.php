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
          <input type="text" id="name" name="name" class="form-control mb-4 px-0" placeholder="Nom complet" value="{{old('name')}}">
          <input type="email" id="email" name="email" class="form-control mb-4 px-0" placeholder="Adresse courriel" value="{{old('email')}}">
          <input type="text" id="address" name="address" class="form-control mb-4 px-0" placeholder="Adresse" value="{{old('address')}}">
          <label for="city_id">Ville:</label>
          <select name="city_id" id="city_id" class="form-control">
            @foreach($cities as $city)
            <option value="{{ $city->id }}">{{ $city->name }}</option>
            @endforeach
          </select>
          <input type="text" id="phone" name="phone" class="form-control mb-4 px-0" placeholder="Téléphone" value="{{old('phone')}}">
          <input type="date" id="birthday" name="birthday" class="form-control mb-4 px-0" placeholder="Date de naissance">
          <input type="password" id="password" name="password" class="form-control mb-4 px-0">
          <button class="btn btn-primary" type="submit" >Enregistrer</button>
        </form>
      </div>
</div>

@endsection