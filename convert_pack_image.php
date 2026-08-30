<?php

$packSrc = 'C:/Users/abak_/.gemini/antigravity-ide/brain/4112060b-7cd3-41cf-adc7-cdb02cfa0694/.user_uploaded/media_1788108959046.jpg';

if (file_exists($packSrc)) {
    $im = imagecreatefromjpeg($packSrc);
    if ($im) {
        imagewebp($im, 'c:/laragon/www/rew/public/images/products/pack_chatbot_ecommerce.webp', 92);
        imagewebp($im, 'c:/laragon/www/rew/public/images/products/pack_ecommerce_pro_card.webp', 92);
        imagedestroy($im);
        echo "Saved pack_chatbot_ecommerce.webp successfully!\n";
    }
}
