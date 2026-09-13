import fs from 'fs';
import path from 'path';
import { fileURLToPath } from 'url';
import puppeteer from 'puppeteer-core';

const __filename = fileURLToPath(import.meta.url);
const __dirname = path.dirname(__filename);
const rootDir = path.resolve(__dirname, '..');

// Common executable paths for Chrome / Edge / Chromium
function findChromeExecutable() {
    if (process.env.CHROME_PATH && fs.existsSync(process.env.CHROME_PATH)) {
        return process.env.CHROME_PATH;
    }
    if (process.env.PUPPETEER_EXECUTABLE_PATH && fs.existsSync(process.env.PUPPETEER_EXECUTABLE_PATH)) {
        return process.env.PUPPETEER_EXECUTABLE_PATH;
    }

    const candidates = [
        // Windows Chrome & Edge
        'C:\\Program Files\\Google\\Chrome\\Application\\chrome.exe',
        'C:\\Program Files (x86)\\Google\\Chrome\\Application\\chrome.exe',
        'C:\\Program Files (x86)\\Microsoft\\Edge\\Application\\msedge.exe',
        'C:\\Program Files\\Microsoft\\Edge\\Application\\msedge.exe',
        `${process.env.LOCALAPPDATA}\\Google\\Chrome\\Application\\chrome.exe`,
        `${process.env.LOCALAPPDATA}\\Microsoft\\Edge\\Application\\msedge.exe`,
        // Linux / cPanel
        '/usr/bin/google-chrome',
        '/usr/bin/google-chrome-stable',
        '/usr/bin/chromium',
        '/usr/bin/chromium-browser',
        '/snap/bin/chromium',
        '/usr/local/bin/chrome',
    ];

    for (const p of candidates) {
        if (p && fs.existsSync(p)) {
            return p;
        }
    }

    return null;
}

function cleanSlug(text) {
    return text
        .toString()
        .toLowerCase()
        .trim()
        .replace(/https?:\/\//g, '')
        .replace(/www\./g, '')
        .replace(/[^a-z0-9]+/g, '-')
        .replace(/^-+|-+$/g, '');
}

async function main() {
    const args = process.argv.slice(2);
    if (args.length === 0) {
        console.error(JSON.stringify({
            success: false,
            error: 'Uso: node scripts/capture_portfolio.js <URL> [slug]'
        }));
        process.exit(1);
    }

    let url = args[0].trim();
    if (!/^https?:\/\//i.test(url)) {
        url = 'https://' + url;
    }

    let slug = args[1] ? cleanSlug(args[1]) : cleanSlug(url);
    if (!slug) {
        slug = 'captura-' + Date.now();
    }

    const chromePath = findChromeExecutable();
    if (!chromePath) {
        console.error(JSON.stringify({
            success: false,
            error: 'No se encontró ejecutable de Google Chrome o Microsoft Edge en el servidor.'
        }));
        process.exit(1);
    }

    const outputDir = path.join(rootDir, 'public', 'images', 'portfolio');
    if (!fs.existsSync(outputDir)) {
        fs.mkdirSync(outputDir, { recursive: true });
    }

    const targetWebp = path.join(outputDir, `${slug}.webp`);
    const targetPng = path.join(outputDir, `${slug}.png`);

    let browser;
    try {
        browser = await puppeteer.launch({
            executablePath: chromePath,
            headless: true,
            args: [
                '--no-sandbox',
                '--disable-setuid-sandbox',
                '--disable-dev-shm-usage',
                '--disable-accelerated-2d-canvas',
                '--no-first-run',
                '--no-zygote',
                '--disable-gpu',
                '--hide-scrollbars',
                '--mute-audio',
            ],
            defaultViewport: {
                width: 1440,
                height: 900,
                deviceScaleFactor: 1,
            }
        });

        const page = await browser.newPage();
        await page.setUserAgent('Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36 REW-Portfolio-Engine/2.0');

        // Navigate with generous timeout
        await page.goto(url, {
            waitUntil: 'domcontentloaded',
            timeout: 45000,
        });

        // Short stabilization pause
        await new Promise(r => setTimeout(r, 1500));

        // 1. Intelligent Step-Scroll through entire page to trigger all IntersectionObservers & Lazy Loaders
        await page.evaluate(async () => {
            await new Promise((resolve) => {
                let currentPos = 0;
                const step = 350;
                const delay = 60;
                let count = 0;
                const maxSteps = 250; // Safety cap ~87,000px

                const timer = setInterval(() => {
                    const scrollHeight = Math.max(document.body.scrollHeight, document.documentElement.scrollHeight);
                    window.scrollBy(0, step);
                    currentPos += step;
                    count++;

                    // Unpack and force eager loading on lazy images as we pass them
                    document.querySelectorAll('img').forEach(img => {
                        const lazySrc = img.getAttribute('data-src') || 
                                        img.getAttribute('data-lazy-src') || 
                                        img.getAttribute('data-original') ||
                                        img.getAttribute('data-fallback-src');
                        if (lazySrc && img.src !== lazySrc) {
                            img.src = lazySrc;
                        }
                        const lazySrcset = img.getAttribute('data-srcset') || img.getAttribute('data-lazy-srcset');
                        if (lazySrcset && img.srcset !== lazySrcset) {
                            img.srcset = lazySrcset;
                        }
                        img.loading = 'eager';
                        img.decoding = 'sync';
                    });

                    if ((window.innerHeight + window.pageYOffset) >= scrollHeight - 50 || count >= maxSteps) {
                        clearInterval(timer);
                        resolve();
                    }
                }, delay);
            });
        });

        // 2. Force reveal all scroll-reveal animations & wait for images to load completely
        await page.evaluate(async () => {
            // Force animations visible
            const animationSelectors = [
                '[data-aos]',
                '.animated',
                '.elementor-invisible',
                '.wow',
                '.fade-in',
                '.lazyload',
                '[data-sal]'
            ];
            document.querySelectorAll(animationSelectors.join(', ')).forEach(el => {
                el.classList.add('aos-animate');
                el.classList.remove('elementor-invisible');
                el.style.opacity = '1';
                el.style.visibility = 'visible';
                el.style.animation = 'none';
                el.style.transition = 'none';
            });

            // Wait for all <img> tags to have complete and naturalWidth > 0
            const imgs = Array.from(document.querySelectorAll('img'));
            await Promise.all(imgs.map(img => {
                if (img.complete && img.naturalWidth > 0) return Promise.resolve();
                return new Promise(res => {
                    img.addEventListener('load', res, { once: true });
                    img.addEventListener('error', res, { once: true });
                    setTimeout(res, 2500); // max 2.5s fallback per asset
                });
            }));

            // Scroll back smoothly to top
            window.scrollTo({ top: 0, behavior: 'instant' });
        });

        // 3. Stabilization pause at top
        await new Promise(r => setTimeout(r, 1500));

        // 4. Extract rich SEO & technology metadata
        const metadata = await page.evaluate(() => {
            const rawTitle = document.title ? document.title.trim() : '';
            const descEl = document.querySelector('meta[name="description"]') || 
                           document.querySelector('meta[property="og:description"]') ||
                           document.querySelector('meta[name="twitter:description"]');
            const rawDesc = descEl ? (descEl.getAttribute('content') || '').trim() : '';

            const h1El = document.querySelector('h1');
            const rawH1 = h1El ? h1El.innerText.trim() : '';

            const html = (document.documentElement.outerHTML || '').toLowerCase();
            const techs = [];

            if (html.includes('wp-content') || html.includes('wp-includes')) techs.push('WordPress');
            if (html.includes('woocommerce') || html.includes('wc-')) techs.push('WooCommerce');
            if (html.includes('elementor')) techs.push('Elementor');
            if (html.includes('shopify')) techs.push('Shopify');
            if (html.includes('laravel') || html.includes('csrf-token')) techs.push('Laravel');
            if (html.includes('react') || html.includes('_next')) techs.push('React / Next.js');
            if (html.includes('vue') || html.includes('nuxt')) techs.push('Vue.js / Nuxt');
            if (html.includes('tailwind')) techs.push('Tailwind CSS');
            if (html.includes('bootstrap')) techs.push('Bootstrap');
            if (html.includes('transbank') || html.includes('webpay')) techs.push('Webpay Plus');
            if (html.includes('mercadopago')) techs.push('Mercado Pago');

            if (techs.length === 0) {
                techs.push('PHP Nativo', 'JavaScript Vanilla', 'CSS3 Modular');
            }

            // Derive client name guess from title or domain
            let clientGuess = rawTitle.split(/[-–—|•]/)[0].trim();
            if (!clientGuess || clientGuess.length > 50) {
                try {
                    clientGuess = new URL(window.location.href).hostname.replace(/^www\./, '');
                } catch (e) {
                    clientGuess = 'Cliente Confidencial';
                }
            }

            // Suggest category based on technologies and content
            let catSuggestion = 'Web Corporativa & Turismo';
            if (techs.includes('WooCommerce') || techs.includes('Shopify') || html.includes('carro de compras') || html.includes('tienda online')) {
                catSuggestion = 'E-Commerce & Merch';
            } else if (techs.includes('Laravel') || html.includes('autoadministrable') || html.includes('saas') || html.includes('software a medida')) {
                catSuggestion = 'Plataformas Web & Software a Medida';
            } else if (html.includes('inteligencia artificial') || html.includes('trading') || html.includes('fintech') || html.includes('machine learning')) {
                catSuggestion = 'Inteligencia Artificial & FinTech';
            } else if (html.includes('estetica') || html.includes('clinica') || html.includes('dental') || html.includes('salud')) {
                catSuggestion = 'Salud & Estética';
            } else if (html.includes('streaming satelital') || html.includes('transmision en vivo') || html.includes('canal de tv')) {
                catSuggestion = 'Streaming & Media';
            }

            const docHeight = Math.max(
                document.body.scrollHeight, 
                document.documentElement.scrollHeight,
                document.body.offsetHeight, 
                document.documentElement.offsetHeight
            );

            return {
                title: rawTitle || clientGuess,
                description: rawDesc || rawH1 || 'Sitio web optimizado desarrollado con tecnologías modernas y altos estándares de rendimiento.',
                h1: rawH1,
                client: clientGuess,
                technologies: techs.join(', '),
                category_suggestion: catSuggestion,
                document_height: docHeight,
            };
        });

        // 5. Take Full-Page WebP screenshot
        await page.screenshot({
            path: targetWebp,
            type: 'webp',
            quality: 90,
            fullPage: true,
        });

        // Also take PNG as fallback / reference
        await page.screenshot({
            path: targetPng,
            type: 'png',
            fullPage: true,
        });

        await browser.close();

        const result = {
            success: true,
            url,
            slug,
            title: metadata.title,
            description: metadata.description,
            h1: metadata.h1,
            client: metadata.client,
            technologies: metadata.technologies,
            category_suggestion: metadata.category_suggestion,
            featured_image: `/images/portfolio/${slug}.webp`,
            png_image: `/images/portfolio/${slug}.png`,
            viewport_width: 1440,
            document_height: metadata.document_height,
            filesize_webp: fs.existsSync(targetWebp) ? fs.statSync(targetWebp).size : 0,
        };

        console.log(JSON.stringify(result));
        process.exit(0);

    } catch (err) {
        if (browser) {
            try { await browser.close(); } catch (e) {}
        }
        console.error(JSON.stringify({
            success: false,
            error: 'Error durante la captura y análisis: ' + err.message
        }));
        process.exit(1);
    }
}

main();
