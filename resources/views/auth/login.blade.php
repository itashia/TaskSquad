@extends('layouts.app')

@section('content')
    <div class="login-page">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-7">
                    <div class="auth-card">
                        <div class="auth-header">
                            <div class="login-icon">
                                <i class="fa-duotone fa-user-lock"></i>
                            </div>
                            <h2 class="auth-title">ورود به حساب کاربری</h2>
                            <p class="auth-subtitle">لطفاً اطلاعات حساب خود را وارد کنید</p>
                        </div>

                        <div class="auth-body">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="form-group floating-input">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    <label for="email">آدرس ایمیل</label>
                                    <i class="input-icon fa-duotone fa-envelope"></i>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group floating-input">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password">
                                    <label for="password">کلمه عبور</label>
                                    <i class="input-icon fa-duotone fa-lock"></i>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group remember-me">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="remember">مرا به خاطر بسپار</label>
                                    </div>
                                    @if (Route::has('password.request'))
                                        <a class="forgot-password" href="{{ route('password.request') }}">
                                            رمز عبور را فراموش کرده‌اید؟
                                        </a>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block btn-auth">
                                        <i class="fa-duotone fa-sign-in-alt"></i> ورود به حساب
                                    </button>
                                </div>
                            </form>
                        </div>

                        <div class="auth-footer">
                            حساب کاربری ندارید؟ <a href="{{ route('register') }}">ثبت‌نام کنید</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @section('styles')
        <style>
            .login-page {
                min-height: 100vh;
                display: flex;
                align-items: center;
                padding: 20px 0;
            }

            .auth-card {
                background: white;
                border-radius: 20px;
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
                overflow: hidden;
                transition: all 0.3s ease;
            }

            .auth-card:hover {
                box-shadow: 0 15px 35px rgba(0, 0, 0, 0.12);
                transform: translateY(-5px);
            }

            .auth-header {
                padding: 30px;
                text-align: center;
                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                color: white;
            }

            .login-icon {
                font-size: 3.5rem;
                margin-bottom: 15px;
                color: white;
                animation: bounce 2s infinite;
            }

            .auth-title {
                font-weight: 700;
                margin-bottom: 5px;
            }

            .auth-subtitle {
                opacity: 0.9;
                font-size: 0.9rem;
            }

            .auth-body {
                padding: 30px;
            }

            .form-group {
                margin-bottom: 1.5rem;
                position: relative;
            }

            .floating-input {
                position: relative;
            }

            .floating-input input {
                height: 50px;
                padding: 15px 15px 15px 45px;
                border-radius: 10px;
                border: 1px solid #e0e0e0;
                transition: all 0.3s;
            }

            .floating-input input:focus {
                border-color: #667eea;
                box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.2);
            }

            .floating-input label {
                position: absolute;
                top: 15px;
                right: 45px;
                color: #999;
                transition: all 0.3s;
                pointer-events: none;
                background: white;
                padding: 0 5px;
            }

            .floating-input input:focus+label,
            .floating-input input:not(:placeholder-shown)+label {
                top: -10px;
                right: 35px;
                font-size: 0.8rem;
                color: #667eea;
            }

            .input-icon {
                position: absolute;
                top: 15px;
                right: 15px;
                color: #667eea;
            }

            .remember-me {
                display: flex;
                justify-content: space-between;
                align-items: center;
            }

            .custom-checkbox .custom-control-label::before {
                border-radius: 5px;
            }

            .custom-checkbox .custom-control-input:checked~.custom-control-label::before {
                background-color: #667eea;
                border-color: #667eea;
            }

            .forgot-password {
                color: #667eea;
                font-size: 0.85rem;
            }

            .forgot-password:hover {
                text-decoration: none;
                color: #764ba2;
            }

            .btn-auth {
                height: 50px;
                border-radius: 10px;
                font-weight: 600;
                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                border: none;
                transition: all 0.3s;
            }

            .btn-auth:hover {
                transform: translateY(-3px);
                box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
            }

            .auth-footer {
                padding: 20px;
                text-align: center;
                border-top: 1px solid #f0f0f0;
                font-size: 0.9rem;
            }

            .auth-footer a {
                color: #667eea;
                font-weight: 600;
            }

            /* انیمیشن‌ها */
            @keyframes bounce {

                0%,
                20%,
                50%,
                80%,
                100% {
                    transform: translateY(0);
                }

                40% {
                    transform: translateY(-15px);
                }

                60% {
                    transform: translateY(-7px);
                }
            }

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

            .auth-card {
                animation: fadeIn 0.6s ease-out;
            }

            /* طراحی ریسپانسیو */
            @media (max-width: 576px) {
                .auth-header {
                    padding: 20px;
                }

                .auth-body {
                    padding: 20px;
                }

                .login-icon {
                    font-size: 2.5rem;
                }
            }
        </style>
    @endsection
@endsection