@extends('layouts.app')
@section('title', 'Modification')
@section('content')

<!-- page-title -->
<section class="page-title bg-cover" data-background="{{asset('images/backgrounds/page-title.jpg')}}">
  <div class="container">
    <div class="row">
      <div class="col-12 text-center">
        <h1 class="display-1 text-white font-weight-bold font-primary">Modification</h1>
      </div>
    </div>
  </div>
</section>
<!-- /page-title -->

<div class="d-flex justify-content-center">
    <div class="bg-white p-4 w-50">
        <form action="" method="post">
          @csrf
          @method('put')
          <input type="text" id="name" name="name" class="form-control mb-4 px-0" placeholder="Nom complet" value="{{ $student->name }}">
          <input type="email" id="email" name="email" class="form-control mb-4 px-0" placeholder="Adresse courriel"
          value="{{ $student->email }}">
          <input type="text" id="address" name="address" class="form-control mb-4 px-0" placeholder="Adresse" value="{{ $student->address }}">
          <label for="city_id">Ville:</label>
          <select name="city_id" id="city_id">
            @foreach($cities as $city)
            <option value="{{ $city->id }}" {{$student->city_id == $city->id  ? 'selected' : ''}}>{{ $city->name }}</option>
            @endforeach
          </select>
          <input type="text" id="phone" name="phone" class="form-control mb-4 px-0" placeholder="Téléphone" value="{{ $student->phone }}">
          <input type="date" id="birthday" name="birthday" class="form-control mb-4 px-0" placeholder="Date de naissance" value="{{ $student->birthday }}">
          <button class="btn btn-primary" type="submit" >Mettre à jour</button>
        </form>
      </div>
</div>

@endsection