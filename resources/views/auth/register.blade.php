@extends('layouts.app')

@section('content')
    <div class="register-page">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-8">
                    <div class="auth-card register-card">
                        <div class="auth-header">
                            <div class="register-icon">
                                <i class="fa-duotone fa-user-plus"></i>
                            </div>
                            <h2 class="auth-title">ایجاد حساب کاربری جدید</h2>
                            <p class="auth-subtitle">لطفاً اطلاعات مورد نیاز را وارد کنید</p>
                        </div>

                        <div class="auth-body">
                            <form method="POST" action="{{ route('register') }}">
                                @csrf

                                <div class="form-group floating-input">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                    <label for="name">نام کامل</label>
                                    <i class="input-icon fa-duotone fa-user"></i>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group floating-input">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" required autocomplete="email">
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
                                        required autocomplete="new-password">
                                    <label for="password">کلمه عبور</label>
                                    <i class="input-icon fa-duotone fa-lock"></i>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group floating-input">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                    <label for="password-confirm">تکرار کلمه عبور</label>
                                    <i class="input-icon fa-duotone fa-lock-keyhole"></i>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block btn-auth">
                                        <i class="fa-duotone fa-user-plus"></i> ایجاد حساب کاربری
                                    </button>
                                </div>
                            </form>
                        </div>

                        <div class="auth-footer">
                            قبلاً حساب دارید؟ <a href="{{ route('login') }}">وارد شوید</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @section('styles')
        <style>
            .register-page {
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

            .register-card {
                border-top: 5px solid #4facfe;
            }

            .auth-card:hover {
                box-shadow: 0 15px 35px rgba(0, 0, 0, 0.12);
                transform: translateY(-5px);
            }

            .auth-header {
                padding: 30px;
                text-align: center;
                background: white;
                color: #333;
            }

            .register-icon {
                font-size: 3.5rem;
                margin-bottom: 15px;
                color: #4facfe;
                animation: pulse 2s infinite;
            }

            .auth-title {
                font-weight: 700;
                margin-bottom: 5px;
                color: #333;
            }

            .auth-subtitle {
                color: #666;
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
                border-color: #4facfe;
                box-shadow: 0 0 0 3px rgba(79, 172, 254, 0.2);
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
                color: #4facfe;
            }

            .input-icon {
                position: absolute;
                top: 15px;
                right: 15px;
                color: #4facfe;
            }

            .btn-auth {
                height: 50px;
                border-radius: 10px;
                font-weight: 600;
                background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
                border: none;
                transition: all 0.3s;
                margin-top: 10px;
            }

            .btn-auth:hover {
                transform: translateY(-3px);
                box-shadow: 0 5px 15px rgba(79, 172, 254, 0.4);
            }

            .auth-footer {
                padding: 20px;
                text-align: center;
                border-top: 1px solid #f0f0f0;
                font-size: 0.9rem;
                color: #666;
            }

            .auth-footer a {
                color: #4facfe;
                font-weight: 600;
            }

            /* انیمیشن‌ها */
            @keyframes pulse {
                0% {
                    transform: scale(1);
                }

                50% {
                    transform: scale(1.1);
                }

                100% {
                    transform: scale(1);
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

                .register-icon {
                    font-size: 2.5rem;
                }
            }
        </style>
    @endsection
@endsection