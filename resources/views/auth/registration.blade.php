@extends('layout.auth-modern')
@section('title', __('signup'))
@section('content')
    <style>
        .mirra-signup-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #FFD700 0%, #FFC700 50%, #0047AB 100%);
            position: relative;
            overflow: hidden;
            padding: 40px 20px;
        }

        .mirra-signup-container::before {
            content: '';
            position: absolute;
            width: 600px;
            height: 600px;
            background: radial-gradient(circle, rgba(0, 71, 171, 0.15) 0%, transparent 70%);
            border-radius: 50%;
            top: -300px;
            left: -200px;
            animation: float 7s ease-in-out infinite;
        }

        .mirra-signup-container::after {
            content: '';
            position: absolute;
            width: 450px;
            height: 450px;
            background: radial-gradient(circle, rgba(0, 71, 171, 0.1) 0%, transparent 70%);
            border-radius: 50%;
            bottom: -225px;
            right: -150px;
            animation: float 9s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-30px) rotate(5deg); }
        }

        .mirra-glass-card-signup {
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(10px);
            border-radius: 24px;
            padding: 48px;
            box-shadow: 0 8px 32px 0 rgba(0, 71, 171, 0.3), 0 0 0 1px rgba(255, 215, 0, 0.3);
            border: 1px solid rgba(255, 215, 0, 0.4);
            max-width: 520px;
            width: 100%;
            position: relative;
            z-index: 10;
            animation: slideUp 0.6s ease-out;
            max-height: 90vh;
            overflow-y: auto;
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

        .mirra-logo-signup {
            text-align: center;
            margin-bottom: 24px;
        }

        .mirra-logo-signup img {
            max-height: 70px;
            width: auto;
        }

        .mirra-welcome-text-signup {
            text-align: center;
            margin-bottom: 32px;
        }

        .mirra-welcome-text-signup h1 {
            font-size: 32px;
            font-weight: 700;
            background: linear-gradient(135deg, #FFD700 0%, #0047AB 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 8px;
        }

        .mirra-welcome-text-signup p {
            color: #64748b;
            font-size: 15px;
            margin: 0;
        }

        .mirra-form-group {
            margin-bottom: 20px;
        }

        .mirra-form-group label {
            display: block;
            font-weight: 600;
            color: #0047AB;
            margin-bottom: 8px;
            font-size: 14px;
        }

        .mirra-input, .mirra-select {
            width: 100%;
            padding: 12px 16px;
            border: 2px solid #e2e8f0;
            border-radius: 12px;
            font-size: 15px;
            transition: all 0.3s ease;
            background: white;
        }

        .mirra-input:focus, .mirra-select:focus {
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

        .file-upload-wrapper {
            position: relative;
            overflow: hidden;
            display: inline-block;
            width: 100%;
        }

        .file-upload-btn {
            width: 100%;
            padding: 12px 16px;
            border: 2px dashed #FFD700;
            border-radius: 12px;
            background: rgba(255, 215, 0, 0.05);
            color: #0047AB;
            cursor: pointer;
            transition: all 0.3s;
            text-align: center;
            font-size: 14px;
            font-weight: 600;
        }

        .file-upload-btn:hover {
            border-color: #0047AB;
            background: rgba(0, 71, 171, 0.05);
        }

        .file-upload-wrapper input[type=file] {
            position: absolute;
            left: 0;
            top: 0;
            opacity: 0;
            width: 100%;
            height: 100%;
            cursor: pointer;
        }

        .mirra-btn-signup {
            width: 100%;
            padding: 16px;
            background: linear-gradient(135deg, #0047AB 0%, #003D99 100%);
            border: none;
            border-radius: 12px;
            color: #FFD700;
            font-weight: 700;
            font-size: 16px;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px 0 rgba(0, 71, 171, 0.4);
            margin-top: 8px;
        }

        .mirra-btn-signup:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px 0 rgba(0, 71, 171, 0.6);
            background: linear-gradient(135deg, #003D99 0%, #002D79 100%);
        }

        .signin-link {
            text-align: center;
            margin-top: 24px;
            color: #64748b;
            font-size: 14px;
        }

        .signin-link a {
            color: #0047AB;
            font-weight: 600;
            text-decoration: none;
            transition: color 0.3s;
        }

        .signin-link a:hover {
            color: #FFD700;
        }

        .error-message {
            color: #ef4444;
            font-size: 13px;
            margin-top: 4px;
        }

        /* Custom scrollbar */
        .mirra-glass-card-signup::-webkit-scrollbar {
            width: 6px;
        }

        .mirra-glass-card-signup::-webkit-scrollbar-track {
            background: #f1f5f9;
            border-radius: 10px;
        }

        .mirra-glass-card-signup::-webkit-scrollbar-thumb {
            background: #FFD700;
            border-radius: 10px;
        }

        .mirra-glass-card-signup::-webkit-scrollbar-thumb:hover {
            background: #FFC700;
        }

        .tagline-signup {
            text-align: center;
            color: #0047AB;
            font-size: 12px;
            font-weight: 600;
            margin-top: -16px;
            margin-bottom: 20px;
            letter-spacing: 0.5px;
        }
    </style>

    <div class="mirra-signup-container">
        <div class="mirra-glass-card-signup">
            <form action="{{ route('signup.request') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="mirra-logo-signup">
                    <img src="{{ asset('/mirra/logo.png') }}" alt="Mirra Logo">
                </div>

                <div class="tagline-signup">TEMAN SETIA USAHA ANDA</div>

                <div class="mirra-welcome-text-signup">
                    <h1>Buat Akun Baru</h1>
                    <p>Bergabung dengan Mirra untuk mengelola usaha Anda</p>
                </div>

                <div class="mirra-form-group">
                    <label>Nama Lengkap</label>
                    <input type="text" 
                           name="name" 
                           class="mirra-input" 
                           placeholder="Masukkan nama lengkap"
                           required>
                    @error('name')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mirra-form-group">
                    <label>Email</label>
                    <input type="email" 
                           name="email" 
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
                               placeholder="Buat password yang kuat"
                               required>
                        <span class="password-toggle" onclick="togglePassword()">
                            <i class="far fa-eye" id="toggleIcon"></i>
                        </span>
                    </div>
                    @error('password')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mirra-form-group">
                    <label>Nama Toko</label>
                    <input type="text" 
                           name="shop_name" 
                           class="mirra-input" 
                           placeholder="Nama toko atau usaha Anda"
                           required>
                    @error('shop_name')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mirra-form-group">
                    <label>Kategori Toko</label>
                    <select name="shop_category_id" class="mirra-select" required>
                        <option value="" disabled selected>Pilih kategori</option>
                        @if (isset($shopCategories) && $shopCategories->isNotEmpty())
                            @foreach ($shopCategories as $shopCategory)
                                <option value="{{ $shopCategory->id }}">{{ $shopCategory->name }}</option>
                            @endforeach
                        @endif
                    </select>
                    @error('shop_category_id')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mirra-form-group">
                    <label>Logo Toko <span style="color: #94a3b8; font-weight: 400;">(Opsional)</span></label>
                    <div class="file-upload-wrapper">
                        <div class="file-upload-btn">
                            <i class="fas fa-cloud-upload-alt"></i> Pilih File Logo
                        </div>
                        <input type="file" name="logo" accept="image/*">
                    </div>
                    @error('logo')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mirra-form-group">
                    <label>Favicon Toko <span style="color: #94a3b8; font-weight: 400;">(Opsional)</span></label>
                    <div class="file-upload-wrapper">
                        <div class="file-upload-btn">
                            <i class="fas fa-cloud-upload-alt"></i> Pilih File Favicon
                        </div>
                        <input type="file" name="favicon" accept="image/*">
                    </div>
                    @error('favicon')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="mirra-btn-signup">Daftar Sekarang</button>

                <div class="signin-link">
                    Sudah punya akun? <a href="{{ route('signin.index') }}">Masuk</a>
                </div>
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
    </script>
@endpush