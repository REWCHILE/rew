/**
 * REW Cyber-Ocean Waves & Bioluminescent Bubbles Particle Engine
 * High-performance, GPU-accelerated Vanilla Canvas Animation
 * Theme: Oceanic High-Tech Digital Waves & Rising Bioluminescent Bubbles
 */
(function() {
    'use strict';

    function initOceanParticles(canvasId, options) {
        var canvas = document.getElementById(canvasId);
        if (!canvas) return;

        var ctx = canvas.getContext('2d');
        if (!ctx) return;

        var opt = Object.assign({
            bubbleCount: 45,
            waveLayers: 3,
            colorScheme: 'ocean', // 'ocean', 'dark-ocean', 'bioluminescent'
            interactive: true,
            showWaves: true
        }, options || {});

        var width, height;
        var bubbles = [];
        var animationFrameId;
        var mouse = { x: -1000, y: -1000, radius: 100 };
        var step = 0;

        function resize() {
            var rect = canvas.getBoundingClientRect();
            width = canvas.width = rect.width || window.innerWidth;
            height = canvas.height = rect.height || window.innerHeight;
        }

        function createBubbles() {
            bubbles = [];
            var count = Math.min(opt.bubbleCount, Math.floor((width * height) / 18000));
            for (var i = 0; i < count; i++) {
                bubbles.push({
                    x: Math.random() * width,
                    y: Math.random() * height,
                    radius: Math.random() * 3.5 + 1,
                    speedY: Math.random() * 0.8 + 0.3,
                    speedX: (Math.random() - 0.5) * 0.4,
                    opacity: Math.random() * 0.6 + 0.2,
                    pulseSpeed: Math.random() * 0.03 + 0.01,
                    pulseVal: Math.random() * Math.PI,
                    color: Math.random() > 0.3 ? 'rgba(56, 189, 248, ' : (Math.random() > 0.5 ? 'rgba(245, 158, 11, ' : 'rgba(99, 102, 241, ')
                });
            }
        }

        function drawWaves() {
            if (!opt.showWaves) return;

            var waveConfigs = [
                { yOffset: height * 0.78, length: 0.005, amplitude: 22, speed: 0.018, color: 'rgba(30, 58, 138, 0.25)' },
                { yOffset: height * 0.84, length: 0.008, amplitude: 18, speed: -0.022, color: 'rgba(14, 116, 144, 0.35)' },
                { yOffset: height * 0.90, length: 0.006, amplitude: 14, speed: 0.025, color: 'rgba(56, 189, 248, 0.4)' }
            ];

            for (var i = 0; i < waveConfigs.length; i++) {
                var w = waveConfigs[i];
                ctx.beginPath();
                ctx.moveTo(0, height);
                ctx.lineTo(0, w.yOffset);

                for (var x = 0; x <= width; x += 10) {
                    var y = Math.sin(x * w.length + step * w.speed) * w.amplitude + 
                            Math.cos(x * 0.003 + step * 0.01) * 8 + w.yOffset;
                    ctx.lineTo(x, y);
                }

                ctx.lineTo(width, height);
                ctx.closePath();
                ctx.fillStyle = w.color;
                ctx.fill();
            }
        }

        function drawBubbles() {
            for (var i = 0; i < bubbles.length; i++) {
                var b = bubbles[i];

                // Mouse interaction / subtle repulsion
                if (opt.interactive && mouse.x > 0) {
                    var dx = mouse.x - b.x;
                    var dy = mouse.y - b.y;
                    var dist = Math.sqrt(dx * dx + dy * dy);
                    if (dist < mouse.radius) {
                        var force = (mouse.radius - dist) / mouse.radius;
                        b.x -= (dx / dist) * force * 3;
                        b.y -= (dy / dist) * force * 3;
                    }
                }

                // Rise upwards
                b.y -= b.speedY;
                b.x += b.speedX + Math.sin(step * 0.02 + i) * 0.3;
                b.pulseVal += b.pulseSpeed;

                // Reset when floating off-screen
                if (b.y < -10) {
                    b.y = height + 10;
                    b.x = Math.random() * width;
                }
                if (b.x < -10) b.x = width + 10;
                if (b.x > width + 10) b.x = -10;

                var dynamicOpacity = b.opacity * (0.7 + Math.sin(b.pulseVal) * 0.3);

                ctx.beginPath();
                ctx.arc(b.x, b.y, b.radius, 0, Math.PI * 2);
                ctx.fillStyle = b.color + dynamicOpacity + ')';
                ctx.fill();

                // Glow ring for larger bubbles
                if (b.radius > 2.5) {
                    ctx.beginPath();
                    ctx.arc(b.x, b.y, b.radius * 1.8, 0, Math.PI * 2);
                    ctx.fillStyle = b.color + (dynamicOpacity * 0.25) + ')';
                    ctx.fill();
                }
            }
        }

        function animate() {
            ctx.clearRect(0, 0, width, height);
            step += 1;

            drawBubbles();
            drawWaves();

            animationFrameId = requestAnimationFrame(animate);
        }

        window.addEventListener('resize', function() {
            resize();
            createBubbles();
        });

        if (opt.interactive) {
            window.addEventListener('mousemove', function(e) {
                var rect = canvas.getBoundingClientRect();
                mouse.x = e.clientX - rect.left;
                mouse.y = e.clientY - rect.top;
            });
            window.addEventListener('mouseleave', function() {
                mouse.x = -1000;
                mouse.y = -1000;
            });
        }

        resize();
        createBubbles();
        animate();

        return {
            destroy: function() {
                if (animationFrameId) cancelAnimationFrame(animationFrameId);
            }
        };
    }

    window.initOceanParticles = initOceanParticles;

    // Auto-init on elements with data-ocean-particles
    document.addEventListener('DOMContentLoaded', function() {
        var elements = document.querySelectorAll('[data-ocean-canvas]');
        elements.forEach(function(el) {
            var id = el.id;
            if (id) {
                initOceanParticles(id, {
                    bubbleCount: parseInt(el.getAttribute('data-bubbles') || '40', 10),
                    showWaves: el.getAttribute('data-waves') !== 'false'
                });
            }
        });
    });
})();
