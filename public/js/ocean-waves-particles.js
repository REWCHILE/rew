/**
 * REW Cyber-Ocean Waves & Bioluminescent Marine Particles Engine
 * High-performance, GPU-accelerated Vanilla Canvas Animation
 * Theme: Oceanic Deep-Sea Plankton Constellations, Swimming Micro-Shapes, Rising Bubbles & Undulating Waves
 */
(function() {
    'use strict';

    function initOceanParticles(canvasId, options) {
        var canvas = typeof canvasId === 'string' ? document.getElementById(canvasId) : canvasId;
        if (!canvas) return;

        var ctx = canvas.getContext('2d');
        if (!ctx) return;

        var opt = Object.assign({
            bubbleCount: 50,
            shapeCount: 8,
            linkDistance: 90,
            showLinks: true,
            showWaves: true,
            showShapes: true,
            interactive: true,
            colorPalette: ['#38bdf8', '#06b6d4', '#10b981', '#6366f1', '#f59e0b']
        }, options || {});

        var width = 0, height = 0;
        var bubbles = [];
        var marineShapes = [];
        var animationFrameId = null;
        var mouse = { x: -1000, y: -1000, radius: 120, active: false };
        var step = 0;

        function resize() {
            var parent = canvas.parentElement;
            var rect = parent ? parent.getBoundingClientRect() : canvas.getBoundingClientRect();
            width = canvas.width = rect.width || canvas.offsetWidth || 800;
            height = canvas.height = rect.height || canvas.offsetHeight || 400;
        }

        // 1. Initialize Marine Plankton / Bioluminescent Nodes & Bubbles
        function createBubbles() {
            bubbles = [];
            var count = Math.min(opt.bubbleCount, Math.max(25, Math.floor((width * height) / 12000)));
            for (var i = 0; i < count; i++) {
                bubbles.push({
                    x: Math.random() * width,
                    y: Math.random() * height,
                    radius: Math.random() * 3 + 1.2,
                    speedY: Math.random() * 0.6 + 0.25,
                    speedX: (Math.random() - 0.5) * 0.5,
                    vx: (Math.random() - 0.5) * 0.4,
                    vy: (Math.random() - 0.5) * 0.4,
                    baseAlpha: Math.random() * 0.55 + 0.25,
                    pulseSpeed: Math.random() * 0.04 + 0.015,
                    pulsePhase: Math.random() * Math.PI * 2,
                    color: opt.colorPalette[Math.floor(Math.random() * opt.colorPalette.length)]
                });
            }
        }

        // 2. Initialize Floating Geometric Sea Creatures / Organic Marine Shapes
        function createMarineShapes() {
            marineShapes = [];
            if (!opt.showShapes) return;
            var count = Math.min(opt.shapeCount, Math.max(4, Math.floor(width / 220)));
            for (var i = 0; i < count; i++) {
                marineShapes.push({
                    x: Math.random() * width,
                    y: Math.random() * height,
                    size: Math.random() * 18 + 12,
                    sides: Math.random() > 0.5 ? (Math.random() > 0.5 ? 3 : 5) : 6, // Triangle, Pentagon, Hexagon (Marine diatom geometry)
                    angle: Math.random() * Math.PI * 2,
                    rotSpeed: (Math.random() - 0.5) * 0.012,
                    driftY: Math.random() * 0.35 + 0.15,
                    driftX: (Math.random() - 0.5) * 0.3,
                    wobbleSpeed: Math.random() * 0.02 + 0.01,
                    wobblePhase: Math.random() * Math.PI * 2,
                    color: opt.colorPalette[Math.floor(Math.random() * opt.colorPalette.length)],
                    isJellyfish: Math.random() > 0.6
                });
            }
        }

        // Draw Multi-Layered Oceanic Waves
        function drawWaves() {
            if (!opt.showWaves) return;

            var waveConfigs = [
                { yOffset: height * 0.76, length: 0.004, amplitude: 22, speed: 0.016, color: 'rgba(30, 58, 138, 0.25)' },
                { yOffset: height * 0.83, length: 0.007, amplitude: 16, speed: -0.020, color: 'rgba(14, 116, 144, 0.30)' },
                { yOffset: height * 0.89, length: 0.005, amplitude: 12, speed: 0.024, color: 'rgba(56, 189, 248, 0.35)' }
            ];

            for (var i = 0; i < waveConfigs.length; i++) {
                var w = waveConfigs[i];
                ctx.beginPath();
                ctx.moveTo(0, height);
                ctx.lineTo(0, w.yOffset);

                for (var x = 0; x <= width; x += 12) {
                    var y = Math.sin(x * w.length + step * w.speed) * w.amplitude + 
                            Math.cos(x * 0.003 + step * 0.01) * 6 + w.yOffset;
                    ctx.lineTo(x, y);
                }

                ctx.lineTo(width, height);
                ctx.closePath();
                ctx.fillStyle = w.color;
                ctx.fill();
            }
        }

        // Draw Constellation Mesh Connections (Particles.js style)
        function drawConnections() {
            if (!opt.showLinks) return;
            var maxDist = opt.linkDistance;

            for (var i = 0; i < bubbles.length; i++) {
                for (var j = i + 1; j < bubbles.length; j++) {
                    var dx = bubbles[i].x - bubbles[j].x;
                    var dy = bubbles[i].y - bubbles[j].y;
                    var dist = Math.sqrt(dx * dx + dy * dy);

                    if (dist < maxDist) {
                        var alpha = (1 - dist / maxDist) * 0.25;
                        ctx.beginPath();
                        ctx.moveTo(bubbles[i].x, bubbles[i].y);
                        ctx.lineTo(bubbles[j].x, bubbles[j].y);
                        ctx.strokeStyle = 'rgba(56, 189, 248, ' + alpha + ')';
                        ctx.lineWidth = 0.8;
                        ctx.stroke();
                    }
                }
            }
        }

        // Draw Floating Marine Geometric Shapes & Micro-Jellyfish
        function drawMarineShapes() {
            for (var i = 0; i < marineShapes.length; i++) {
                var s = marineShapes[i];

                // Drift & Wobble
                s.y -= s.driftY;
                s.x += s.driftX + Math.sin(step * s.wobbleSpeed + s.wobblePhase) * 0.4;
                s.angle += s.rotSpeed;

                // Loop bounds
                if (s.y < -40) s.y = height + 40;
                if (s.x < -40) s.x = width + 40;
                if (s.x > width + 40) s.x = -40;

                // Mouse interaction with shapes
                if (opt.interactive && mouse.active) {
                    var dx = mouse.x - s.x;
                    var dy = mouse.y - s.y;
                    var dist = Math.sqrt(dx * dx + dy * dy);
                    if (dist < mouse.radius * 1.3) {
                        var force = (mouse.radius * 1.3 - dist) / (mouse.radius * 1.3);
                        s.x -= (dx / dist) * force * 2.5;
                        s.y -= (dy / dist) * force * 2.5;
                    }
                }

                ctx.save();
                ctx.translate(s.x, s.y);
                ctx.rotate(s.angle);

                if (s.isJellyfish) {
                    // Pulsating Micro-Jellyfish Shape
                    var pulse = Math.sin(step * 0.05 + s.wobblePhase) * 0.15 + 1;
                    ctx.scale(pulse, pulse);

                    // Bell Dome
                    ctx.beginPath();
                    ctx.arc(0, 0, s.size * 0.8, Math.PI, 0, false);
                    ctx.closePath();
                    ctx.fillStyle = hexToRgba(s.color, 0.18);
                    ctx.fill();
                    ctx.strokeStyle = hexToRgba(s.color, 0.45);
                    ctx.lineWidth = 1.2;
                    ctx.stroke();

                    // Trailing Tentacles
                    for (var t = -2; t <= 2; t++) {
                        ctx.beginPath();
                        ctx.moveTo(t * (s.size * 0.3), 0);
                        var waveLeg = Math.sin(step * 0.08 + t) * 6;
                        ctx.quadraticCurveTo(t * (s.size * 0.2) + waveLeg, s.size * 0.7, t * (s.size * 0.15), s.size * 1.2);
                        ctx.strokeStyle = hexToRgba(s.color, 0.35);
                        ctx.lineWidth = 0.9;
                        ctx.stroke();
                    }
                } else {
                    // Translucent Diatom Polyhedron (Triangle/Pentagon/Hexagon)
                    ctx.beginPath();
                    for (var p = 0; p < s.sides; p++) {
                        var a = (p / s.sides) * Math.PI * 2;
                        var px = Math.cos(a) * s.size;
                        var py = Math.sin(a) * s.size;
                        if (p === 0) ctx.moveTo(px, py);
                        else ctx.lineTo(px, py);
                    }
                    ctx.closePath();
                    ctx.fillStyle = hexToRgba(s.color, 0.08);
                    ctx.fill();
                    ctx.strokeStyle = hexToRgba(s.color, 0.3);
                    ctx.lineWidth = 1;
                    ctx.stroke();
                }

                ctx.restore();
            }
        }

        // Draw Bioluminescent Bubbles & Particles
        function drawBubbles() {
            for (var i = 0; i < bubbles.length; i++) {
                var b = bubbles[i];

                // Mouse interaction / Gentle fluid repulsion
                if (opt.interactive && mouse.active) {
                    var dx = mouse.x - b.x;
                    var dy = mouse.y - b.y;
                    var dist = Math.sqrt(dx * dx + dy * dy);
                    if (dist < mouse.radius) {
                        var force = (mouse.radius - dist) / mouse.radius;
                        b.x -= (dx / dist) * force * 3.2;
                        b.y -= (dy / dist) * force * 3.2;
                    }
                }

                // Rising physics & horizontal current sway
                b.y -= b.speedY;
                b.x += b.speedX + Math.sin(step * 0.02 + i) * 0.35;

                // Loop bounds
                if (b.y < -15) {
                    b.y = height + 15;
                    b.x = Math.random() * width;
                }
                if (b.x < -15) b.x = width + 15;
                if (b.x > width + 15) b.x = -15;

                // Dynamic breathing opacity
                var currentAlpha = b.baseAlpha + Math.sin(step * b.pulseSpeed + b.pulsePhase) * 0.2;
                currentAlpha = Math.max(0.1, Math.min(0.85, currentAlpha));

                // Outer Bioluminescent Radial Glow
                var glowRadius = b.radius * 3.2;
                var grad = ctx.createRadialGradient(b.x, b.y, 0, b.x, b.y, glowRadius);
                grad.addColorStop(0, hexToRgba(b.color, currentAlpha * 0.9));
                grad.addColorStop(0.5, hexToRgba(b.color, currentAlpha * 0.3));
                grad.addColorStop(1, 'rgba(0,0,0,0)');

                ctx.beginPath();
                ctx.arc(b.x, b.y, glowRadius, 0, Math.PI * 2);
                ctx.fillStyle = grad;
                ctx.fill();

                // Bright Inner Core
                ctx.beginPath();
                ctx.arc(b.x, b.y, b.radius, 0, Math.PI * 2);
                ctx.fillStyle = '#ffffff';
                ctx.globalAlpha = currentAlpha * 0.9;
                ctx.fill();
                ctx.globalAlpha = 1.0;
            }
        }

        // Animation Loop
        function animate() {
            ctx.clearRect(0, 0, width, height);
            step += 1;

            drawConnections();
            drawMarineShapes();
            drawBubbles();
            drawWaves();

            animationFrameId = requestAnimationFrame(animate);
        }

        function hexToRgba(hex, alpha) {
            if (hex.startsWith('rgba')) {
                return hex.replace(/[\d\.]+\)$/, alpha + ')');
            }
            var c = hex.replace('#', '');
            if (c.length === 3) c = c[0] + c[0] + c[1] + c[1] + c[2] + c[2];
            var num = parseInt(c, 16);
            return 'rgba(' + (num >> 16) + ', ' + ((num >> 8) & 255) + ', ' + (num & 255) + ', ' + alpha + ')';
        }

        // Event Listeners
        window.addEventListener('resize', function() {
            resize();
            createBubbles();
            createMarineShapes();
        });

        if (opt.interactive) {
            var parentEl = canvas.parentElement || canvas;
            parentEl.addEventListener('mousemove', function(e) {
                var rect = canvas.getBoundingClientRect();
                mouse.x = e.clientX - rect.left;
                mouse.y = e.clientY - rect.top;
                mouse.active = true;
            });
            parentEl.addEventListener('mouseleave', function() {
                mouse.active = false;
                mouse.x = -1000;
                mouse.y = -1000;
            });
        }

        resize();
        createBubbles();
        createMarineShapes();
        animate();

        return {
            destroy: function() {
                if (animationFrameId) cancelAnimationFrame(animationFrameId);
            }
        };
    }

    window.initOceanParticles = initOceanParticles;

    // Auto-init on elements with data-ocean-canvas
    function autoInit() {
        var elements = document.querySelectorAll('[data-ocean-canvas]');
        elements.forEach(function(el) {
            initOceanParticles(el, {
                bubbleCount: parseInt(el.getAttribute('data-bubbles') || '45', 10),
                shapeCount: parseInt(el.getAttribute('data-shapes') || '6', 10),
                showWaves: el.getAttribute('data-waves') !== 'false',
                showShapes: el.getAttribute('data-shapes') !== 'false'
            });
        });
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', autoInit);
    } else {
        autoInit();
    }
})();
