@extends('layouts.app')
@section('title', 'Blog List')
@section('content')

    <!-- page-title -->
    <section class="page-title bg-cover" data-background="{{asset('images/backgrounds/page-title.jpg')}}">
    <div class="container">
        <div class="row">
        <div class="col-12 text-center">
            <h1 class="display-1 text-white font-weight-bold font-primary">@lang('lang.blog')</h1>
        </div>
        </div>
    </div>
    </section>
    <!-- /page-title -->

    <div class="container my-5">
        <div class="d-flex justify-content-between">
            <h3>@lang('lang.title_list_blog')</h3>
            <a href="{{ route('blog.create') }}" class="btn btn-outline-primary">@lang('lang.btn_add')</a>
        </div>
        
        <div class="row d-flex mt-5  ">
            @forelse($blogs as $blog)
            
                <div class="col-sm-3 p-0 ">        
                    <div class="card p-3 m-2 ">
                        <a href="{{ route('blog.show', $blog->id)}}" class="h4">{{ $blog->title }}</a>
                        <hr>
                        <small class="mt-2"> {{ $blog->blogHasUser->name }}</small>
                    </div>
                </div>
            
            @empty
            <li class="text-danger">@lang('lang.empty')</li>
            @endforelse
        </div>                        
    </div>

    <div class="mb-5 d-flex justify-content-center">
        {{$blogs}}
    </div>
@endsection