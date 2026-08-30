<?php

$srcPath = 'C:/Users/abak_/.gemini/antigravity-ide/brain/4112060b-7cd3-41cf-adc7-cdb02cfa0694/.user_uploaded/media_1788107316045.png';

if (! file_exists($srcPath)) {
    exit("Source file not found: $srcPath\n");
}

$src = imagecreatefrompng($srcPath);
if (! $src) {
    exit("Failed to create image from PNG\n");
}

$srcW = imagesx($src);
$srcH = imagesy($src);

// Find bounding box of non-white pixels (crop margins)
$minX = $srcW;
$minY = $srcH;
$maxX = 0;
$maxY = 0;

for ($y = 0; $y < $srcH; $y += 2) {
    for ($x = 0; $x < $srcW; $x += 2) {
        $rgb = imagecolorat($src, $x, $y);
        $r = ($rgb >> 16) & 0xFF;
        $g = ($rgb >> 8) & 0xFF;
        $b = $rgb & 0xFF;

        // If not white / near white
        if ($r < 240 || $g < 240 || $b < 240) {
            if ($x < $minX) {
                $minX = $x;
            }
            if ($x > $maxX) {
                $maxX = $x;
            }
            if ($y < $minY) {
                $minY = $y;
            }
            if ($y > $maxY) {
                $maxY = $y;
            }
        }
    }
}

// Add small margin
$pad = 20;
$minX = max(0, $minX - $pad);
$minY = max(0, $minY - $pad);
$maxX = min($srcW - 1, $maxX + $pad);
$maxY = min($srcH - 1, $maxY + $pad);

$cropW = $maxX - $minX + 1;
$cropH = $maxY - $minY + 1;

// Make a square canvas with transparent background
$maxDim = max($cropW, $cropH);
$square = imagecreatetruecolor($maxDim, $maxDim);
imagealphablending($square, false);
imagesavealpha($square, true);
$transparent = imagecolorallocatealpha($square, 0, 0, 0, 127);
imagefilledrectangle($square, 0, 0, $maxDim, $maxDim, $transparent);

// Center the cropped logo on the square canvas, making white background transparent
$destX = (int) (($maxDim - $cropW) / 2);
$destY = (int) (($maxDim - $cropH) / 2);

// Copy pixels with transparency for white background
imagealphablending($square, true);
for ($y = 0; $y < $cropH; $y++) {
    for ($x = 0; $x < $cropW; $x++) {
        $rgb = imagecolorat($src, $minX + $x, $minY + $y);
        $r = ($rgb >> 16) & 0xFF;
        $g = ($rgb >> 8) & 0xFF;
        $b = $rgb & 0xFF;

        // Calculate alpha based on whiteness (smooth transparent edge)
        $whiteness = min($r, $g, $b);
        if ($whiteness > 245) {
            continue; // fully transparent
        } elseif ($whiteness > 210) {
            $alpha = (int) ((($whiteness - 210) / 35.0) * 127);
            $color = imagecolorallocatealpha($square, $r, $g, $b, $alpha);
            imagesetpixel($square, $destX + $x, $destY + $y, $color);
        } else {
            $color = imagecolorallocatealpha($square, $r, $g, $b, 0);
            imagesetpixel($square, $destX + $x, $destY + $y, $color);
        }
    }
}

// Function to generate resized PNG/WebP with alpha
function generateFaviconSize($square, $size, $targetPng, $targetWebp = null)
{
    $dim = imagesx($square);
    $out = imagecreatetruecolor($size, $size);
    imagealphablending($out, false);
    imagesavealpha($out, true);
    $trans = imagecolorallocatealpha($out, 0, 0, 0, 127);
    imagefilledrectangle($out, 0, 0, $size, $size, $trans);

    imagecopyresampled($out, $square, 0, 0, 0, 0, $size, $size, $dim, $dim);

    imagepng($out, $targetPng, 9);
    if ($targetWebp) {
        imagewebp($out, $targetWebp, 95);
    }
    imagedestroy($out);
}

// Generate all standard sizes
generateFaviconSize($square, 512, 'c:/laragon/www/rew/public/android-chrome-512x512.png');
generateFaviconSize($square, 192, 'c:/laragon/www/rew/public/android-chrome-192x192.png');
generateFaviconSize($square, 180, 'c:/laragon/www/rew/public/apple-touch-icon.png');
generateFaviconSize($square, 64, 'c:/laragon/www/rew/public/favicon.png', 'c:/laragon/www/rew/public/images/favicon.webp');
generateFaviconSize($square, 32, 'c:/laragon/www/rew/public/favicon-32x32.png');
generateFaviconSize($square, 16, 'c:/laragon/www/rew/public/favicon-16x16.png');

// Also copy 32x32 PNG to favicon.ico (modern browsers accept PNG data in .ico or we create ICO header)
copy('c:/laragon/www/rew/public/favicon-32x32.png', 'c:/laragon/www/rew/public/favicon.ico');

// Also generate full logo.webp (horizontal banner) with transparent background
$logoOut = imagecreatetruecolor($cropW, $cropH);
imagealphablending($logoOut, false);
imagesavealpha($logoOut, true);
$trans = imagecolorallocatealpha($logoOut, 0, 0, 0, 127);
imagefilledrectangle($logoOut, 0, 0, $cropW, $cropH, $trans);

imagealphablending($logoOut, true);
for ($y = 0; $y < $cropH; $y++) {
    for ($x = 0; $x < $cropW; $x++) {
        $rgb = imagecolorat($src, $minX + $x, $minY + $y);
        $r = ($rgb >> 16) & 0xFF;
        $g = ($rgb >> 8) & 0xFF;
        $b = $rgb & 0xFF;

        $whiteness = min($r, $g, $b);
        if ($whiteness > 245) {
            continue;
        } elseif ($whiteness > 210) {
            $alpha = (int) ((($whiteness - 210) / 35.0) * 127);
            $color = imagecolorallocatealpha($logoOut, $r, $g, $b, $alpha);
            imagesetpixel($logoOut, $x, $y, $color);
        } else {
            $color = imagecolorallocatealpha($logoOut, $r, $g, $b, 0);
            imagesetpixel($logoOut, $x, $y, $color);
        }
    }
}
imagewebp($logoOut, 'c:/laragon/www/rew/public/images/logo.webp', 95);
imagepng($logoOut, 'c:/laragon/www/rew/public/images/logo.png');

echo "Favicon and Logo generation complete!\n";
