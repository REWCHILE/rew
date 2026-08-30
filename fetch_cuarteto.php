<?php

$url = 'http://rew.local/wp-content/uploads/2025/03/FireShot-Capture-014-CUARTETO-DE-NOS-Cuarteto-de-Nos-Merch-Web-Oficial-sotemono.com_.png';

echo "Attempting to fetch from $url...\n";

$ctx = stream_context_create([
    'http' => [
        'timeout' => 5,
    ],
]);

$data = @file_get_contents($url, false, $ctx);

if ($data !== false && strlen($data) > 1000) {
    file_put_contents('c:/laragon/www/rew/public/images/portfolio/cuarteto_de_nos.png', $data);

    // Convert to WebP
    $im = imagecreatefrompng('c:/laragon/www/rew/public/images/portfolio/cuarteto_de_nos.png');
    if ($im) {
        imagewebp($im, 'c:/laragon/www/rew/public/images/portfolio/cuarteto_de_nos.webp', 90);
        imagedestroy($im);
        echo "SUCCESS: Fetched and converted to cuarteto_de_nos.webp!\n";
        exit;
    }
}

echo "Could not fetch from http://rew.local directly. Searching local filesystem...\n";

// Search in common local folders
$searchPaths = [
    'c:/laragon/www/',
    'c:/laragon/www/rew/',
    'C:/Users/abak_/Downloads/',
    'C:/Users/abak_/Pictures/',
];

foreach ($searchPaths as $sp) {
    if (is_dir($sp)) {
        $files = glob($sp.'*Cuarteto*.*');
        if (! empty($files)) {
            echo "Found files in $sp: ".implode(', ', $files)."\n";
        }
    }
}
