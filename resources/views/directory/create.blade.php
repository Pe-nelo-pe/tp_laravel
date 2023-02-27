@extends('layouts.app')
@section('title', 'Ajout')
@section('content')

<!-- page-title -->
<section class="page-title bg-cover" data-background="{{asset('images/backgrounds/page-title.jpg')}}">
  <div class="container">
    <div class="row">
      <div class="col-12 text-center">
        <h1 class="display-1 text-white font-weight-bold font-primary">@lang('lang.title_add_file')</h1>
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
      <div class="card my-5">
        <form action="" method="post" enctype="multipart/form-data" >
          @csrf
    
          <div class="card-body">
            <div class="control-group col-12">
              <label for="name">File's name</label>
              <input type="text" id="name" name="name" class="form-control mb-4" value="{{old('name')}}">
            </div>

            <div class="control-group col-12">
              <label for="name_fr">Nom du fichier</label>
              <input type="text" id="name_fr" name="name_fr" class="form-control mb-4" value="{{old('name_fr')}}">
            </div>

            <div class="control-group col-12">
              <input type="file" name="file" class="form-control" value="{{old('file')}}">
            </div>

          <div class="card-footer d-flex justify-content-between mt-4">
            <input type="submit" name="" id="" value="@lang('lang.save')" class="btn btn-success">
            <a href="{{ route ('file.index')}}" class="btn btn-danger">@lang('lang.btn_cancel')</a>

          </div>

        </form>
      </div>
    </div>
  </div>
</div>

@endsection