<?php

$dir = 'c:/laragon/www/rew/public/images/portfolio/';
$files = glob($dir.'*.webp');

foreach ($files as $f) {
    $info = getimagesize($f);
    if ($info) {
        echo basename($f).': '.$info[0].'x'.$info[1]."\n";
    }
}
