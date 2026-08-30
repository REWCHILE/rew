<?php

require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

use App\Models\PortfolioProject;
use Illuminate\Contracts\Console\Kernel;

// Delete duplicate/old slugs
$staleSlugs = [
    'autenticos-decadentes',
    'codigo25',
    'jjestetica',
    'venta-de-paltas', // if no real photo
];

foreach ($staleSlugs as $slug) {
    PortfolioProject::where('slug', $slug)->delete();
    echo "Deleted stale slug: $slug\n";
}

$all = PortfolioProject::all();
echo "\nCleaned Projects Count: ".$all->count()."\n";
foreach ($all as $p) {
    echo " - ID: {$p->id} | Slug: {$p->slug} | Img: {$p->featured_image}\n";
}
