@extends('layout.auth-modern')
@section('title', __('signin'))
@section('content')
    <style>
        .mirra-login-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #0047AB 0%, #003D99 50%, #FFD700 100%);
            position: relative;
            overflow: hidden;
        }

        .mirra-login-container::before {
            content: '';
            position: absolute;
            width: 500px;
            height: 500px;
            background: radial-gradient(circle, rgba(255, 215, 0, 0.2) 0%, transparent 70%);
            border-radius: 50%;
            top: -250px;
            right: -100px;
            animation: float 6s ease-in-out infinite;
        }

        .mirra-login-container::after {
            content: '';
            position: absolute;
            width: 400px;
            height: 400px;
            background: radial-gradient(circle, rgba(255, 215, 0, 0.15) 0%, transparent 70%);
            border-radius: 50%;
            bottom: -200px;
            left: -100px;
            animation: float 8s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px) scale(1); }
            50% { transform: translateY(-20px) scale(1.05); }
        }

        .mirra-glass-card {
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(10px);
            border-radius: 24px;
            padding: 48px;
            box-shadow: 0 8px 32px 0 rgba(0, 71, 171, 0.3), 0 0 0 1px rgba(255, 215, 0, 0.2);
            border: 1px solid rgba(255, 215, 0, 0.3);
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

        .mirra-logo {
            text-align: center;
            margin-bottom: 32px;
        }

        .mirra-logo img {
            max-height: 80px;
            width: auto;
        }

        .mirra-welcome-text {
            text-align: center;
            margin-bottom: 40px;
        }

        .mirra-welcome-text h1 {
            font-size: 32px;
            font-weight: 700;
            background: linear-gradient(135deg, #0047AB 0%, #FFD700 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 8px;
        }

        .mirra-welcome-text p {
            color: #64748b;
            font-size: 16px;
            margin: 0;
        }

        .mirra-form-group {
            margin-bottom: 24px;
        }

        .mirra-form-group label {
            display: block;
            font-weight: 600;
            color: #0047AB;
            margin-bottom: 8px;
            font-size: 14px;
        }

        .mirra-input {
            width: 100%;
            padding: 14px 16px;
            border: 2px solid #e2e8f0;
            border-radius: 12px;
            font-size: 16px;
            transition: all 0.3s ease;
            background: white;
        }

        .mirra-input:focus {
            outline: none;
            border-color: #FFD700;
            box-shadow: 0 0 0 4px rgba(255, 215, 0, 0.2);
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
            color: #FFD700;
        }

        .mirra-btn {
            width: 100%;
            padding: 16px;
            background: linear-gradient(135deg, #FFD700 0%, #FFC700 100%);
            border: none;
            border-radius: 12px;
            color: #0047AB;
            font-weight: 700;
            font-size: 16px;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px 0 rgba(255, 215, 0, 0.4);
            margin-top: 8px;
        }

        .mirra-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px 0 rgba(255, 215, 0, 0.6);
            background: linear-gradient(135deg, #FFC700 0%, #FFB700 100%);
        }

        .mirra-btn:active {
            transform: translateY(0);
        }

        .signup-link {
            text-align: center;
            margin-top: 24px;
            color: #64748b;
            font-size: 14px;
        }

        .signup-link a {
            color: #0047AB;
            font-weight: 600;
            text-decoration: none;
            transition: color 0.3s;
        }

        .signup-link a:hover {
            color: #FFD700;
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
            color: #0047AB;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            margin: 4px;
        }

        .demo-btn:hover {
            border-color: #FFD700;
            background: rgba(255, 215, 0, 0.1);
            color: #0047AB;
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
            background: rgba(255, 215, 0, 0.9);
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            color: #0047AB;
            box-shadow: 0 2px 8px rgba(255, 215, 0, 0.3);
        }

        .tagline {
            text-align: center;
            color: #0047AB;
            font-size: 13px;
            font-weight: 600;
            margin-top: -20px;
            margin-bottom: 24px;
            letter-spacing: 0.5px;
        }
    </style>

    <div class="mirra-login-container">
        <span class="version-badge">{{ config('app.app_version', 'v1.0') }}</span>
        
        <div class="mirra-glass-card">
            <form action="{{ route('signin.request') }}" method="POST">
                @csrf
                
                <div class="mirra-logo">
                    <img src="{{ asset('/mirra/logo.png') }}" alt="Mirra Logo">
                </div>

                <div class="tagline">TEMAN SETIA USAHA ANDA</div>

                <div class="mirra-welcome-text">
                    <h1>Selamat Datang!</h1>
                    <p>Masuk ke dashboard Mirra Anda</p>
                </div>

                <div class="mirra-form-group">
                    <label>Email</label>
                    <input type="email" 
                           name="email" 
                           id="email" 
                           class="mirra-input" 
                           placeholder="nama@email.com"
                           required>
                    @error('email')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mirra-form-group">
                    <label>Password</label>
                    <div class="password-wrapper">
                        <input type="password" 
                               name="password" 
                               id="password" 
                               class="mirra-input" 
                               placeholder="Masukkan password Anda"
                               required>
                        <span class="password-toggle" onclick="togglePassword()">
                            <i class="far fa-eye" id="toggleIcon"></i>
                        </span>
                    </div>
                    @error('password')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="mirra-btn">Masuk</button>

                <div class="signup-link">
                    Belum punya akun? <a href="{{ route('signup.index') }}">Daftar Sekarang</a>
                </div>

                @if (app()->environment('local'))
                    <div class="demo-buttons">
                        <div style="text-align: center; color: #0047AB; font-size: 13px; margin-bottom: 16px; font-weight: 600;">
                            Akses Demo Cepat
                        </div>
                        <div style="display: flex; flex-wrap: wrap; justify-content: center; gap: 8px;">
                            <button type="button" class="demo-btn" id="super_admin">Super Admin</button>
                            <button type="button" class="demo-btn" id="admin">Admin</button>
                            <button type="button" class="demo-btn" id="groceryShop">Toko</button>
                            <button type="button" class="demo-btn" id="pharmacyShop">Apotek</button>
                            <button type="button" class="demo-btn" id="mobileShop">Elektronik</button>
                            <button type="button" class="demo-btn" id="restaurant">Restoran</button>
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