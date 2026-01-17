<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>Giriş - Nordean Admin</title>
    <link href="{{ asset('admin/css/tabler.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('admin/css/tabler-vendors.min.css') }}" rel="stylesheet"/>
    <style>
        @import url('https://rsms.me/inter/inter.css');
        :root {
            --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
        }
        body {
            font-feature-settings: "cv03", "cv04", "cv11";
        }
    </style>
</head>
<body class="d-flex flex-column">
    <script src="{{ asset('admin/js/demo-theme.min.js') }}"></script>
    <div class="page page-center">
        <div class="container container-tight py-4">
            <div class="text-center mb-4">
                <a href="{{ route('home') }}" class="navbar-brand navbar-brand-autodark">
                    <img src="{{ asset('images/nordean-logo.png') }}" height="100" alt="Nordean">
                </a>
            </div>
            <div class="card card-md">
                <div class="card-body">
                    <h2 class="h2 text-center mb-4">Yönetici Girişi</h2>
                    
                    @if($errors->any())
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $error)
                                <div>{{ $error }}</div>
                            @endforeach
                        </div>
                    @endif
                    
                    <form action="{{ route('admin.login') }}" method="POST" autocomplete="off">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">E-posta Adresi</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="E-posta" value="{{ old('email') }}" required autofocus>
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Şifre</label>
                            <div class="input-group input-group-flat">
                                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Şifreniz" required>
                                <span class="input-group-text">
                                    <a href="#" class="link-secondary" title="Show password" data-bs-toggle="tooltip" onclick="togglePassword(this)">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" /><path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" /></svg>
                                    </a>
                                </span>
                            </div>
                        </div>
                        <div class="mb-2">
                            <label class="form-check">
                                <input type="checkbox" name="remember" class="form-check-input"/>
                                <span class="form-check-label">Bu cihazda beni hatırla</span>
                            </label>
                        </div>
                        <div class="form-footer">
                            <button type="submit" class="btn btn-primary w-100">Giriş Yap</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="text-center text-muted mt-3">
                <a href="{{ route('home') }}">← Web sitesine dön</a>
            </div>
        </div>
    </div>
    <script src="{{ asset('admin/js/tabler.min.js') }}" defer></script>
    <script>
        function togglePassword(el) {
            var input = el.closest('.input-group').querySelector('input');
            if (input.type === 'password') {
                input.type = 'text';
            } else {
                input.type = 'password';
            }
        }
    </script>
</body>
</html>


