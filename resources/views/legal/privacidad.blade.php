@extends('layouts.app')

@section('title', 'Política de Privacidad y Protección de Datos | REW Chile')
@section('meta_description', 'Conoce nuestra política de privacidad, uso de cookies y tratamiento de datos personales en REW.cl conforme a los más altos estándares de seguridad.')

@section('content')
<section class="section" style="background: linear-gradient(180deg, #ffffff 0%, var(--bg-main) 100%); padding-top: 5rem; padding-bottom: 4rem;">
    <div class="container" style="max-width: 900px;">
        <!-- Breadcrumb -->
        <div style="margin-bottom: 2rem; font-size: 0.88rem; color: var(--text-muted);">
            <a href="{{ route('home') }}">Inicio</a> &nbsp;/&nbsp;
            <span style="color: var(--text-dark); font-weight: 600;">Política de Privacidad</span>
        </div>

        <div style="margin-bottom: 3rem;">
            <span class="badge badge-primary" style="margin-bottom: 0.75rem;">Transparencia & Seguridad</span>
            <h1 style="font-size: 3rem; margin-bottom: 1rem; color: var(--text-dark);">Política de Privacidad</h1>
            <p style="font-size: 1.1rem; color: var(--text-muted);">Última actualización: Agosto de 2026</p>
        </div>

        <div class="card" style="padding: 2.5rem; line-height: 1.8; color: var(--text-body); font-size: 1rem;">
            <h2 style="font-size: 1.4rem; color: var(--text-dark); margin-bottom: 0.75rem;">1. Responsable del Tratamiento de Datos</h2>
            <p style="margin-bottom: 1.5rem;">
                El responsable del tratamiento de los datos recabados en este sitio web es <strong>REW SpA</strong>, representada legalmente por <strong>Álvaro Valenzuela Valdés</strong> (Ingeniero Informático), con domicilio en Providencia, Santiago de Chile, y correo de contacto <a href="mailto:alvaro@rew.cl" style="color: var(--primary); font-weight: 600;">alvaro@rew.cl</a>.
            </p>

            <h2 style="font-size: 1.4rem; color: var(--text-dark); margin-bottom: 0.75rem;">2. Información que Recopilamos</h2>
            <p style="margin-bottom: 1.5rem;">
                Recopilamos únicamente la información necesaria para prestar nuestros servicios de desarrollo de software, licenciamiento de plugins WordPress y consultoría:
            </p>
            <ul style="margin-bottom: 1.5rem; padding-left: 1.5rem;">
                <li><strong>Datos de Contacto y Cotización:</strong> Nombre completo, correo electrónico, número telefónico/WhatsApp y nombre de empresa ingresados voluntariamente en nuestros formularios.</li>
                <li><strong>Datos de Transacción:</strong> Al adquirir licencias o plugins, procesamos la orden a través de pasarelas de pago seguras y encriptadas (Webpay Plus, Mercado Pago, Stripe). <em>REW nunca almacena números completos de tarjetas de crédito o débito.</em></li>
                <li><strong>Datos de Navegación:</strong> Dirección IP anonimizada, tipo de navegador y métricas de rendimiento para optimizar la velocidad del sitio web.</li>
            </ul>

            <h2 style="font-size: 1.4rem; color: var(--text-dark); margin-bottom: 0.75rem;">3. Finalidad del Tratamiento</h2>
            <p style="margin-bottom: 1.5rem;">
                Tus datos son utilizados exclusivamente para:
            </p>
            <ul style="margin-bottom: 1.5rem; padding-left: 1.5rem;">
                <li>Responder a tus solicitudes de cotización técnica y auditorías de rendimiento.</li>
                <li>Emitir y validar las claves de licencia anuales o vitalicias de nuestros plugins y asistentes de IA (Rich-E Chatbot).</li>
                <li>Garantizar soporte técnico y notificaciones críticas de seguridad.</li>
                <li>Cumplir con obligaciones tributarias y de facturación electrónica ante el Servicio de Impuestos Internos (SII) de Chile.</li>
            </ul>

            <h2 style="font-size: 1.4rem; color: var(--text-dark); margin-bottom: 0.75rem;">4. Confidencialidad y Cero Venta de Datos</h2>
            <p style="margin-bottom: 1.5rem;">
                En <strong>REW</strong> nos regimos por el principio de confidencialidad estricta. <strong>Nunca venderemos, alquilaremos ni transferiremos tus datos personales a terceros</strong> para fines publicitarios ajenos a nuestros servicios.
            </p>

            <h2 style="font-size: 1.4rem; color: var(--text-dark); margin-bottom: 0.75rem;">5. Uso de Cookies</h2>
            <p style="margin-bottom: 1.5rem;">
                Utilizamos cookies técnicas y analíticas esenciales para mantener tu sesión de compra activa, recordar tu preferencia de moneda (CLP / USD) y medir el rendimiento del sitio. Puedes configurar tu navegador para bloquear cookies en cualquier momento.
            </p>

            <h2 style="font-size: 1.4rem; color: var(--text-dark); margin-bottom: 0.75rem;">6. Derechos del Usuario (ARCO)</h2>
            <p style="margin-bottom: 1.5rem;">
                Tienes derecho a acceder, rectificar, cancelar u oponerte al tratamiento de tus datos personales en cualquier momento. Para ejercer estos derechos, simplemente envía un correo a <a href="mailto:alvaro@rew.cl" style="color: var(--primary); font-weight: 600;">alvaro@rew.cl</a>.
            </p>
        </div>
    </div>
</section>
@endsection
