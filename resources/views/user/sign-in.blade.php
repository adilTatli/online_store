@extends('user.layouts.layout')

@section('content')

<div class="container mt-5">
    <div class="row">
        <div class="col-5 mx-auto my-auto">
            <h3 class="mb-3">{{ __('signin.auth_title') }}</h3>
            <form method="POST">
                @csrf

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">{{ __('signin.email') }}</label>
                    <input value="{{ old('email') }}" name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">{{ __('signin.password') }}</label>
                    <input name="password" type="password" class="form-control" id="password" required>
                </div>
                <button type="submit" class="btn btn-primary">Авторизация</button>

            </form>
        </div>
    </div>
</div>

@endsection
