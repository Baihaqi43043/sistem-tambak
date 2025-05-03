@extends('layouts.app')

@section('content')
    <div class="login-container">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6">
                    <div class="card shadow-lg border-0 rounded-lg">
                        <div class="card-header bg-primary text-white text-center py-4">
                            <h3 class="font-weight-bold mb-0">{{ __('Sistem Tambak') }}</h3>
                            <p class="mb-0">{{ __('Sign in to your account') }}</p>
                        </div>
                        <div class="card-body p-4">
                            <div class="text-center mb-4">
                                <!-- You can add your company logo here -->
                                <i class="fas fa-user-circle fa-4x text-primary mb-3"></i>
                            </div>

                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="form-group mb-3">
                                    <label for="email"
                                        class="form-label text-muted small text-uppercase fw-bold">{{ __('Email Address') }}</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light border-end-0">
                                            <i class="fas fa-envelope text-muted"></i>
                                        </span>
                                        <input id="email" type="email"
                                            class="form-control border-start-0 @error('email') is-invalid @enderror"
                                            name="email" value="{{ old('email') }}" placeholder="Enter your email"
                                            required autocomplete="email" autofocus>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group mb-4">
                                    <div class="d-flex justify-content-between">
                                        <label for="password"
                                            class="form-label text-muted small text-uppercase fw-bold">{{ __('Password') }}</label>
                                        @if (Route::has('password.request'))
                                            <a href="{{ route('password.request') }}" class="text-decoration-none small">
                                                {{ __('Forgot Password?') }}
                                            </a>
                                        @endif
                                    </div>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light border-end-0">
                                            <i class="fas fa-lock text-muted"></i>
                                        </span>
                                        <input id="password" type="password"
                                            class="form-control border-start-0 @error('password') is-invalid @enderror"
                                            name="password" placeholder="Enter your password" required
                                            autocomplete="current-password">
                                        <span class="input-group-text bg-light border-start-0 toggle-password"
                                            style="cursor: pointer;">
                                            <i class="fas fa-eye-slash text-muted"></i>
                                        </span>
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group mb-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>

                                <div class="d-grid gap-2 mb-4">
                                    <button type="submit" class="btn btn-primary btn-lg">
                                        {{ __('Sign In') }}
                                        <i class="fas fa-sign-in-alt ms-1"></i>
                                    </button>
                                </div>

                                <div class="text-center">
                                    <span class="text-muted small">{{ __('Don\'t have an account?') }}</span>
                                    <a href="{{ route('register') }}" class="text-decoration-none small fw-bold">
                                        {{ __('Create Account') }}
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <style>
            .login-container {
                background: linear-gradient(to right, #4e54c8, #8f94fb);
                min-height: 100vh;
                padding: 80px 0;
            }

            .card {
                overflow: hidden;
                border-radius: 10px;
            }

            .card-header {
                border-bottom: none;
                border-radius: 10px 10px 0 0 !important;
            }

            .btn-primary {
                background: linear-gradient(to right, #4e54c8, #8f94fb);
                border: none;
                transition: all 0.3s ease;
            }

            .btn-primary:hover {
                transform: translateY(-3px);
                box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            }

            .btn-social {
                transition: all 0.3s ease;
            }

            .btn-social:hover {
                transform: translateY(-3px);
            }

            .input-group-text {
                border-radius: 0.25rem 0 0 0.25rem;
            }

            .form-control {
                border-radius: 0 0.25rem 0.25rem 0;
            }

            /* Animation for form elements */
            @keyframes fadeIn {
                from {
                    opacity: 0;
                    transform: translateY(20px);
                }

                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            .card-body>* {
                animation: fadeIn 0.5s ease forwards;
            }

            .form-group:nth-child(1) {
                animation-delay: 0.1s;
            }

            .form-group:nth-child(2) {
                animation-delay: 0.2s;
            }

            .form-group:nth-child(3) {
                animation-delay: 0.3s;
            }

            .form-group:nth-child(4) {
                animation-delay: 0.4s;
            }
        </style>

        <script>
            // Password visibility toggle
            document.addEventListener('DOMContentLoaded', function() {
                const togglePassword = document.querySelector('.toggle-password');
                const passwordInput = document.querySelector('#password');

                togglePassword.addEventListener('click', function() {
                    // Toggle type
                    const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                    passwordInput.setAttribute('type', type);

                    // Toggle icon
                    const iconElement = togglePassword.querySelector('i');
                    iconElement.classList.toggle('fa-eye');
                    iconElement.classList.toggle('fa-eye-slash');
                });
            });
        </script>
    @endsection
