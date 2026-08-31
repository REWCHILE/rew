@extends('layouts.app')

@section('title', 'Términos y Condiciones del Servicio & Políticas de Alojamiento | REW Chile')
@section('meta_description', 'Consulta los términos y condiciones de uso, políticas estrictas de alojamiento web ético, alcance de cotizaciones y licenciamiento de software en REW.cl.')

@section('og_title', 'Términos y Condiciones del Servicio | REW Chile')
@section('og_description', 'Términos de servicio, políticas de alojamiento ético y licenciamiento de software en REW Chile.')
@section('og_image', asset('images/rew_og_card.png'))

@section('content')
<section class="section" style="background: linear-gradient(180deg, #ffffff 0%, var(--bg-main) 100%); padding-top: 5rem; padding-bottom: 5rem;">
    <div class="container" style="max-width: 960px;">
        <!-- Breadcrumb -->
        <div style="margin-bottom: 2rem; font-size: 0.88rem; color: var(--text-muted);">
            <a href="{{ route('home') }}">Inicio</a> &nbsp;/&nbsp;
            <span style="color: var(--text-dark); font-weight: 600;">Términos y Condiciones</span>
        </div>

        <!-- Header -->
        <div style="margin-bottom: 3rem;">
            <div class="badge badge-primary" style="margin-bottom: 0.75rem;">
                ⚖️ MARCO LEGAL & CONDICIONES CONTRACTUALES
            </div>
            <h1 style="font-size: 2.8rem; margin-bottom: 0.75rem; color: var(--text-dark); font-weight: 900; letter-spacing: -0.02em;">
                Términos y Condiciones de Servicio
            </h1>
            <p style="font-size: 1.1rem; color: var(--text-muted);">
                Políticas de Alojamiento, Desarrollo Ético de Software, Alcance de Cotizaciones y Servicios Digitales de REW SpA / Álvaro Valenzuela Valdés.
            </p>
            <div style="font-size: 0.85rem; color: var(--text-muted); margin-top: 0.5rem;">
                Última actualización y entrada en vigencia: <strong>Agosto de 2026</strong>
            </div>
        </div>

        <!-- Terms Card -->
        <div class="card" style="padding: 3rem 2.5rem; line-height: 1.8; color: var(--text-body); font-size: 1rem; border-radius: 24px; box-shadow: var(--shadow-md);">
            
            <!-- Clause 1 -->
            <div style="margin-bottom: 2.25rem;">
                <h2 style="font-size: 1.35rem; color: var(--text-dark); margin-bottom: 0.75rem; font-weight: 800; display: flex; align-items: center; gap: 8px;">
                    <span>1.</span> Aceptación Vinculante y Perfeccionamiento del Contrato
                </h2>
                <p style="margin-bottom: 0.75rem;">
                    Al acceder, navegar o utilizar la plataforma <strong>REW.cl</strong>, así como al contratar cualquiera de nuestros servicios de desarrollo de software, diseño web, marketing digital, o al adquirir licencias de plugins e inteligencia artificial, el cliente acepta expresamente quedar sujeto a los presentes Términos y Condiciones.
                </p>
                <p style="background: #f8fafc; border-left: 4px solid var(--primary); padding: 12px 16px; border-radius: 0 8px 8px 0; font-size: 0.94rem; color: #334155;">
                    <strong>Perfeccionamiento Contractual:</strong> Se entenderá formal y plenamente aceptada la propuesta comercial o cotización emitida por REW en el <strong>momento exacto en que el cliente realiza el abono, depósito o pago inicial</strong> solicitado. Dicho pago constituye la manifestación inequívoca de conformidad con el alcance, plazos y condiciones aquí descritas.
                </p>
            </div>

            <hr style="border: 0; border-top: 1px solid var(--border-light); margin: 2rem 0;">

            <!-- Clause 2 -->
            <div style="margin-bottom: 2.25rem;">
                <h2 style="font-size: 1.35rem; color: var(--text-dark); margin-bottom: 0.75rem; font-weight: 800; display: flex; align-items: center; gap: 8px;">
                    <span>2.</span> Política Estricta de Alojamiento (Hosting) y Cero Tolerancia a Actividades Ilícitas
                </h2>
                <p style="margin-bottom: 0.75rem;">
                    REW provee infraestructura y administración de servidores VPS de alto rendimiento bajo un <strong>estricto estándar ético y de cumplimiento legal</strong>. Queda terminantemente prohibido alojar, transmitir, distribuir o almacenar en los servidores administrados por REW cualquier material, sitio web o plataforma de carácter ilícito.
                </p>
                <p style="margin-bottom: 0.5rem; font-weight: 700; color: #1e293b;">
                    Queda expresamente prohibido el alojamiento de:
                </p>
                <ul style="margin-bottom: 1rem; padding-left: 1.5rem;">
                    <li>Sitios web, tiendas o plataformas destinadas a la venta de productos falsificados, estafas, esquemas piramidales o fraudulentos.</li>
                    <li>Material que infrinja derechos de autor, marcas registradas o propiedad intelectual de terceros.</li>
                    <li>Pornografía infantil, explotación de menores o contenidos que atenten contra la integridad física o moral de las personas.</li>
                    <li>Sustancias ilícitas, fármacos sin prescripción médica legal o armas de fuego.</li>
                    <li>Distribución de malware, ransomware, virus, scripts de phishing o plataformas de botnets / spam masivo.</li>
                    <li>Cualquier contenido que contravenga las leyes de la República de Chile (incluida la Ley N° 21.459 sobre Delitos Informáticos) o convenios internacionales.</li>
                </ul>
                <div style="background: #fef2f2; border: 1px solid #fecaca; border-left: 4px solid #ef4444; padding: 14px 18px; border-radius: 8px; font-size: 0.92rem; color: #991b1b;">
                    <strong>Facultad de Suspensión Inmediata:</strong> REW se reserva el derecho absoluto de suspender, desactivar y dar de baja de forma inmediata e irrevocable cualquier servicio o sitio web que vulnere esta política, <strong>sin derecho a reembolso alguno</strong>, reservándose además el ejercicio de las acciones penales y denuncias pertinentes ante el Ministerio Público, Fiscalía y Policía de Investigaciones de Chile (PDI).
                </div>
            </div>

            <hr style="border: 0; border-top: 1px solid var(--border-light); margin: 2rem 0;">

            <!-- Clause 3 -->
            <div style="margin-bottom: 2.25rem;">
                <h2 style="font-size: 1.35rem; color: var(--text-dark); margin-bottom: 0.75rem; font-weight: 800; display: flex; align-items: center; gap: 8px;">
                    <span>3.</span> Compromiso de Desarrollo Ético y Prohibición de Sistemas Maliciosos
                </h2>
                <p style="margin-bottom: 1rem;">
                    REW es un estudio de ingeniería de software comprometido con las mejores prácticas tecnológicas. <strong>No desarrollamos, mantenemos ni modificamos sistemas con propósitos ilícitos</strong>, tales como plataformas de evasión fiscal, herramientas de hacking no ético, clonación no autorizada de sistemas, extracción ilegal de datos privados (scraping abusivo) o suplantación de identidad.
                </p>
                <p>
                    Cualquier requerimiento que a juicio exclusivo del equipo de ingeniería de REW represente un riesgo legal o vulneración ética será rechazado sin lugar a indemnización.
                </p>
            </div>

            <hr style="border: 0; border-top: 1px solid var(--border-light); margin: 2rem 0;">

            <!-- Clause 4 -->
            <div style="margin-bottom: 2.25rem;">
                <h2 style="font-size: 1.35rem; color: var(--text-dark); margin-bottom: 0.75rem; font-weight: 800; display: flex; align-items: center; gap: 8px;">
                    <span>4.</span> Alcance Estricto de Cotizaciones y Cobro de Modificaciones Estructurales
                </h2>
                <p style="margin-bottom: 0.75rem;">
                    Cada proyecto de desarrollo, diseño o marketing digital se ejecuta **exclusiva y taxativamente sobre los ítems, funcionalidades y entregables especificados en la cotización o propuesta comercial aprobada**.
                </p>
                <div style="background: #eff6ff; border-left: 4px solid #3b82f6; padding: 14px 18px; border-radius: 0 8px 8px 0; margin-bottom: 1rem; font-size: 0.94rem; color: #1e3a8a;">
                    <strong>Regla de Cambios Estructurales Fuera de Alcance:</strong> Todo cambio, adición o modificación que exceda lo cotizado y acordado formalmente será valorizado y cobrado por separado como trabajo extraordinario u horas adicionales de ingeniería antes de su ejecución.
                </div>
                <p style="margin-bottom: 0.5rem; font-weight: 700; color: #1e293b;">
                    Esta política aplica a todos los ámbitos del servicio:
                </p>
                <ul style="margin-bottom: 1rem; padding-left: 1.5rem;">
                    <li><strong>Desarrollo de Software & Laravel:</strong> Creación de nuevos módulos, cambios en la arquitectura de base de datos, integraciones adicionales de APIs no pactadas o rediseño de flujos lógicos previamente aprobados.</li>
                    <li><strong>Diseño Web & WordPress:</strong> Reestructuraciones visuales globales fuera de las rondas de revisión pactadas o incorporación de secciones y landings no presupuestadas.</li>
                    <li><strong>Contenido para Redes Sociales & Instagram:</strong> Elaboración de piezas gráficas, copys, reels o creatividades que sobrepasen el número mensual contratado.</li>
                    <li><strong>Publicidad Digital (Google Ads & Facebook/Meta Ads):</strong> Creación de campañas adicionales, reestructuraciones totales de cuentas o administración de nuevas plataformas no consideradas en el fee de gestión mensual.</li>
                </ul>
                <p style="font-size: 0.92rem; color: var(--text-muted);">
                    REW se reserva el derecho de no iniciar la ejecución de requerimientos anexos hasta que el anexo de cotización correspondiente cuente con la aprobación y pago pactado por parte del cliente.
                </p>
            </div>

            <hr style="border: 0; border-top: 1px solid var(--border-light); margin: 2rem 0;">

            <!-- Clause 5 -->
            <div style="margin-bottom: 2.25rem;">
                <h2 style="font-size: 1.35rem; color: var(--text-dark); margin-bottom: 0.75rem; font-weight: 800; display: flex; align-items: center; gap: 8px;">
                    <span>5.</span> Licenciamiento de Software & Plugins (Ecosistema Rich-E & REW)
                </h2>
                <p style="margin-bottom: 0.75rem;">
                    La compra de plugins de WordPress y asistentes de IA en la tienda otorga una licencia de uso legítimo según el paquete adquirido (Anual o Lifetime). Las licencias incluyen:
                </p>
                <ul style="margin-bottom: 1rem; padding-left: 1.5rem;">
                    <li>Derecho a actualizaciones automáticas de seguridad y nuevas versiones durante el período de vigencia de la licencia.</li>
                    <li>Acceso al canal de soporte técnico oficial de REW.</li>
                    <li>Prohibición estricta de redistribución no autorizada, reventa, decompilación o ingeniería inversa de los algoritmos propietarios.</li>
                </ul>
            </div>

            <hr style="border: 0; border-top: 1px solid var(--border-light); margin: 2rem 0;">

            <!-- Clause 6 -->
            <div style="margin-bottom: 2.25rem;">
                <h2 style="font-size: 1.35rem; color: var(--text-dark); margin-bottom: 0.75rem; font-weight: 800; display: flex; align-items: center; gap: 8px;">
                    <span>6.</span> Pagos, Facturación Electrónica y Monedas
                </h2>
                <p style="margin-bottom: 0.75rem;">
                    Los valores de servicios y productos se cotizan en Pesos Chilenos (CLP) para clientes en Chile y en Dólares Americanos (USD) para clientes internacionales.
                </p>
                <ul style="margin-bottom: 1rem; padding-left: 1.5rem;">
                    <li>En Chile, todas las transacciones son respaldadas mediante Factura Electrónica DTE o Boleta de Honorarios válida ante el Servicio de Impuestos Internos (SII).</li>
                    <li>Los pagos de desarrollo web y software a medida se estructuran bajo hitos (generalmente 50% de anticipo para iniciar y 50% contra entrega y puesta en marcha en producción).</li>
                    <li>El atraso en los pagos de cuotas o mantenciones mensuales facultará a REW para suspender temporalmente el acceso a los servicios hasta la regularización de los saldos pendientes.</li>
                </ul>
            </div>

            <hr style="border: 0; border-top: 1px solid var(--border-light); margin: 2rem 0;">

            <!-- Clause 7 -->
            <div style="margin-bottom: 2.25rem;">
                <h2 style="font-size: 1.35rem; color: var(--text-dark); margin-bottom: 0.75rem; font-weight: 800; display: flex; align-items: center; gap: 8px;">
                    <span>7.</span> Propiedad Intelectual y Confidencialidad
                </h2>
                <p style="margin-bottom: 0.75rem;">
                    Una vez completado el pago total de un desarrollo a medida, los derechos patrimoniales sobre el código fuente personalizado del cliente le serán transferidos en su totalidad. REW conservará la propiedad sobre sus librerías base, plugins propietarios, algoritmos de IA preexistentes y metodologías de ingeniería.
                </p>
                <p>
                    Ambas partes se comprometen a resguardar la confidencialidad de los datos comerciales, credenciales, bases de datos y secretos industriales compartidos durante la ejecución del proyecto.
                </p>
            </div>

            <hr style="border: 0; border-top: 1px solid var(--border-light); margin: 2rem 0;">

            <!-- Clause 8 -->
            <div>
                <h2 style="font-size: 1.35rem; color: var(--text-dark); margin-bottom: 0.75rem; font-weight: 800; display: flex; align-items: center; gap: 8px;">
                    <span>8.</span> Jurisdicción y Ley Aplicable
                </h2>
                <p style="margin-bottom: 1rem;">
                    Estos Términos y Condiciones se rigen e interpretan conforme a las leyes vigentes de la <strong>República de Chile</strong>. Para todos los efectos legales derivados de la interpretación o cumplimiento de estos acuerdos, las partes fijan su domicilio en la ciudad y comuna de <strong>Santiago de Chile</strong> y se someten a la jurisdicción de sus Tribunales Ordinarios de Justicia.
                </p>
                <div style="margin-top: 1.5rem; padding: 1.25rem; background: #f8fafc; border-radius: 12px; font-size: 0.9rem; color: var(--text-muted); display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 10px;">
                    <div>
                        <strong>¿Dudas legales o comerciales?</strong> Escríbenos directamente a <a href="mailto:alvaro@rew.cl" style="color: var(--primary); font-weight: 700;">alvaro@rew.cl</a>
                    </div>
                    <a href="{{ route('contacto') }}" class="btn btn-outline btn-sm">
                        <span>Canal de Contacto →</span>
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection
