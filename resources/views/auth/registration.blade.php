@extends('layout.auth-modern')
@section('title', __('signup'))
@section('content')
    <style>
        .modern-signup-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            position: relative;
            overflow: hidden;
            padding: 40px 20px;
        }

        .modern-signup-container::before {
            content: '';
            position: absolute;
            width: 600px;
            height: 600px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            top: -300px;
            left: -200px;
            animation: float 7s ease-in-out infinite;
        }

        .modern-signup-container::after {
            content: '';
            position: absolute;
            width: 450px;
            height: 450px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            bottom: -225px;
            right: -150px;
            animation: float 9s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-30px) rotate(5deg); }
        }

        .glass-card-signup {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 24px;
            padding: 48px;
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
            border: 1px solid rgba(255, 255, 255, 0.18);
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

        .logo-modern {
            text-align: center;
            margin-bottom: 32px;
        }

        .logo-modern img {
            max-height: 60px;
            width: auto;
        }

        .welcome-text-signup {
            text-align: center;
            margin-bottom: 32px;
        }

        .welcome-text-signup h1 {
            font-size: 32px;
            font-weight: 700;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 8px;
        }

        .welcome-text-signup p {
            color: #64748b;
            font-size: 15px;
            margin: 0;
        }

        .modern-form-group {
            margin-bottom: 20px;
        }

        .modern-form-group label {
            display: block;
            font-weight: 600;
            color: #334155;
            margin-bottom: 8px;
            font-size: 14px;
        }

        .modern-input, .modern-select {
            width: 100%;
            padding: 12px 16px;
            border: 2px solid #e2e8f0;
            border-radius: 12px;
            font-size: 15px;
            transition: all 0.3s ease;
            background: white;
        }

        .modern-input:focus, .modern-select:focus {
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

        .file-upload-wrapper {
            position: relative;
            overflow: hidden;
            display: inline-block;
            width: 100%;
        }

        .file-upload-btn {
            width: 100%;
            padding: 12px 16px;
            border: 2px dashed #e2e8f0;
            border-radius: 12px;
            background: #f8fafc;
            color: #64748b;
            cursor: pointer;
            transition: all 0.3s;
            text-align: center;
            font-size: 14px;
        }

        .file-upload-btn:hover {
            border-color: #667eea;
            background: rgba(102, 126, 234, 0.05);
            color: #667eea;
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

        .modern-btn-signup {
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

        .modern-btn-signup:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px 0 rgba(102, 126, 234, 0.6);
        }

        .signin-link {
            text-align: center;
            margin-top: 24px;
            color: #64748b;
            font-size: 14px;
        }

        .signin-link a {
            color: #667eea;
            font-weight: 600;
            text-decoration: none;
            transition: color 0.3s;
        }

        .signin-link a:hover {
            color: #764ba2;
        }

        .error-message {
            color: #ef4444;
            font-size: 13px;
            margin-top: 4px;
        }

        /* Custom scrollbar */
        .glass-card-signup::-webkit-scrollbar {
            width: 6px;
        }

        .glass-card-signup::-webkit-scrollbar-track {
            background: #f1f5f9;
            border-radius: 10px;
        }

        .glass-card-signup::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 10px;
        }

        .glass-card-signup::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }
    </style>

    <div class=\"modern-signup-container\">
        <div class=\"glass-card-signup\">
            <form action=\"{{ route('signup.request') }}\" method=\"POST\" enctype=\"multipart/form-data\">
                @csrf
                
                <div class=\"logo-modern\">
                    <img src=\"{{ $general_settings->logo->file ?? asset('/logo/logo.png') }}\" alt=\"Logo\">
                </div>

                <div class=\"welcome-text-signup\">
                    <h1>Create Account</h1>
                    <p>Join {{ isset($general_settings->site_title) && $general_settings->site_title ? $general_settings->site_title : 'Ready POS' }} today</p>
                </div>

                <div class=\"modern-form-group\">
                    <label>Full Name</label>
                    <input type=\"text\" 
                           name=\"name\" 
                           class=\"modern-input\" 
                           placeholder=\"Enter your full name\"
                           required>
                    @error('name')
                        <div class=\"error-message\">{{ $message }}</div>
                    @enderror
                </div>

                <div class=\"modern-form-group\">
                    <label>Email Address</label>
                    <input type=\"email\" 
                           name=\"email\" 
                           class=\"modern-input\" 
                           placeholder=\"you@example.com\"
                           required>
                    @error('email')
                        <div class=\"error-message\">{{ $message }}</div>
                    @enderror
                </div>

                <div class=\"modern-form-group\">
                    <label>Password</label>
                    <div class=\"password-wrapper\">
                        <input type=\"password\" 
                               name=\"password\" 
                               id=\"password\" 
                               class=\"modern-input\" 
                               placeholder=\"Create a strong password\"
                               required>
                        <span class=\"password-toggle\" onclick=\"togglePassword()\">
                            <i class=\"far fa-eye\" id=\"toggleIcon\"></i>
                        </span>
                    </div>
                    @error('password')
                        <div class=\"error-message\">{{ $message }}</div>
                    @enderror
                </div>

                <div class=\"modern-form-group\">
                    <label>Shop Name</label>
                    <input type=\"text\" 
                           name=\"shop_name\" 
                           class=\"modern-input\" 
                           placeholder=\"Your shop name\"
                           required>
                    @error('shop_name')
                        <div class=\"error-message\">{{ $message }}</div>
                    @enderror
                </div>

                <div class=\"modern-form-group\">
                    <label>Shop Category</label>
                    <select name=\"shop_category_id\" class=\"modern-select\" required>
                        <option value=\"\" disabled selected>Select a category</option>
                        @if (isset($shopCategories) && $shopCategories->isNotEmpty())
                            @foreach ($shopCategories as $shopCategory)
                                <option value=\"{{ $shopCategory->id }}\">{{ $shopCategory->name }}</option>
                            @endforeach
                        @endif
                    </select>
                    @error('shop_category_id')
                        <div class=\"error-message\">{{ $message }}</div>
                    @enderror
                </div>

                <div class=\"modern-form-group\">
                    <label>Shop Logo <span style=\"color: #94a3b8; font-weight: 400;\">(Optional)</span></label>
                    <div class=\"file-upload-wrapper\">
                        <div class=\"file-upload-btn\">
                            <i class=\"fas fa-cloud-upload-alt\"></i> Choose File
                        </div>
                        <input type=\"file\" name=\"logo\" accept=\"image/*\">
                    </div>
                    @error('logo')
                        <div class=\"error-message\">{{ $message }}</div>
                    @enderror
                </div>

                <div class=\"modern-form-group\">
                    <label>Shop Favicon <span style=\"color: #94a3b8; font-weight: 400;\">(Optional)</span></label>
                    <div class=\"file-upload-wrapper\">
                        <div class=\"file-upload-btn\">
                            <i class=\"fas fa-cloud-upload-alt\"></i> Choose File
                        </div>
                        <input type=\"file\" name=\"favicon\" accept=\"image/*\">
                    </div>
                    @error('favicon')
                        <div class=\"error-message\">{{ $message }}</div>
                    @enderror
                </div>

                <button type=\"submit\" class=\"modern-btn-signup\">Sign Up</button>

                <div class=\"signin-link\">
                    Already have an account? <a href=\"{{ route('signin.index') }}\">Sign In</a>
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
