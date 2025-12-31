@extends('layout.auth-modern')
@section('title', 'Reset Password')
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
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
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
            font-size: 28px;
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

        .error-message {
            color: #ef4444;
            font-size: 13px;
            margin-top: 4px;
            display: none;
        }

        .success-message {
            color: #10b981;
            font-size: 14px;
            text-align: center;
            margin-bottom: 20px;
            padding: 10px;
            background: rgba(16, 185, 129, 0.1);
            border-radius: 8px;
            display: none;
        }
    </style>

    <div class="mirra-login-container">
        <div class="mirra-glass-card">
            <div class="mirra-logo">
                <img src="{{ asset('/mirra/logo.png') }}" alt="Mirra Logo">
            </div>

            <div class="mirra-welcome-text">
                <h1>Reset Password</h1>
                <p>Masukkan password baru Anda</p>
            </div>

            <div id="successMessage" class="success-message"></div>
            <div id="globalError" class="error-message" style="text-align: center; margin-bottom: 20px;"></div>

            <form id="resetPasswordForm">
                <input type="hidden" name="token" value="{{ $token }}">
                
                <div class="mirra-form-group">
                    <label>Password Baru</label>
                    <div class="password-wrapper">
                        <input type="password" 
                               name="password" 
                               id="password" 
                               class="mirra-input" 
                               placeholder="Minimal 6 karakter"
                               required>
                        <span class="password-toggle" onclick="togglePassword('password')">
                            <i class="far fa-eye" id="password-icon"></i>
                        </span>
                    </div>
                    <div class="error-message" id="password-error"></div>
                </div>

                <div class="mirra-form-group">
                    <label>Konfirmasi Password</label>
                    <div class="password-wrapper">
                        <input type="password" 
                               name="password_confirmation" 
                               id="password_confirmation" 
                               class="mirra-input" 
                               placeholder="Ulangi password baru"
                               required>
                        <span class="password-toggle" onclick="togglePassword('password_confirmation')">
                            <i class="far fa-eye" id="password_confirmation-icon"></i>
                        </span>
                    </div>
                </div>

                <button type="submit" class="mirra-btn" id="submitBtn">Simpan Password</button>
            </form>
        </div>
    </div>

    <script>
        function togglePassword(fieldId) {
            const field = document.getElementById(fieldId);
            const icon = document.getElementById(fieldId + '-icon');
            
            if (field.type === 'password') {
                field.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                field.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        }

        document.getElementById('resetPasswordForm').addEventListener('submit', async function(e) {
            e.preventDefault();
            
            const btn = document.getElementById('submitBtn');
            const originalText = btn.innerText;
            const successMsg = document.getElementById('successMessage');
            const globalError = document.getElementById('globalError');
            const passwordError = document.getElementById('password-error');
            
            // Reset UI
            btn.disabled = true;
            btn.innerText = 'Memproses...';
            successMsg.style.display = 'none';
            globalError.style.display = 'none';
            passwordError.style.display = 'none';

            const formData = new FormData(this);
            const data = Object.fromEntries(formData.entries());
            data._method = 'PUT'; // Handle PUT request method spoofing if needed, though we will send as PUT

            try {
                const response = await fetch('/api/reset/password', {
                    method: 'PUT',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify(data)
                });

                const result = await response.json();

                if (response.ok) {
                    successMsg.innerText = result.message || 'Password berhasil diubah!';
                    successMsg.style.display = 'block';
                    this.reset();
                    setTimeout(() => {
                        window.location.href = '/signin'; // Redirect to login page
                    }, 2000);
                } else {
                    if (result.errors) {
                        if (result.errors.password) {
                            passwordError.innerText = result.errors.password[0];
                            passwordError.style.display = 'block';
                        }
                    } else {
                        globalError.innerText = result.message || 'Terjadi kesalahan. Silakan coba lagi.';
                        globalError.style.display = 'block';
                    }
                    btn.disabled = false;
                    btn.innerText = originalText;
                }
            } catch (error) {
                globalError.innerText = 'Terjadi kesalahan koneksi. Silakan coba lagi.';
                globalError.style.display = 'block';
                btn.disabled = false;
                btn.innerText = originalText;
            }
        });
    </script>
@endsection