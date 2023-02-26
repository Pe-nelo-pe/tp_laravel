@extends('layouts.app')
@section('title', 'File List')
@section('content')

    <!-- page-title -->
    <section class="page-title bg-cover" data-background="{{asset('images/backgrounds/page-title.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h1 class="display-1 text-white font-weight-bold font-primary">@lang('lang.title_file')</h1>
                </div>
            </div>
        </div>
    </section>
    <!-- /page-title -->

    <div class="container mt-5">
        <div class="d-flex justify-content-between">
            <h3>@lang('lang.title_list_file')</h3>
            <a href="{{ route('file.create') }}" class="btn btn-outline-primary">@lang('lang.btn_add')</a>
        </div>
        @forelse($directories as $directory)
        <div class="card d-flex flex-row justify-content-between p-3 mt-3">
            <div class="">
                <h2>{{ $directory->name }}</h2>
                <div>
                    <p> {{ $directory->dirHasUser->name }}</p>
                    <small> {{ $directory->created_at }}</small>
                </div>
            </div>
            
                
            @if(auth()->user()->id == $directory->user_id)
            <div class=" d-flex align-items-center justify-content-between">
                <div class="col-4">
                    <a href="{{ route('file.edit', $directory->id)}}" class="btn btn-success">@lang('lang.btn_update')</a>
                </div>
                <div class="col-4">
                <!-- Button trigger modal -->
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">@lang('lang.btn_delete')</button>
                </div>
            @endif
                <a href="{{ route('file.download', $directory->id) }}" ><i class="fas fa-download px-3 h2"></i></a>
            </div>
                
                                                
            <!-- Modal -->
                <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Effacer</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p> Voulez-vous vraiment effacer cet article?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                <form action="{{ route('file.delete', $directory->id)}}" method="post">
                                     @csrf
                                    @method('delete')
                                    <input type="submit" value="Effacer" class="btn btn-danger">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <!--/Modal -->
        </div>

        @empty
        <li class="text-danger">@lang('lang.empty')</li>
        @endforelse
        
    </div>
    
    <div class="mb-5 d-flex justify-content-center">
        {{$directories}}
    </div>



@endsection