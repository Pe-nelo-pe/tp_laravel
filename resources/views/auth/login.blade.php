@extends("layouts.app")
@section('title', 'Se connecter')
@section("content")

<!-- page-title -->
<section class="page-title bg-cover" data-background="{{asset('images/backgrounds/page-title.jpg')}}">
  <div class="container">
    <div class="row">
      <div class="col-12 text-center">
        <h1 class="display-1 text-white font-weight-bold font-primary">@lang('lang.title_signin')</h1>
      </div>
    </div>
  </div>
</section>
<!-- /page-title -->

<main class="login-form my-5">
    <div class="container" >
        <div class="row justify-content-center">
            <div class="col-md-4 pt-4">
                <div class="card">
                  
                    <div class="card-body ">
                      @if($errors)
                        <ul>
                          @foreach($errors->all() as $error)
                          <li class="text-danger">{{ $error }}</li>
                          @endforeach
                        </ul>
                      @endif
                      @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                          <strong>{{session('success')}}</strong> 
                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        
                      @endif
                        <form action="{{route('user.auth')}}" method="post" class="">
                          @csrf
                  
                          <div class="form-group mb-3">
                              <input type="email" placeholder="@lang('lang.user_email')" name='email' class="form-control"  value="{{ old('email')}}">
                              @if($errors->has('email'))
                              <div class="text-danger mt-2">{{$errors->first('email')}}</div>
                              @endif
                          </div>
                          <div class="form-group mb-3">
                              <input type="password" placeholder="@lang('lang.user_pass')" name='password' class="form-control">
                              @if($errors->has('password'))
                              <div class="text-danger mt-2">{{$errors->first('password')}}</div>
                              @endif
                          </div>
                          <div class="d-grid mx-auto">
                              <input type="submit" value="@lang('lang.connection')" class="btn btn-primary btn-block">
                          </div>
                        </form>
                   

                    </div>

                </div>

            </div>

        </div>
    </div>
</main>

@endsection
