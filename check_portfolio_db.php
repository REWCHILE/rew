<?php

use App\Models\PortfolioProject;
use Illuminate\Contracts\Console\Kernel;

require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

$projects = PortfolioProject::all();

echo 'Current Portfolio Projects in DB ('.$projects->count()." total):\n";
foreach ($projects as $p) {
    $exists = file_exists(public_path(ltrim($p->featured_image, '/')));
    echo "ID: {$p->id} | Slug: {$p->slug} | Title: {$p->title} | Img: {$p->featured_image} | File exists: ".($exists ? 'YES' : 'NO')."\n";
}
