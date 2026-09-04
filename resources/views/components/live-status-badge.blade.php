<!-- Live Engineering & Availability Status Widget (High-Conversion Desktop & Mobile) -->
<style>
.live-status-pill-container {
    display: flex;
    justify-content: center;
    margin-bottom: 1.75rem;
    padding: 0 1rem;
    width: 100%;
}

.live-status-card {
    display: inline-flex;
    align-items: center;
    gap: 14px;
    background: linear-gradient(135deg, rgba(15, 23, 42, 0.95) 0%, rgba(30, 41, 59, 0.92) 100%);
    border: 1px solid rgba(16, 185, 129, 0.45);
    box-shadow: 0 10px 30px -5px rgba(0, 0, 0, 0.35), 0 0 25px -4px rgba(16, 185, 129, 0.25);
    backdrop-filter: blur(16px);
    -webkit-backdrop-filter: blur(16px);
    padding: 6px 8px 6px 16px;
    border-radius: 9999px;
    max-width: 100%;
    transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
}

.live-status-card:hover {
    border-color: rgba(16, 185, 129, 0.7);
    box-shadow: 0 14px 35px -5px rgba(0, 0, 0, 0.45), 0 0 30px -2px rgba(16, 185, 129, 0.4);
    transform: translateY(-1px);
}

.live-status-info {
    display: flex;
    align-items: center;
    gap: 10px;
    font-size: 0.85rem;
    white-space: nowrap;
}

.live-pulse-wrapper {
    position: relative;
    display: flex;
    align-items: center;
    justify-content: center;
    width: 12px;
    height: 12px;
    flex-shrink: 0;
}

.live-pulse-dot {
    width: 8px;
    height: 8px;
    background-color: #10b981;
    border-radius: 50%;
    position: relative;
    z-index: 2;
}

.live-pulse-ring {
    position: absolute;
    inset: -3px;
    border-radius: 50%;
    background-color: rgba(16, 185, 129, 0.6);
    animation: livePulseRadar 2s cubic-bezier(0.24, 0, 0.38, 1) infinite;
    z-index: 1;
}

@keyframes livePulseRadar {
    0% { transform: scale(0.6); opacity: 0.9; }
    70% { transform: scale(2.2); opacity: 0; }
    100% { transform: scale(2.4); opacity: 0; }
}

.live-status-label {
    color: #94a3b8;
    font-weight: 500;
}

.live-status-count {
    color: #34d399;
    font-weight: 800;
    letter-spacing: -0.01em;
}

.live-divider-bullet {
    color: #475569;
    font-size: 0.85rem;
}

.live-badge-speed {
    display: inline-flex;
    align-items: center;
    gap: 4px;
    background: rgba(245, 158, 11, 0.12);
    border: 1px solid rgba(245, 158, 11, 0.35);
    color: #fbbf24;
    padding: 3px 9px;
    border-radius: 9999px;
    font-size: 0.76rem;
    font-weight: 700;
    white-space: nowrap;
    letter-spacing: 0.01em;
}

.live-status-cta-btn {
    display: inline-flex;
    align-items: center;
    gap: 7px;
    background: linear-gradient(135deg, #10b981 0%, #059669 100%);
    color: #ffffff !important;
    text-decoration: none !important;
    font-size: 0.82rem;
    font-weight: 800;
    padding: 7px 16px;
    border-radius: 9999px;
    box-shadow: 0 4px 14px rgba(16, 185, 129, 0.4);
    transition: all 0.25s ease;
    white-space: nowrap;
    border: 1px solid rgba(255, 255, 255, 0.2);
}

.live-status-cta-btn:hover {
    background: linear-gradient(135deg, #059669 0%, #047857 100%);
    box-shadow: 0 6px 20px rgba(16, 185, 129, 0.6);
    transform: scale(1.03);
    color: #ffffff !important;
}

.live-status-cta-btn svg {
    transition: transform 0.2s ease;
}

.live-status-cta-btn:hover svg {
    transform: scale(1.1);
}

/* Mobile Responsive Optimization (Clean 2-tier Card) */
@media (max-width: 680px) {
    .live-status-pill-container {
        margin-bottom: 1.25rem;
        padding: 0 0.75rem;
    }

    .live-status-card {
        flex-direction: column;
        align-items: stretch;
        gap: 9px;
        padding: 10px 14px 12px;
        border-radius: 16px;
        width: 100%;
        max-width: 375px;
    }

    .live-status-info {
        justify-content: space-between;
        font-size: 0.8rem;
        width: 100%;
    }

    .live-divider-bullet {
        display: none;
    }

    .live-status-info-left {
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .live-badge-speed {
        font-size: 0.72rem;
        padding: 2px 7px;
    }

    .live-status-cta-btn {
        width: 100%;
        justify-content: center;
        padding: 8px 14px;
        font-size: 0.82rem;
        border-radius: 10px;
    }
}
</style>

<div class="live-status-pill-container">
    <div class="live-status-card">
        <div class="live-status-info">
            <div class="live-status-info-left" style="display: flex; align-items: center; gap: 7px;">
                <span class="live-pulse-wrapper">
                    <span class="live-pulse-dot"></span>
                    <span class="live-pulse-ring"></span>
                </span>
                <span class="live-status-label">Disponibilidad:</span>
                <span class="live-status-count">2 cupos activos</span>
            </div>
            <span class="live-divider-bullet">•</span>
            <span class="live-badge-speed">⚡ &lt; 15 min</span>
        </div>
        <a href="https://api.whatsapp.com/send?phone=56987261127&text=Hola%20%C3%81lvaro%2C%20vi%20en%20rew.cl%20la%20disponibilidad%20activa%20y%20quiero%20agendar%20uno%20de%20los%20cupos%20de%20desarrollo." 
           target="_blank" 
           rel="noopener noreferrer" 
           class="live-status-cta-btn" 
           title="Agendar Cupo de Desarrollo vía WhatsApp">
            <svg width="15" height="15" viewBox="0 0 24 24" fill="currentColor" style="flex-shrink: 0;" aria-hidden="true">
                <path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.77-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.299.045-.677.063-1.092-.069-.252-.08-.575-.187-.988-.365-1.739-.751-2.874-2.502-2.961-2.617-.087-.116-.708-.94-.708-1.793s.448-1.273.607-1.446c.159-.173.346-.217.462-.217l.332.006c.106.005.249-.04.39.298.144.347.491 1.2.534 1.287.043.087.072.188.014.304-.058.116-.087.188-.173.289l-.26.304c-.087.086-.177.18-.076.354.101.174.449.741.964 1.201.662.591 1.221.774 1.394.86s.275.072.376-.043c.101-.116.433-.506.549-.68.116-.173.231-.145.39-.087s1.011.477 1.184.564.289.13.332.202c.043.073.043.42-.101.825zM12 2C6.477 2 2 6.477 2 12c0 1.891.523 3.66 1.434 5.176L2 22l4.954-1.399C8.396 21.439 10.144 22 12 22c5.523 0 10-4.477 10-10S17.523 2 12 2z"/>
            </svg>
            <span>Agendar Cupo &rarr;</span>
        </a>
    </div>
</div>
