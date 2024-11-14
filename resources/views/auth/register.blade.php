@extends('partials.layout')
@section('title', 'Login')
@section('content')
    <div class="container mx-auto">
        <div class="card bg-base-300 shadow-xl w-1/2 mx-auto">
            <div class="card-body">
                <form action="{{ route('register') }}" method="POST">
                    @csrf

                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text">Name</span>
                        </div>
                        <input name="name" type="text" placeholder="Name"
                            class="input input-bordered @error('name') input-error @enderror w-full" required autofocus autocomplete="name"/>
                        <div class="label">
                            @error('name')
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            @enderror
                        </div>
                    </label>

                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text">Email</span>
                        </div>
                        <input name="email" type="email" placeholder="Email"
                            class="input input-bordered @error('email') input-error @enderror w-full" required autofocus autocomplete="username"/>
                        <div class="label">
                            @error('email')
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            @enderror
                        </div>
                    </label>
                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text">Password</span>
                        </div>
                        <input name="password" type="password" placeholder="Password"
                            class="input input-bordered @error('password') input-error @enderror w-full" required autocomplete="new-password"/>
                        <div class="label">
                            @error('password')
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            @enderror
                        </div>
                    </label>
                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text">Confirm Password</span>
                        </div>
                        <input name="password_confirmation" type="password" placeholder="Confirm Password"
                            class="input input-bordered @error('password_confirmation') input-error @enderror w-full" required autocomplete="new-password"/>
                        <div class="label">
                            @error('password_confirmation')
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            @enderror
                        </div>
                    </label>

                      <div class="flex content-center justify-end gap-2">
                        @if (Route::has('password.request'))
                            <a class="underline text-sm text-base-content self-center" href="{{ route('login') }}">
                                {{ __('Already registered?') }}
                            </a>
                        @endif
                        <input type="submit" class="btn btn-primary" value="Register" />
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
