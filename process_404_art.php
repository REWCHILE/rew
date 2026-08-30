<?php

$src = 'C:/Users/abak_/.gemini/antigravity-ide/brain/4112060b-7cd3-41cf-adc7-cdb02cfa0694/rew_404_naufrago_ocean_1788112666171.jpg';
$destDir = 'c:/laragon/www/rew/public/images/';

if (file_exists($src)) {
    $im = imagecreatefromjpeg($src);
    if ($im) {
        imagewebp($im, $destDir.'rew_404_naufrago.webp', 92);
        imagepng($im, $destDir.'rew_404_naufrago.png');
        imagedestroy($im);
        echo "Successfully converted 404 artwork to WebP and PNG!\n";
    }
} else {
    echo "Source image not found at $src\n";
}
