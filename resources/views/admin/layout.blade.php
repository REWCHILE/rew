<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Panel de Administración | REW CRM')</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@500;600;700;800;900&family=Plus+Jakarta+Sans:wght@400;500;600;700;800;900&family=Fira+Code:wght@400;600&display=swap" rel="stylesheet">
    
    <!-- Admin & Core Styles -->
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('images/logo.webp') }}" type="image/webp">

    @yield('styles')
</head>
<body>

    <!-- Sticky Top Navigation Bar -->
    <header class="admin-navbar">
        <div class="admin-nav-inner">
            <div style="display: flex; align-items: center; gap: 2rem;">
                <a href="{{ route('admin.leads.index') }}" class="admin-brand">
                    <img src="{{ asset('images/logo.webp') }}" alt="REW">
                    <span class="admin-brand-title">
                        REW <span class="admin-brand-tag">CRM</span>
                    </span>
                </a>
                
                <nav class="admin-nav-menu">
                    <a href="{{ route('admin.leads.index') }}" class="admin-nav-link {{ request()->routeIs('admin.leads.*') ? 'active' : '' }}">
                        <span>📊</span> Leads & Cotizaciones
                    </a>
                    <a href="{{ route('admin.riche.index') }}" class="admin-nav-link {{ request()->routeIs('admin.riche.*') ? 'active' : '' }}">
                        <span>🤖</span> Asistente Rich-E
                    </a>
                    <a href="{{ route('admin.settings.index') }}" class="admin-nav-link {{ request()->routeIs('admin.settings.*') ? 'active' : '' }}">
                        <span>⚙️</span> Notificaciones & SMTP
                    </a>
                    <a href="{{ route('admin.profile.index') }}" class="admin-nav-link {{ request()->routeIs('admin.profile.*') ? 'active' : '' }}">
                        <span>👤</span> Mi Perfil
                    </a>
                </nav>
            </div>

            <div class="admin-nav-right">
                @auth
                    <div class="admin-user-chip">
                        <div class="admin-user-avatar">
                            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                        </div>
                        <span>{{ auth()->user()->name }}</span>
                    </div>
                @endauth

                <a href="{{ route('home') }}" target="_blank" class="btn-nav-public" title="Ver Sitio Web Público en nueva pestaña">
                    <span>🌐</span> Sitio Público ↗
                </a>

                <form action="{{ route('logout') }}" method="POST" style="margin: 0;">
                    @csrf
                    <button type="submit" class="btn-nav-logout" title="Cerrar Sesión Segura">
                        <span>🚪</span> Salir
                    </button>
                </form>
            </div>
        </div>
    </header>

    <!-- Main Content Area -->
    <main class="crm-layout">
        @if(session('success'))
            <div class="crm-alert crm-alert-success">
                <span style="font-size: 1.25rem;">✅</span>
                <div>{{ session('success') }}</div>
            </div>
        @endif

        @if(session('error'))
            <div class="crm-alert crm-alert-error">
                <span style="font-size: 1.25rem;">⚠️</span>
                <div>{{ session('error') }}</div>
            </div>
        @endif

        @if($errors->any())
            <div class="crm-alert crm-alert-error">
                <span style="font-size: 1.25rem;">⚠️</span>
                <div>{{ $errors->first() }}</div>
            </div>
        @endif

        @yield('content')
    </main>

    @yield('scripts')
</body>
</html>
