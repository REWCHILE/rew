<?php

// 1. Convert addon_woocommerce_sync to WebP
$addonJpg = 'C:/Users/abak_/.gemini/antigravity-ide/brain/4112060b-7cd3-41cf-adc7-cdb02cfa0694/addon_woocommerce_sync_1788105908447.jpg';
$addonWebp = 'c:/laragon/www/rew/public/images/products/addon_woocommerce_sync.webp';

if (file_exists($addonJpg)) {
    $im = imagecreatefromjpeg($addonJpg);
    if ($im) {
        imagewebp($im, $addonWebp, 90);
        imagedestroy($im);
        echo "Created addon_woocommerce_sync.webp successfully!\n";
    }
}

// 2. Ensure product images directory has clean WebP for all products
$productsDir = 'c:/laragon/www/rew/public/images/products/';
if (! is_dir($productsDir)) {
    mkdir($productsDir, 0755, true);
}

// Helper to create branded gradient product badge card if not exists
function createBrandedCard($targetFile, $title, $sub, $badgeText, $bgColor1, $bgColor2)
{
    if (file_exists($targetFile) && filesize($targetFile) > 5000) {
        return;
    }
    $w = 800;
    $h = 800;
    $img = imagecreatetruecolor($w, $h);

    // Gradient background
    for ($y = 0; $y < $h; $y++) {
        $r = (int) ($bgColor1[0] + ($bgColor2[0] - $bgColor1[0]) * ($y / $h));
        $g = (int) ($bgColor1[1] + ($bgColor2[1] - $bgColor1[1]) * ($y / $h));
        $b = (int) ($bgColor1[2] + ($bgColor2[1] - $bgColor1[2]) * ($y / $h));
        $col = imagecolorallocate($img, $r, $g, $b);
        imageline($img, 0, $y, $w, $y, $col);
    }

    // Draw badge rectangle
    $badgeBg = imagecolorallocate($img, 245, 158, 11);
    imagefilledrectangle($img, 200, 200, 600, 260, $badgeBg);

    imagewebp($img, $targetFile, 90);
    imagedestroy($img);
    echo "Created branded card: $targetFile\n";
}

createBrandedCard($productsDir.'rew_multi_currency_pro.webp', 'REW Multi-Currency Pro', 'CLP / USD Selector & Auto Translator', 'PLUGIN WOOCOMMERCE', [15, 23, 42], [30, 27, 75]);
createBrandedCard($productsDir.'addon_blog_indexing.webp', 'Addon: Indexación Semántica de Blog', 'RAG Embeddings para Artículos', 'ADDON OFICIAL', [15, 23, 42], [16, 185, 129]);
createBrandedCard($productsDir.'addon_custom_post_types.webp', 'Addon: Custom Post Types CPT', 'Indexación ACF y CPTs', 'ADDON OFICIAL', [15, 23, 42], [79, 70, 229]);
createBrandedCard($productsDir.'addon_support_integration.webp', 'Soporte Premium e Integración', 'Configuración Directa con Ingenieros', 'SERVICIO REW', [15, 23, 42], [217, 119, 6]);

// 3. Create Patagonia Shelter portfolio image if missing
$portfolioDir = 'c:/laragon/www/rew/public/images/portfolio/';
createBrandedCard($portfolioDir.'patagonia_shelter.webp', 'Patagonia Shelter', 'E-Commerce & Turismo Austral', 'CASO DE ÉXITO', [15, 23, 42], [14, 116, 144]);

echo "All images ensured successfully!\n";
