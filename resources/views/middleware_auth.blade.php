

@include('front-design')





<!-- Modal -->
<div class="modal fade" id="modalLogin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Login Form</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
                        <form action="{{route('login')}}" method="post">@csrf


                            <div class="form-group row mb-2">
                                <label for="email" class="col-md-4 col-form-label text-end">
                                    Email
                                </label>
                                <div class="col-md-6">
                      <!--the cookie here is for remember me-->
                      <!--the cookie email is set on vendor/laravel/fortify/src/http/controllers/autehnticated-session-controller -->
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

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-end">
                                    Password
                                </label>
                                <div class="col-md-6">
                      <!--the cookie here is for remember me-->
                      <!--the cookie password is set on vendor/laravel/fortify/src/http/controllers/autehnticated-session-controller -->
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
                            <div class="form-group row">

                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" name="remember" id="remember"
                                        @if(Cookie::has('email')) checked @endif
                                            {{ old('remember') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="label">Remember me</label>
                                    <p><a href="{{route('password.request')}}">Forgotten a password?</a></p>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">Login</button>

                                </div>
                            </div>                            

                        </form>
      </div><!--div class modal body-->

    </div>
  </div>
</div>





<!--if failed to login then show the modal again-->
@if ($errors->any())
<script type="text/javascript">
$(document).ready(function(){
    $('#modalLogin').modal('show');

      });

</script>
@endif



    <script type="text/javascript">
    $(window).on('load', function() {
        $('#modalLogin').modal('show');
    });
</script>
