<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión | Panel de Administración REW</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="icon" href="{{ asset('images/logo.webp') }}" type="image/webp">
    <style>
        *, *::before, *::after { box-sizing: border-box; }
        body {
            background: radial-gradient(circle at top center, #1e1b4b 0%, #090d16 60%, #020617 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1.5rem;
            color: #ffffff;
            font-family: 'Plus Jakarta Sans', sans-serif;
            margin: 0;
        }
        .login-card {
            background: rgba(15, 23, 42, 0.75);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.12);
            border-radius: 24px;
            max-width: 440px;
            width: 100%;
            padding: 2.5rem;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.7);
        }
        .login-input {
            width: 100%;
            padding: 0.85rem 1rem;
            background: rgba(2, 6, 23, 0.8);
            border: 1px solid rgba(255, 255, 255, 0.15);
            border-radius: 12px;
            color: #ffffff;
            font-size: 0.95rem;
            outline: none;
            transition: all 0.2s ease;
        }
        .login-input:focus {
            border-color: #6366f1;
            box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.25);
            background: rgba(2, 6, 23, 1);
        }
        .login-btn {
            width: 100%;
            background: linear-gradient(135deg, #4f46e5 0%, #6366f1 100%);
            color: #ffffff;
            border: none;
            border-radius: 12px;
            padding: 0.9rem;
            font-size: 0.95rem;
            font-weight: 800;
            cursor: pointer;
            transition: all 0.2s ease;
            box-shadow: 0 4px 14px rgba(79, 70, 229, 0.4);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }
        .login-btn:hover {
            background: linear-gradient(135deg, #4338ca 0%, #4f46e5 100%);
            box-shadow: 0 6px 20px rgba(79, 70, 229, 0.6);
            transform: translateY(-1px);
        }
    </style>
</head>
<body>
    <div class="login-card">
        <div style="text-align: center; margin-bottom: 2rem;">
            <a href="{{ route('home') }}">
                <img src="{{ asset('images/logo.webp') }}" alt="REW" style="height: 44px; width: auto; margin-bottom: 12px;">
            </a>
            <h1 style="font-size: 1.5rem; font-weight: 900; margin: 0; color: #ffffff; letter-spacing: -0.02em;">
                Acceso Administrador REW
            </h1>
            <p style="color: #94a3b8; font-size: 0.85rem; margin-top: 6px;">
                Panel de Control CRM & Gestión de Software
            </p>
        </div>

        @if($errors->any())
            <div style="background: rgba(239, 68, 68, 0.15); border: 1px solid rgba(239, 68, 68, 0.4); border-radius: 12px; padding: 12px 14px; margin-bottom: 1.5rem; color: #fca5a5; font-size: 0.85rem; font-weight: 600;">
                ⚠️ {{ $errors->first() }}
            </div>
        @endif

        @if(session('success'))
            <div style="background: rgba(16, 185, 129, 0.15); border: 1px solid rgba(16, 185, 129, 0.4); border-radius: 12px; padding: 12px 14px; margin-bottom: 1.5rem; color: #6ee7b7; font-size: 0.85rem; font-weight: 600;">
                ✅ {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('login.post') }}" method="POST">
            @csrf
            <div style="margin-bottom: 1.25rem;">
                <label style="display: block; font-size: 0.82rem; font-weight: 700; color: #cbd5e1; margin-bottom: 6px; text-transform: uppercase; letter-spacing: 0.05em;">
                    Correo Electrónico
                </label>
                <input type="email" name="email" value="{{ old('email', 'alvaro@rew.cl') }}" required autofocus class="login-input" placeholder="alvaro@rew.cl">
            </div>

            <div style="margin-bottom: 1.25rem;">
                <label style="display: block; font-size: 0.82rem; font-weight: 700; color: #cbd5e1; margin-bottom: 6px; text-transform: uppercase; letter-spacing: 0.05em;">
                    Contraseña
                </label>
                <input type="password" name="password" required class="login-input" placeholder="••••••••">
            </div>

            <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 1.5rem;">
                <label style="display: flex; align-items: center; gap: 8px; font-size: 0.82rem; color: #94a3b8; cursor: pointer;">
                    <input type="checkbox" name="remember" value="1" checked style="accent-color: #4f46e5; width: 16px; height: 16px;">
                    Recordar mi sesión
                </label>
            </div>

            <button type="submit" class="login-btn">
                <span>🔒 Iniciar Sesión en REW →</span>
            </button>
        </form>

        <div style="text-align: center; margin-top: 1.75rem; border-top: 1px solid rgba(255,255,255,0.08); padding-top: 1.25rem;">
            <a href="{{ route('home') }}" style="color: #94a3b8; font-size: 0.82rem; text-decoration: none; transition: color 0.2s ease;">
                ← Volver al Sitio Web Principal
            </a>
        </div>
    </div>
</body>
</html>
