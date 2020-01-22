@extends('layouts.app')

@section('content')
<div class="container">
    <div class="form-row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">Profile</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ url('/addProfile') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group{{ $errors->has('') ? ' has-error' : '' }} text-center">
                            <label for="name" class="col-md-4 col-form-label">{{ __('Enter Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>$errors->first('name')</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('designation') ? ' has-error' : '' }} text-center">
                            <label for="designation" class="col-md-4 col-form-label">{{ __('Enter Designation') }}</label>

                            <div class="col-md-6">
                                <input id="designation" type="input" class="form-control @error('designation') is-invalid @enderror" name="designation" required autocomplete="current-designation">

                                @error('designation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>$errors->first('designation')</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('profile_pic') ? ' has-error' : '' }} text-center">
                            <label for="profile_pic" class="col-md-4 col-form-label">{{ __('Profile Picture') }}</label>

                            <div class="col-md-6">
                                <input id="profile_pic" type="file" class="form-control @error('profile_pic') is-invalid @enderror" name="profile_pic" required autocomplete="current-profile_pic">

                                @error('profile_pic')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>$errors->first('profile_pic')</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    {{ __('Add Profile') }}
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