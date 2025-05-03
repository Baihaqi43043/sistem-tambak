@extends('layouts.app')

@section('content')
    <div class="register-container">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6">
                    <div class="card shadow-lg border-0 rounded-lg">
                        <div class="card-header bg-primary text-white text-center py-4">
                            <h3 class="font-weight-bold mb-0">{{ __('Create Account') }}</h3>
                            <p class="mb-0">{{ __('Join our community today') }}</p>
                        </div>
                        <div class="card-body p-4">
                            <div class="text-center mb-4">
                                <!-- You can add your company logo here -->
                                <i class="fas fa-user-plus fa-4x text-primary mb-3"></i>
                            </div>

                            <form method="POST" action="{{ route('register') }}">
                                @csrf

                                <div class="form-group mb-3">
                                    <label for="name"
                                        class="form-label text-muted small text-uppercase fw-bold">{{ __('Full Name') }}</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light border-end-0">
                                            <i class="fas fa-user text-muted"></i>
                                        </span>
                                        <input id="name" type="text"
                                            class="form-control border-start-0 @error('name') is-invalid @enderror"
                                            name="name" value="{{ old('name') }}" placeholder="Enter your full name"
                                            required autocomplete="name" autofocus>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="email"
                                        class="form-label text-muted small text-uppercase fw-bold">{{ __('Email Address') }}</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light border-end-0">
                                            <i class="fas fa-envelope text-muted"></i>
                                        </span>
                                        <input id="email" type="email"
                                            class="form-control border-start-0 @error('email') is-invalid @enderror"
                                            name="email" value="{{ old('email') }}"
                                            placeholder="Enter your email address" required autocomplete="email">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="password"
                                        class="form-label text-muted small text-uppercase fw-bold">{{ __('Password') }}</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light border-end-0">
                                            <i class="fas fa-lock text-muted"></i>
                                        </span>
                                        <input id="password" type="password"
                                            class="form-control border-start-0 @error('password') is-invalid @enderror"
                                            name="password" placeholder="Create a password" required
                                            autocomplete="new-password">
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
                                    <div class="password-strength mt-1 small">
                                        <div class="progress" style="height: 5px;">
                                            <div class="progress-bar bg-danger" role="progressbar" style="width: 0%"></div>
                                        </div>
                                        <span class="text-muted small mt-1">Password strength: <span
                                                class="strength-text">Weak</span></span>
                                    </div>
                                </div>

                                <div class="form-group mb-4">
                                    <label for="password-confirm"
                                        class="form-label text-muted small text-uppercase fw-bold">{{ __('Confirm Password') }}</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light border-end-0">
                                            <i class="fas fa-lock text-muted"></i>
                                        </span>
                                        <input id="password-confirm" type="password" class="form-control border-start-0"
                                            name="password_confirmation" placeholder="Confirm your password" required
                                            autocomplete="new-password">
                                        <span class="input-group-text bg-light border-start-0 toggle-confirm-password"
                                            style="cursor: pointer;">
                                            <i class="fas fa-eye-slash text-muted"></i>
                                        </span>
                                    </div>
                                </div>

                                <div class="form-group mb-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="terms" id="terms"
                                            required>
                                        <label class="form-check-label small" for="terms">
                                            {{ __('I agree to the') }} <a href="#"
                                                class="text-decoration-none">{{ __('Terms of Service') }}</a>
                                            {{ __('and') }} <a href="#"
                                                class="text-decoration-none">{{ __('Privacy Policy') }}</a>
                                        </label>
                                    </div>
                                </div>

                                <div class="d-grid gap-2 mb-4">
                                    <button type="submit" class="btn btn-primary btn-lg">
                                        {{ __('Register Now') }}
                                        <i class="fas fa-user-plus ms-1"></i>
                                    </button>
                                </div>

                                <div class="text-center">
                                    <span class="text-muted small">{{ __('Already have an account?') }}</span>
                                    <a href="{{ route('login') }}" class="text-decoration-none small fw-bold">
                                        {{ __('Sign In') }}
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .register-container {
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
        document.addEventListener('DOMContentLoaded', function() {
            // Password visibility toggle
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

            // Confirm password visibility toggle
            const toggleConfirmPassword = document.querySelector('.toggle-confirm-password');
            const confirmPasswordInput = document.querySelector('#password-confirm');

            toggleConfirmPassword.addEventListener('click', function() {
                // Toggle type
                const type = confirmPasswordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                confirmPasswordInput.setAttribute('type', type);

                // Toggle icon
                const iconElement = toggleConfirmPassword.querySelector('i');
                iconElement.classList.toggle('fa-eye');
                iconElement.classList.toggle('fa-eye-slash');
            });

            // Password strength meter
            const passwordStrength = document.querySelector('.password-strength .progress-bar');
            const strengthText = document.querySelector('.strength-text');

            passwordInput.addEventListener('input', function() {
                const password = this.value;
                let strength = 0;

                // Check length
                if (password.length >= 8) strength += 25;

                // Check lowercase and uppercase
                if (password.match(/[a-z]/) && password.match(/[A-Z]/)) strength += 25;

                // Check numbers
                if (password.match(/\d/)) strength += 25;

                // Check special chars
                if (password.match(/[^a-zA-Z\d]/)) strength += 25;

                // Update progress bar
                passwordStrength.style.width = strength + '%';

                // Update class based on strength
                passwordStrength.classList.remove('bg-danger', 'bg-warning', 'bg-info', 'bg-success');

                if (strength <= 25) {
                    passwordStrength.classList.add('bg-danger');
                    strengthText.textContent = 'Weak';
                } else if (strength <= 50) {
                    passwordStrength.classList.add('bg-warning');
                    strengthText.textContent = 'Fair';
                } else if (strength <= 75) {
                    passwordStrength.classList.add('bg-info');
                    strengthText.textContent = 'Good';
                } else {
                    passwordStrength.classList.add('bg-success');
                    strengthText.textContent = 'Strong';
                }
            });
        });
    </script>
@endsection
