@extends('layout.auth')
@section('title', __('signin'))
@section('content')
    <style>
        .modern-login-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            position: relative;
            overflow: hidden;
        }

        .modern-login-container::before {
            content: '';
            position: absolute;
            width: 500px;
            height: 500px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            top: -250px;
            right: -100px;
            animation: float 6s ease-in-out infinite;
        }

        .modern-login-container::after {
            content: '';
            position: absolute;
            width: 400px;
            height: 400px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            bottom: -200px;
            left: -100px;
            animation: float 8s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 24px;
            padding: 48px;
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
            border: 1px solid rgba(255, 255, 255, 0.18);
            max-width: 480px;
            width: 100%;
            position: relative;
            z-index: 10;
            animation: slideUp 0.6s ease-out;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .logo-modern {
            text-align: center;
            margin-bottom: 32px;
        }

        .logo-modern img {
            max-height: 60px;
            width: auto;
        }

        .welcome-text {
            text-align: center;
            margin-bottom: 40px;
        }

        .welcome-text h1 {
            font-size: 32px;
            font-weight: 700;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 8px;
        }

        .welcome-text p {
            color: #64748b;
            font-size: 16px;
            margin: 0;
        }

        .modern-form-group {
            margin-bottom: 24px;
        }

        .modern-form-group label {
            display: block;
            font-weight: 600;
            color: #334155;
            margin-bottom: 8px;
            font-size: 14px;
        }

        .modern-input {
            width: 100%;
            padding: 14px 16px;
            border: 2px solid #e2e8f0;
            border-radius: 12px;
            font-size: 16px;
            transition: all 0.3s ease;
            background: white;
        }

        .modern-input:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1);
        }

        .password-wrapper {
            position: relative;
        }

        .password-toggle {
            position: absolute;
            right: 16px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #94a3b8;
            transition: color 0.3s;
        }

        .password-toggle:hover {
            color: #667eea;
        }

        .modern-btn {
            width: 100%;
            padding: 16px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            border-radius: 12px;
            color: white;
            font-weight: 600;
            font-size: 16px;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px 0 rgba(102, 126, 234, 0.4);
            margin-top: 8px;
        }

        .modern-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px 0 rgba(102, 126, 234, 0.6);
        }

        .modern-btn:active {
            transform: translateY(0);
        }

        .signup-link {
            text-align: center;
            margin-top: 24px;
            color: #64748b;
            font-size: 14px;
        }

        .signup-link a {
            color: #667eea;
            font-weight: 600;
            text-decoration: none;
            transition: color 0.3s;
        }

        .signup-link a:hover {
            color: #764ba2;
        }

        .demo-buttons {
            margin-top: 32px;
            padding-top: 32px;
            border-top: 1px solid #e2e8f0;
        }

        .demo-btn {
            padding: 10px 20px;
            background: white;
            border: 2px solid #e2e8f0;
            border-radius: 8px;
            color: #334155;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            margin: 4px;
        }

        .demo-btn:hover {
            border-color: #667eea;
            color: #667eea;
            transform: translateY(-2px);
        }

        .error-message {
            color: #ef4444;
            font-size: 13px;
            margin-top: 4px;
        }

        .version-badge {
            position: absolute;
            top: 20px;
            right: 20px;
            padding: 6px 12px;
            background: rgba(255, 255, 255, 0.9);
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            color: #667eea;
        }
    </style>

    <div class="modern-login-container">
        <span class="version-badge">{{ config('app.app_version', 'v1.0') }}</span>
        
        <div class="glass-card">
            <form action="{{ route('signin.request') }}" method="POST">
                @csrf
                
                <div class="logo-modern">
                    <img src="{{ $general_settings->logo->file ?? asset('/logo/logo.png') }}" alt="Logo">
                </div>

                <div class="welcome-text">
                    <h1>Welcome Back!</h1>
                    <p>Sign in to continue to {{ isset($general_settings->site_title) && $general_settings->site_title ? $general_settings->site_title : 'Ready POS' }}</p>
                </div>

                <div class="modern-form-group">
                    <label>Email Address</label>
                    <input type="email" 
                           name="email" 
                           id="email" 
                           class="modern-input" 
                           placeholder="you@example.com"
                           required>
                    @error('email')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="modern-form-group">
                    <label>Password</label>
                    <div class="password-wrapper">
                        <input type="password" 
                               name="password" 
                               id="password" 
                               class="modern-input" 
                               placeholder="Enter your password"
                               required>
                        <span class="password-toggle" onclick="togglePassword()">
                            <i class="far fa-eye" id="toggleIcon"></i>
                        </span>
                    </div>
                    @error('password')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="modern-btn">Sign In</button>

                <div class="signup-link">
                    Don't have an account? <a href="{{ route('signup.index') }}">Sign Up</a>
                </div>

                @if (app()->environment('local'))
                    <div class="demo-buttons">
                        <div style="text-align: center; color: #64748b; font-size: 13px; margin-bottom: 16px; font-weight: 600;">
                            Quick Demo Access
                        </div>
                        <div style="display: flex; flex-wrap: wrap; justify-content: center; gap: 8px;">
                            <button type="button" class="demo-btn" id="super_admin">Super Admin</button>
                            <button type="button" class="demo-btn" id="admin">Admin</button>
                            <button type="button" class="demo-btn" id="groceryShop">Grocery</button>
                            <button type="button" class="demo-btn" id="pharmacyShop">Pharmacy</button>
                            <button type="button" class="demo-btn" id="mobileShop">Electronics</button>
                            <button type="button" class="demo-btn" id="restaurant">Restaurant</button>
                        </div>
                    </div>
                @endif
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const toggleIcon = document.getElementById('toggleIcon');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.classList.remove('fa-eye');
                toggleIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                toggleIcon.classList.remove('fa-eye-slash');
                toggleIcon.classList.add('fa-eye');
            }
        }

        document.getElementById('super_admin')?.addEventListener('click', function(e) {
            e.preventDefault();
            document.getElementById('email').value = 'superadmin@example.com';
            document.getElementById('password').value = 'secret';
        });

        document.getElementById('admin')?.addEventListener('click', function(e) {
            e.preventDefault();
            document.getElementById('email').value = 'admin@example.com';
            document.getElementById('password').value = 'secret';
        });

        document.getElementById('groceryShop')?.addEventListener('click', function(e) {
            e.preventDefault();
            document.getElementById('email').value = 'groceryshop@example.com';
            document.getElementById('password').value = 'secret';
        });

        document.getElementById('pharmacyShop')?.addEventListener('click', function(e) {
            e.preventDefault();
            document.getElementById('email').value = 'pharmacy@example.com';
            document.getElementById('password').value = 'secret';
        });

        document.getElementById('mobileShop')?.addEventListener('click', function(e) {
            e.preventDefault();
            document.getElementById('email').value = 'electronics@example.com';
            document.getElementById('password').value = 'secret';
        });

        document.getElementById('restaurant')?.addEventListener('click', function(e) {
            e.preventDefault();
            document.getElementById('email').value = 'restaurant@example.com';
            document.getElementById('password').value = 'secret';
        });
    </script>
@endpush