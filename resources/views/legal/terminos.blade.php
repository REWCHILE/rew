@extends('layouts.app')

@section('title', 'Términos y Condiciones del Servicio | REW Chile')
@section('meta_description', 'Consulta los términos y condiciones de uso, contratación de servicios de desarrollo y licenciamiento de software y plugins en REW.cl.')

@section('content')
<section class="section" style="background: linear-gradient(180deg, #ffffff 0%, var(--bg-main) 100%); padding-top: 5rem; padding-bottom: 4rem;">
    <div class="container" style="max-width: 900px;">
        <!-- Breadcrumb -->
        <div style="margin-bottom: 2rem; font-size: 0.88rem; color: var(--text-muted);">
            <a href="{{ route('home') }}">Inicio</a> &nbsp;/&nbsp;
            <span style="color: var(--text-dark); font-weight: 600;">Términos y Condiciones</span>
        </div>

        <div style="margin-bottom: 3rem;">
            <span class="badge badge-primary" style="margin-bottom: 0.75rem;">Condiciones Generales</span>
            <h1 style="font-size: 3rem; margin-bottom: 1rem; color: var(--text-dark);">Términos y Condiciones</h1>
            <p style="font-size: 1.1rem; color: var(--text-muted);">Última actualización: Agosto de 2026</p>
        </div>

        <div class="card" style="padding: 2.5rem; line-height: 1.8; color: var(--text-body); font-size: 1rem;">
            <h2 style="font-size: 1.4rem; color: var(--text-dark); margin-bottom: 0.75rem;">1. Aceptación de los Términos</h2>
            <p style="margin-bottom: 1.5rem;">
                Al acceder y utilizar el sitio web <strong>REW.cl</strong>, contratar cualquiera de nuestros servicios de desarrollo de software o adquirir licencias de plugins, aceptas cumplir y quedar vinculado por estos Términos y Condiciones.
            </p>

            <h2 style="font-size: 1.4rem; color: var(--text-dark); margin-bottom: 0.75rem;">2. Servicios Profesionales de Desarrollo</h2>
            <p style="margin-bottom: 1.5rem;">
                Los proyectos de desarrollo web, software a medida, integraciones de API (Bsale, Odoo) y optimización SEO se rigen bajo propuestas comerciales formalizadas. Cada proyecto cuenta con un alcance definido, cronograma de entregas e hitos de pago acordados previamente.
            </p>

            <h2 style="font-size: 1.4rem; color: var(--text-dark); margin-bottom: 0.75rem;">3. Licenciamiento de Plugins & Chatbots (Rich-E)</h2>
            <p style="margin-bottom: 1.5rem;">
                La adquisición de plugins otorga una licencia de uso (anual o de por vida según el paquete seleccionado). Las licencias incluyen:
            </p>
            <ul style="margin-bottom: 1.5rem; padding-left: 1.5rem;">
                <li>Acceso a actualizaciones automáticas de seguridad y nuevas funcionalidades durante la vigencia de la licencia.</li>
                <li>Soporte técnico prioritario brindado por el equipo de ingeniería de REW.</li>
                <li>Prohibición estricta de redistribución no autorizada o ingeniería inversa no permitida.</li>
            </ul>

            <h2 style="font-size: 1.4rem; color: var(--text-dark); margin-bottom: 0.75rem;">4. Política de Pagos y Monedas</h2>
            <p style="margin-bottom: 1.5rem;">
                Los precios están expresados en Pesos Chilenos (CLP) y Dólares Americanos (USD). En transacciones nacionales en Chile, se emiten Boletas o Facturas Electrónicas DTE válidas ante el Servicio de Impuestos Internos (SII).
            </p>

            <h2 style="font-size: 1.4rem; color: var(--text-dark); margin-bottom: 0.75rem;">5. Garantía de Soporte y Continuidad</h2>
            <p style="margin-bottom: 1.5rem;">
                REW garantiza que todas las líneas de código desarrolladas siguen los estándares oficiales de Laravel, PHP 8 y WordPress. Brindamos garantía de corrección ante cualquier bug imputable a la construcción del software durante el período de garantía pactado.
            </p>

            <h2 style="font-size: 1.4rem; color: var(--text-dark); margin-bottom: 0.75rem;">6. Jurisdicción y Ley Aplicable</h2>
            <p style="margin-bottom: 1.5rem;">
                Estos términos se rigen e interpretan de acuerdo con las leyes de la República de Chile. Para cualquier controversia, las partes se someten a la competencia de los tribunales de la ciudad de Santiago de Chile.
            </p>
        </div>
    </div>
</section>
@endsection
