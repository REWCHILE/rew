<?php

$heroSrc = 'C:/Users/abak_/.gemini/antigravity-ide/brain/4112060b-7cd3-41cf-adc7-cdb02cfa0694/.user_uploaded/media_1788107638678.png';

if (file_exists($heroSrc)) {
    $im = imagecreatefrompng($heroSrc);
    if ($im) {
        imagewebp($im, 'c:/laragon/www/rew/public/images/products/riche_hero_banner.webp', 92);
        imagewebp($im, 'c:/laragon/www/rew/public/images/products/riche_landing_hero.webp', 92);
        imagewebp($im, 'c:/laragon/www/rew/public/images/products/riche_product_mockup.webp', 92);
        imagedestroy($im);
        echo "Saved riche_hero_banner.webp and variants successfully!\n";
    }
}
