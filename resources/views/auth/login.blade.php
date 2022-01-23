@extends('template')
@section('content')

    <div class="container">

        <div class="row justify-content-center mt-5">
            <div class="col-md-5">
                <div class="card">
                    <div class="text-center mt-2">
                        <h4>Login to your account</h4>
                        <hr style="margin-right: 20%; margin-left: 20%; border:2px solid blue">
                        @if(session('status'))
                        <div class="alert alert-success">
                            {{session('status')}}
                        </div>
                        @endif
                        
                    </div>
                    <div class="card-body">
                        <form action="{{route('login')}}" method="post">@csrf


                            <div class="row d-flex justify-content-center mb-2">
                                
                                <div class="col-md-8">
                                    Email
                      <!--the cookie here is for remember me-->
                      <!--the cookie here is set on vendor/laravel/fortify/src/http/controllers/autehnticated-session-controller -->
                                    <input type="email" name="email"
                                    @if(Cookie::has('email')) value="{{Cookie::get('email')}}" @endif
                                        class="form-control @error('email') is-invalid @enderror">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>
                                                {{ $message }}
                                            </strong>

                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row d-flex justify-content-center">
                                <div class="col-md-8">
                                     Password
                                    <input type="password" name="password"
                                    @if(Cookie::has('password')) value="{{Cookie::get('password')}}" @endif
                                        class="form-control @error('password') is-invalid @enderror">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>
                                                {{ $message }}
                                            </strong>

                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row d-flex justify-content-center">

                                <div class="col-md-8">
                                  <p><a href="{{route('password.request')}}">Forgot your password?</a></p>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" name="remember" id="remember"
                                        @if(Cookie::has('email')) checked @endif
                                            {{ old('remember') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="label">Keep me signed in</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row d-flex justify-content-center">
                                
                                <div class="d-grid gap-2 col-8">
                                    <button type="submit" class="btn btn-info text-white">Login</button>

                                </div>
                            </div>                            

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div><!---->
    <script type="text/javascript">
    $(window).on('load', function() {
        $('#exampleModal').modal('show');
    });
</script>
@endsection
