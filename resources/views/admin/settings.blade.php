@extends('admin.layout')

@section('title', 'Configuración & Feed de Instagram | REW CRM')

@section('content')
<div style="max-width: 1040px; margin: 0 auto;">
    <!-- Page Header -->
    <div class="crm-header">
        <div>
            <h1 class="crm-title">Configuración del Sistema & Integraciones</h1>
            <p class="crm-subtitle">
                Administra los canales de notificación, servidor SMTP y gestiona los 6 posts del feed de Instagram.
            </p>
        </div>
    </div>

    <!-- Formulario Principal -->
    <form action="{{ route('admin.settings.update') }}" method="POST">
        @csrf

        <!-- 1. Gestor de Feed de Instagram (100% Free / Cero Tokens) -->
        <div class="crm-card-panel" style="margin-bottom: 2rem;">
            <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 1.25rem; flex-wrap: wrap; gap: 0.75rem;">
                <div>
                    <h3 style="font-size: 1.2rem; font-weight: 800; color: #0f172a; margin: 0; display: flex; align-items: center; gap: 8px;">
                        📸 Feed de Instagram en Vivo (@rew_chile)
                    </h3>
                    <p style="font-size: 0.85rem; color: var(--crm-text-muted); margin: 4px 0 0 0;">
                        Personaliza los 6 posts que aparecen en el Home. Se cargan al instante sin necesidad de tokens que expiren.
                    </p>
                </div>
                <span style="font-size: 0.75rem; background: #ecfdf5; color: #065f46; font-weight: 800; padding: 4px 10px; border-radius: 9999px; border: 1px solid #a7f3d0;">
                    ✓ Modo Gratuito Activo (Cero Tokens)
                </span>
            </div>

            <!-- Posts Grid Manager -->
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 1.25rem; margin-bottom: 1.5rem;">
                @foreach($customPosts as $index => $post)
                    <div style="background: #f8fafc; border: 1px solid var(--crm-border); border-radius: 14px; padding: 1.25rem; position: relative;">
                        <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 0.85rem;">
                            <img src="{{ $post['image'] ?? '/images/logo.webp' }}" 
                                 alt="Preview" 
                                 id="preview_img_{{ $index }}" 
                                 style="width: 54px; height: 54px; border-radius: 10px; object-fit: cover; border: 1px solid #cbd5e1; flex-shrink: 0; background: #ffffff;">
                            
                            <div style="flex: 1;">
                                <span style="font-size: 0.75rem; font-weight: 800; text-transform: uppercase; color: var(--crm-primary);">Post #{{ $index + 1 }}</span>
                                <input type="hidden" name="ig_posts[{{ $index }}][id]" value="{{ $post['id'] ?? 'ig_'.$index }}">
                                <input type="text" 
                                       name="ig_posts[{{ $index }}][image]" 
                                       value="{{ $post['image'] ?? '' }}" 
                                       placeholder="URL de imagen (JPG, PNG, WebP)" 
                                       class="crm-form-control" 
                                       style="padding: 0.4rem 0.65rem; font-size: 0.78rem;" 
                                       oninput="document.getElementById('preview_img_{{ $index }}').src = this.value">
                            </div>
                        </div>

                        <div class="crm-form-group" style="margin-bottom: 0.75rem;">
                            <label style="font-size: 0.78rem; font-weight: 700; color: #475569; margin-bottom: 4px; display: block;">Pie de foto / Caption</label>
                            <textarea name="ig_posts[{{ $index }}][caption]" rows="2" class="crm-form-control" style="font-size: 0.82rem; line-height: 1.4; padding: 0.5rem 0.75rem;">{{ $post['caption'] ?? '' }}</textarea>
                        </div>

                        <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 8px;">
                            <div>
                                <label style="font-size: 0.75rem; font-weight: 700; color: #475569; margin-bottom: 3px; display: block;">Link a Instagram</label>
                                <input type="url" name="ig_posts[{{ $index }}][permalink]" value="{{ $post['permalink'] ?? 'https://www.instagram.com/rew_chile/' }}" class="crm-form-control" style="font-size: 0.78rem; padding: 0.4rem 0.6rem;">
                            </div>
                            <div>
                                <label style="font-size: 0.75rem; font-weight: 700; color: #475569; margin-bottom: 3px; display: block;">Likes ❤️</label>
                                <input type="number" name="ig_posts[{{ $index }}][likes]" value="{{ $post['likes'] ?? 95 }}" class="crm-form-control" style="font-size: 0.78rem; padding: 0.4rem 0.6rem;">
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Opcional: Meta Token Si Desea Sincronización Automática de API -->
            <details style="background: #ffffff; border: 1px solid var(--crm-border); border-radius: 12px; padding: 0.85rem 1.25rem;">
                <summary style="font-size: 0.85rem; font-weight: 700; color: #475569; cursor: pointer;">
                    ⚙️ Opciones avanzadas: Conectar con Meta Graph API Token (Opcional)
                </summary>
                <div style="display: grid; grid-template-columns: 1fr 2fr; gap: 1.25rem; margin-top: 1rem;">
                    <div>
                        <label class="crm-form-label" style="font-size: 0.8rem;">Usuario Instagram</label>
                        <input type="text" name="instagram_username" value="{{ old('instagram_username', $settings['instagram_username']) }}" placeholder="rew_chile" class="crm-form-control">
                    </div>
                    <div>
                        <label class="crm-form-label" style="font-size: 0.8rem;">Access Token Meta (Graph API)</label>
                        <input type="password" name="instagram_access_token" value="{{ old('instagram_access_token', $settings['instagram_access_token']) }}" placeholder="IGQJ..." class="crm-form-control">
                    </div>
                </div>
            </details>
        </div>

        <!-- 2. Canales de Notificaciones de Leads -->
        <div class="crm-card-panel" style="margin-bottom: 2rem;">
            <h3 style="font-size: 1.15rem; font-weight: 800; color: #0f172a; margin: 0 0 1.25rem 0; display: flex; align-items: center; gap: 8px;">
                📬 Canales de Recepción de Notificaciones
            </h3>

            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 1.5rem;">
                <div class="crm-form-group">
                    <label class="crm-form-label">📧 Correo de Recepción de Cotizaciones & Auditorías *</label>
                    <input type="email" name="notification_email" value="{{ old('notification_email', $settings['notification_email']) }}" required class="crm-form-control">
                    <span class="crm-form-help">Aquí llegarán los correos con los datos del cliente y los scores de PageSpeed.</span>
                </div>

                <div class="crm-form-group">
                    <label class="crm-form-label">📱 Número de WhatsApp para Notificaciones *</label>
                    <input type="text" name="notification_whatsapp" value="{{ old('notification_whatsapp', $settings['notification_whatsapp']) }}" required class="crm-form-control">
                    <span class="crm-form-help">Ej: +56987261127. Número al que los clientes envían el mensaje prellenado.</span>
                </div>
            </div>
        </div>

        <!-- 3. Parámetros Servidor SMTP -->
        <div class="crm-card-panel" style="margin-bottom: 2rem;">
            <h3 style="font-size: 1.15rem; font-weight: 800; color: #0f172a; margin: 0 0 1.25rem 0; display: flex; align-items: center; gap: 8px;">
                ⚡ Parámetros del Servidor SMTP (Correo Saliente)
            </h3>

            <div style="display: grid; grid-template-columns: 2fr 1fr 1fr; gap: 1.25rem; margin-bottom: 1.25rem;">
                <div class="crm-form-group">
                    <label class="crm-form-label">Host SMTP *</label>
                    <input type="text" name="smtp_host" value="{{ old('smtp_host', $settings['smtp_host']) }}" required placeholder="mail.rew.cl / smtp.gmail.com" class="crm-form-control">
                </div>

                <div class="crm-form-group">
                    <label class="crm-form-label">Puerto *</label>
                    <input type="number" name="smtp_port" value="{{ old('smtp_port', $settings['smtp_port']) }}" required placeholder="465 / 587" class="crm-form-control">
                </div>

                <div class="crm-form-group">
                    <label class="crm-form-label">Cifrado</label>
                    <select name="smtp_encryption" class="crm-form-control">
                        <option value="tls" {{ $settings['smtp_encryption'] === 'tls' ? 'selected' : '' }}>TLS</option>
                        <option value="ssl" {{ $settings['smtp_encryption'] === 'ssl' ? 'selected' : '' }}>SSL</option>
                        <option value="" {{ empty($settings['smtp_encryption']) ? 'selected' : '' }}>Ninguno</option>
                    </select>
                </div>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.25rem; margin-bottom: 1.25rem;">
                <div class="crm-form-group">
                    <label class="crm-form-label">Usuario SMTP</label>
                    <input type="text" name="smtp_username" value="{{ old('smtp_username', $settings['smtp_username']) }}" placeholder="alvaro@rew.cl" class="crm-form-control">
                </div>

                <div class="crm-form-group">
                    <label class="crm-form-label">Contraseña SMTP</label>
                    <input type="password" name="smtp_password" value="{{ old('smtp_password', $settings['smtp_password']) }}" placeholder="••••••••" class="crm-form-control">
                </div>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.25rem; margin-bottom: 1.5rem;">
                <div class="crm-form-group">
                    <label class="crm-form-label">Correo Remitente (From Address) *</label>
                    <input type="email" name="mail_from_address" value="{{ old('mail_from_address', $settings['mail_from_address']) }}" required class="crm-form-control">
                </div>

                <div class="crm-form-group">
                    <label class="crm-form-label">Nombre Remitente (From Name) *</label>
                    <input type="text" name="mail_from_name" value="{{ old('mail_from_name', $settings['mail_from_name']) }}" required class="crm-form-control">
                </div>
            </div>

            <div style="text-align: right;">
                <button type="submit" class="crm-btn crm-btn-primary" style="padding: 0.75rem 1.75rem; font-size: 0.95rem;">
                    <span>💾</span> Guardar Toda la Configuración & Feed
                </button>
            </div>
        </div>
    </form>

    <!-- 4. Herramienta de Prueba SMTP -->
    <div style="background: #ffffff; border: 1px solid var(--crm-border); border-radius: 16px; padding: 1.5rem 1.75rem; box-shadow: var(--shadow-subtle); display: flex; flex-wrap: wrap; align-items: center; justify-content: space-between; gap: 1.5rem; margin-bottom: 2rem;">
        <div>
            <h4 style="margin: 0 0 4px 0; font-size: 1.05rem; font-weight: 800; color: #0f172a;">
                🧪 Probar Conexión SMTP en Vivo
            </h4>
            <p style="margin: 0; font-size: 0.85rem; color: var(--crm-text-muted);">
                Envía un correo de prueba instantáneo para comprobar que tu servidor está autenticando correctamente.
            </p>
        </div>

        <form action="{{ route('admin.settings.test-smtp') }}" method="POST" style="display: flex; gap: 8px; flex-wrap: wrap; align-items: center;">
            @csrf
            <input type="email" name="test_email" value="{{ $settings['notification_email'] }}" required placeholder="Destinatario" 
                   class="crm-form-control" style="width: 240px; padding: 0.6rem 0.85rem;">
            <button type="submit" class="crm-btn crm-btn-secondary">
                <span>🚀</span> Probar SMTP
            </button>
        </form>
    </div>
</div>
@endsection
