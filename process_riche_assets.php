<?php

$srcJpg = 'C:/Users/abak_/.gemini/antigravity-ide/brain/4112060b-7cd3-41cf-adc7-cdb02cfa0694/.user_uploaded/media_1788107408837.jpg';

if (! file_exists($srcJpg)) {
    exit("File not found: $srcJpg\n");
}

$im = imagecreatefromjpeg($srcJpg);
if (! $im) {
    exit("Failed to create image from JPEG\n");
}

$w = imagesx($im);
$h = imagesy($im);

// 1. Save full high-res WebP for products
$destProducts = [
    'c:/laragon/www/rew/public/images/products/riche_chatbot_assistant.webp',
    'c:/laragon/www/rew/public/images/products/pack_chatbot_ecommerce.webp',
    'c:/laragon/www/rew/public/images/products/riche_lifetime_license.webp',
    'c:/laragon/www/rew/public/images/riche_avatar_hd.webp',
    'c:/laragon/www/rew/public/images/riche_shield_badge.webp',
];

foreach ($destProducts as $dest) {
    imagewebp($im, $dest, 92);
    echo "Saved: $dest\n";
}

// 2. Crop the center robot avatar for the floating chat widget (riche-avatar.png)
// The robot avatar is in the upper-middle area (around x: 25% to 75%, y: 15% to 65%)
$avatarW = (int) ($w * 0.6);
$avatarH = (int) ($h * 0.6);
$avatarX = (int) (($w - $avatarW) / 2);
$avatarY = (int) ($h * 0.12);

$avatar = imagecreatetruecolor(256, 256);
imagealphablending($avatar, false);
imagesavealpha($avatar, true);
$trans = imagecolorallocatealpha($avatar, 0, 0, 0, 127);
imagefilledrectangle($avatar, 0, 0, 256, 256, $trans);

imagecopyresampled($avatar, $im, 0, 0, $avatarX, $avatarY, 256, 256, $avatarW, $avatarH);
imagepng($avatar, 'c:/laragon/www/rew/public/images/riche-avatar.png', 9);
imagewebp($avatar, 'c:/laragon/www/rew/public/images/riche-avatar.webp', 95);
imagedestroy($avatar);

echo "All Rich-E assets generated successfully!\n";
