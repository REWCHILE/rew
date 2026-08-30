<?php

$portfolioDir = 'c:/laragon/www/rew/public/images/portfolio/';
if (! is_dir($portfolioDir)) {
    mkdir($portfolioDir, 0755, true);
}

$items = [
    'los_autenticos_decadentes' => [
        'url' => 'http://rew.local/wp-content/uploads/2025/03/FireShot-Capture-012-Los-Autenticos-Decadentes-%E2%80%93-Merch-Web-Oficial-sotemono.com_.png',
        'slug' => 'los-autenticos-decadentes',
    ],
    'jj_estetica' => [
        'url' => 'http://rew.local/wp-content/uploads/2025/03/FireShot-Capture-017-Home-JJ-ESTETICA-jjestetica.cl_.png',
        'slug' => 'jj-estetica',
    ],
    'sotemono' => [
        'url' => 'http://rew.local/wp-content/uploads/2025/03/FireShot-Capture-010-HOME-Sotemono-Merch-Web-Oficial-sotemono.com_.png',
        'slug' => 'sotemono',
    ],
    'papel_seda' => [
        'url' => 'http://rew.local/wp-content/uploads/2025/03/FireShot-Capture-009-PAPEL-SEDA-%E2%80%93-PAPEL-DE-CALIDAD-papelseda.cl_.png',
        'slug' => 'papel-seda',
    ],
    'patagonia_shelter' => [
        'url' => 'http://rew.local/wp-content/uploads/2025/03/FireShot-Capture-006-Inicio-PATAGONIA-SHELTER-patagoniashelter.com_.png',
        'slug' => 'patagonia-shelter',
    ],
    'mercado_patache' => [
        'url' => 'http://rew.local/wp-content/uploads/2025/03/FireShot-Capture-008-Mercado-Patache-%E2%80%93-Mercado-Gourmet-mercadopatache.com_.png',
        'slug' => 'mercado-patache',
    ],
    'cumbres_de_frutillar' => [
        'url' => 'http://rew.local/wp-content/uploads/2025/03/FireShot-Capture-007-HOME-CUMBRES-DE-FRUTILLAR-cumbresdefrutillar.cl_.png',
        'slug' => 'cumbres-de-frutillar',
    ],
    'barrio_bravo' => [
        'url' => 'http://rew.local/wp-content/uploads/2025/03/FireShot-Capture-013-Barrio-Bravo-Merch-Oficial-2022-sotemono.com_.png',
        'slug' => 'barrio-bravo',
    ],
    'matias_chinaski' => [
        'url' => 'http://rew.local/wp-content/uploads/2025/03/FireShot-Capture-016-Matias-Chinaski-%E2%80%93-Merch-Web-Oficial-sotemono.com_.png',
        'slug' => 'matias-chinaski',
    ],
    'academiaflix' => [
        'url' => 'http://rew.local/wp-content/uploads/2025/03/FireShot-Capture-003-Academiaflix-academiaflix.rew_.cl_.png',
        'slug' => 'academiaflix',
    ],
    'otro_dia_en_la_oficina' => [
        'url' => 'http://rew.local/wp-content/uploads/2025/03/FireShot-Capture-018-Otro-dia-en-la-oficina-Modelo-Sapiens-otrodiaenlaoficina.cl_.png',
        'slug' => 'otro-dia-en-la-oficina',
    ],
    'codigo_25' => [
        'url' => 'http://rew.local/wp-content/uploads/2025/03/FireShot-Capture-019-CODIGO-25-%E2%80%93-UNA-NUEVA-MARCA-PARA-PROFESIONALES-codigo25.cl_.png',
        'slug' => 'codigo-25',
    ],
    'artifices_tv' => [
        'url' => 'http://rew.local/wp-content/uploads/2025/03/FireShot-Capture-020-ARTIFICES-TV-%E2%80%93-EXPERTOS-EN-STREAMING-Y-CONECTIVIDAD-artifices.tv_.png',
        'slug' => 'artifices-tv',
    ],
];

$ctx = stream_context_create([
    'http' => [
        'timeout' => 8,
    ],
]);

foreach ($items as $key => $info) {
    $url = $info['url'];
    $targetWebp = $portfolioDir.$key.'.webp';
    $targetPng = $portfolioDir.$key.'.png';

    echo "Fetching $key from $url...\n";
    $data = @file_get_contents($url, false, $ctx);

    if ($data !== false && strlen($data) > 1000) {
        file_put_contents($targetPng, $data);
        $im = @imagecreatefrompng($targetPng);
        if ($im) {
            imagewebp($im, $targetWebp, 90);
            imagedestroy($im);
            echo "  -> SUCCESS: Converted to {$key}.webp (".filesize($targetWebp)." bytes)\n";
        } else {
            echo "  -> Error converting PNG to WebP for $key\n";
        }
    } else {
        echo "  -> FAILED to download from URL: $url\n";
    }
}

echo "\nFinished downloading portfolio captures!\n";
