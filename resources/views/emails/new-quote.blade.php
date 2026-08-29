<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nueva Cotización REW.cl</title>
    <style>
        body { font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif; background-color: #f1f5f9; color: #1e293b; margin: 0; padding: 20px; }
        .email-container { max-width: 650px; margin: 0 auto; background: #ffffff; border-radius: 16px; overflow: hidden; box-shadow: 0 10px 25px rgba(0,0,0,0.08); border: 1px solid #e2e8f0; }
        .email-header { background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%); padding: 30px; text-align: center; color: #ffffff; }
        .email-logo { font-size: 28px; font-weight: 900; color: #ffc800; letter-spacing: 2px; }
        .email-subtitle { font-size: 14px; color: #94a3b8; margin-top: 5px; }
        .email-body { padding: 30px; }
        .section-title { font-size: 16px; font-weight: 800; color: #0f172a; border-bottom: 2px solid #f1f5f9; padding-bottom: 8px; margin-top: 25px; margin-bottom: 15px; text-transform: uppercase; letter-spacing: 0.5px; }
        .info-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 15px; margin-bottom: 20px; }
        .info-item { background: #f8fafc; padding: 12px 16px; border-radius: 10px; border: 1px solid #e2e8f0; }
        .info-label { font-size: 11px; font-weight: 700; color: #64748b; text-transform: uppercase; margin-bottom: 4px; }
        .info-value { font-size: 14px; font-weight: 700; color: #0f172a; }
        .feature-card { background: #eef2ff; border-left: 4px solid #4f46e5; padding: 10px 14px; margin-bottom: 8px; border-radius: 0 8px 8px 0; font-size: 13px; color: #312e81; }
        .price-badge-box { background: linear-gradient(135deg, #ffc800 0%, #ff9e00 100%); color: #0f172a; padding: 16px 20px; border-radius: 12px; font-weight: 800; text-align: center; margin: 25px 0; font-size: 18px; }
        .btn-action { display: inline-block; background: #25d366; color: #ffffff; text-decoration: none; padding: 12px 24px; border-radius: 9999px; font-weight: 800; font-size: 14px; margin-right: 10px; margin-bottom: 10px; }
        .btn-email { display: inline-block; background: #4f46e5; color: #ffffff; text-decoration: none; padding: 12px 24px; border-radius: 9999px; font-weight: 800; font-size: 14px; }
        .email-footer { background: #f8fafc; padding: 20px; text-align: center; font-size: 12px; color: #64748b; border-top: 1px solid #e2e8f0; }
    </style>
</head>
<body>
    <div class="email-container">
        <!-- Header -->
        <div class="email-header">
            <div class="email-logo">REW CHILE</div>
            <div class="email-subtitle">🚀 Nueva Solicitud de Cotización Recibida</div>
        </div>

        <!-- Body -->
        <div class="email-body">
            <div class="section-title">👤 Datos del Cliente</div>
            <div class="info-grid">
                <div class="info-item">
                    <div class="info-label">Nombre Completo</div>
                    <div class="info-value">{{ $quote->name }}</div>
                </div>
                <div class="info-item">
                    <div class="info-label">Correo Electrónico</div>
                    <div class="info-value"><a href="mailto:{{ $quote->email }}" style="color: #4f46e5; text-decoration: none;">{{ $quote->email }}</a></div>
                </div>
                <div class="info-item">
                    <div class="info-label">Teléfono / WhatsApp</div>
                    <div class="info-value"><a href="tel:{{ $quote->phone }}" style="color: #0f172a; text-decoration: none;">{{ $quote->phone }}</a></div>
                </div>
                <div class="info-item">
                    <div class="info-label">Empresa / Marca</div>
                    <div class="info-value">{{ $quote->company ?? 'No especificada' }}</div>
                </div>
            </div>

            <div class="section-title">🛠️ Proyecto Solicitado</div>
            <div class="info-item" style="margin-bottom: 15px;">
                <div class="info-label">Tipo de Proyecto</div>
                <div class="info-value" style="color: #4f46e5; font-size: 16px;">{{ $quote->service_type }}</div>
            </div>

            @if(!empty($quote->metadata['features']))
                <div class="section-title">🧩 Módulos Base Seleccionados</div>
                <div style="margin-bottom: 15px;">
                    @foreach($quote->metadata['features'] as $feat)
                        <span style="display: inline-block; background: #f1f5f9; border: 1px solid #cbd5e1; color: #334155; padding: 5px 12px; border-radius: 9999px; font-size: 12px; font-weight: 700; margin-right: 6px; margin-bottom: 6px;">
                            ✓ {{ $feat }}
                        </span>
                    @endforeach
                </div>
            @endif

            @if(!empty($quote->metadata['custom_items']))
                <div class="section-title">⚙️ Funcionalidades a Medida ({{ count($quote->metadata['custom_items']) }})</div>
                <div style="margin-bottom: 15px;">
                    @foreach($quote->metadata['custom_items'] as $idx => $ci)
                        <div class="feature-card">
                            <strong>#{{ $idx + 1 }}:</strong> {{ $ci }}
                        </div>
                    @endforeach
                </div>
            @endif

            @if(!empty($quote->metadata['custom_features_desc']))
                <div class="section-title">💡 Contexto / Requerimientos</div>
                <div style="background: #f8fafc; padding: 14px; border-radius: 10px; border: 1px solid #e2e8f0; font-size: 13px; line-height: 1.6; color: #334155; margin-bottom: 15px;">
                    {{ $quote->metadata['custom_features_desc'] }}
                </div>
            @endif

            <!-- Referential Price -->
            <div class="price-badge-box">
                @if($quote->estimated_budget_clp && $quote->estimated_budget_clp > 0)
                    💰 Inversión Referencial: ${{ number_format($quote->estimated_budget_clp, 0, ',', '.') }} CLP (${{ number_format($quote->estimated_budget_usd, 0) }} USD)
                @else
                    💰 Presupuesto: A evaluar según requerimientos técnicos
                @endif
                <div style="font-size: 11px; font-weight: 600; color: rgba(15,23,42,0.8); margin-top: 4px;">* Sujeto a evaluación de alcance por ingeniería REW</div>
            </div>

            <!-- Action Buttons -->
            <div style="text-align: center; margin-top: 30px;">
                <a href="https://api.whatsapp.com/send?phone={{ preg_replace('/[^0-9]/', '', $quote->phone) }}&text={{ rawurlencode('¡Hola ' . $quote->name . '! Te escribe Álvaro Valenzuela de REW.cl. Recibí tu cotización sobre ' . $quote->service_type . ' y me gustaría coordinar los detalles técnicos.') }}" target="_blank" class="btn-action">
                    💬 Responder por WhatsApp al Cliente
                </a>
                <a href="mailto:{{ $quote->email }}?subject={{ rawurlencode('Propuesta Técnica REW: ' . $quote->service_type) }}" class="btn-email">
                    ✉️ Responder por Correo
                </a>
            </div>
        </div>

        <!-- Footer -->
        <div class="email-footer">
            Sistema de Cotizaciones REW Chile • Fecha: {{ now()->format('d/m/Y H:i:s') }} • IP: {{ $quote->ip_address }}
        </div>
    </div>
</body>
</html>
