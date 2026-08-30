@extends('admin.layout')

@section('title', 'Mi Perfil | REW CRM')

@section('content')
<div style="max-width: 780px; margin: 0 auto;">
    <!-- Page Header -->
    <div class="crm-header">
        <div>
            <h1 class="crm-title">Mi Perfil de Administrador</h1>
            <p class="crm-subtitle">
                Administra tus credenciales de acceso, nombre de visualización y seguridad de la cuenta.
            </p>
        </div>
    </div>

    <div class="crm-card-panel">
        <form action="{{ route('admin.profile.update') }}" method="POST">
            @csrf
            @method('PUT')

            <h3 style="font-size: 1.15rem; font-weight: 800; color: #0f172a; margin: 0 0 1.25rem 0; display: flex; align-items: center; gap: 8px;">
                👤 Información de la Cuenta
            </h3>

            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap: 1.5rem; margin-bottom: 2rem;">
                <div class="crm-form-group">
                    <label class="crm-form-label">Nombre Completo *</label>
                    <input type="text" name="name" value="{{ old('name', $user->name) }}" required class="crm-form-control">
                </div>

                <div class="crm-form-group">
                    <label class="crm-form-label">Correo Electrónico (Login) *</label>
                    <input type="email" name="email" value="{{ old('email', $user->email) }}" required class="crm-form-control">
                </div>
            </div>

            <hr style="border: 0; border-top: 1px solid var(--crm-border); margin: 2rem 0;">

            <h3 style="font-size: 1.15rem; font-weight: 800; color: #0f172a; margin: 0 0 0.5rem 0; display: flex; align-items: center; gap: 8px;">
                🔒 Actualizar Contraseña
            </h3>
            <p style="font-size: 0.85rem; color: var(--crm-text-muted); margin-bottom: 1.5rem;">
                Deja estos campos en blanco si no deseas modificar tu contraseña actual.
            </p>

            <div class="crm-form-group">
                <label class="crm-form-label">Contraseña Actual</label>
                <input type="password" name="current_password" placeholder="••••••••" class="crm-form-control">
            </div>

            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap: 1.5rem; margin-bottom: 2rem;">
                <div class="crm-form-group">
                    <label class="crm-form-label">Nueva Contraseña (mínimo 8 caracteres)</label>
                    <input type="password" name="password" placeholder="••••••••" class="crm-form-control">
                </div>

                <div class="crm-form-group">
                    <label class="crm-form-label">Confirmar Nueva Contraseña</label>
                    <input type="password" name="password_confirmation" placeholder="••••••••" class="crm-form-control">
                </div>
            </div>

            <div style="text-align: right;">
                <button type="submit" class="crm-btn crm-btn-primary">
                    <span>💾</span> Guardar Cambios de Perfil
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
