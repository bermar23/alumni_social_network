@extends('layouts.app')

@section('content')
<div class="container">
<div class="row">
    <div class="col-3">
        <div class="card">
            <div class="card-body">
                @if($user->profile_picture)
                <img src="images/{{ $user->profile_picture }}" alt="Profile Picture" class="img-thumbnail">
                @endif
            </div>
            <div class="card-footer">
            
                @if ($message = Session::get('success-upload'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
                @endif

                <form action="{{ route('image.upload.post') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    
                    <div class="form-group row">
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="form-group row">
                        <button type="submit" class="btn btn-success">Upload</button> 
                    </div>
                    
                </form>

            </div>

        </div>
    </div>
    <div class="col-sm-9">        
        <div class="card">
            <div class="card-header">{{ __('Profile') }}</div>

            <div class="card-body">
                <form method="POST" action="{{ route('profile') }}">
                    @csrf

                    @method('put')

                    <div class="form-group row">
                        <label for="first_name" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>

                        <div class="col-md-6">
                            <input id="first_name" type="text" class="form-control form-control-sm{{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="first_name" value="{{ $user->first_name }}" required autofocus>

                            @if ($errors->has('first_name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('first_name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="last_name" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>

                        <div class="col-md-6">
                            <input id="last_name" type="text" class="form-control form-control-sm{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" value="{{ $user->last_name }}" required>

                            @if ($errors->has('last_name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('last_name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="middle_name" class="col-md-4 col-form-label text-md-right">{{ __('Middle Name') }}</label>

                        <div class="col-md-6">
                            <input id="middle_name" type="text" class="form-control form-control-sm{{ $errors->has('middle_name') ? ' is-invalid' : '' }}" name="middle_name" value="{{ $user->middle_name }}" required>

                            @if ($errors->has('middle_name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('middle_name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="maiden_name" class="col-md-4 col-form-label text-md-right">{{ __('Maiden Name') }} ({{ __('optional') }})</label>

                        <div class="col-md-6">
                            <input id="maiden_name" type="text" class="form-control form-control-sm{{ $errors->has('maiden_name') ? ' is-invalid' : '' }}" name="maiden_name" value="{{ $user->maiden_name }}">

                            @if ($errors->has('maiden_name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('maiden_name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="birth_date" class="col-md-4 col-form-label text-md-right">{{ __('Birth Date') }}</label>

                        <div class="col-md-6">
                            <input id="birth_date" type="date" class="form-control form-control-sm{{ $errors->has('birth_date') ? ' is-invalid' : '' }}" name="birth_date" value="{{ $user->birth_date }}" required>

                            @if ($errors->has('birth_date'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('birth_date') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control form-control-sm{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $user->email }}" required>

                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="contact_number" class="col-md-4 col-form-label text-md-right">{{ __('Contact Number') }}</label>

                        <div class="col-md-6">
                            <input id="contact_number" type="text" class="form-control form-control-sm{{ $errors->has('contact_number') ? ' is-invalid' : '' }}" name="contact_number" value="{{ $user->contact_number }}" required>

                            @if ($errors->has('contact_number'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('contact_number') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="street" class="col-md-4 col-form-label text-md-right">{{ __('Street') }}</label>

                        <div class="col-md-6">
                            <input id="street" type="text" class="form-control form-control-sm{{ $errors->has('street') ? ' is-invalid' : '' }}" name="street" value="{{ $user->street }}" required>

                            @if ($errors->has('street'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('street') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('City') }}</label>

                        <div class="col-md-6">
                            <input id="city" type="text" class="form-control form-control-sm{{ $errors->has('city') ? ' is-invalid' : '' }}" name="city" value="{{ $user->city }}" required>

                            @if ($errors->has('city'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('city') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="country" class="col-md-4 col-form-label text-md-right">{{ __('Country') }}</label>

                        <div class="col-md-6">
                            <input id="country" type="text" class="form-control form-control-sm{{ $errors->has('country') ? ' is-invalid' : '' }}" name="country" value="{{ $user->country }}" required>

                            @if ($errors->has('country'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('country') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="postal_code" class="col-md-4 col-form-label text-md-right">{{ __('Postal code') }}</label>

                        <div class="col-md-6">
                            <input id="postal_code" type="text" class="form-control form-control-sm{{ $errors->has('postal_code') ? ' is-invalid' : '' }}" name="postal_code" value="{{ $user->postal_code }}" required>

                            @if ($errors->has('postal_code'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('postal_code') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="marital_status" class="col-md-4 col-form-label text-md-right">{{ __('Marital status') }}</label>

                        <div class="col-md-6">
                            <input id="marital_status" type="text" class="form-control form-control-sm{{ $errors->has('marital_status') ? ' is-invalid' : '' }}" name="marital_status" value="{{ $user->marital_status }}" required>

                            @if ($errors->has('marital_status'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('marital_status') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>                           

                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-outline-primary btn-sm">
                                {{ __('Update') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <hr>
        <div class="card">
            <div class="card-header">{{ __('Security') }}</div>

            <div class="card-body">
                <form method="POST" action="{{ route('security') }}">
                    @csrf

                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control form-control-sm{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="form-control form-control-sm" name="password_confirmation" required>
                        
                            @if ($errors->has('password-confirm'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password-confirm') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-outline-primary btn-sm">
                                {{ __('Save') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>      
    </div>
  </div>

    
</div>
@endsection
