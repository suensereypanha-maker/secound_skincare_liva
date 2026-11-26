<?php

use App\Services\ProductCatalog;
use Illuminate\Contracts\Http\Kernel;
use Illuminate\Http\Request;

require __DIR__.'/../vendor/autoload.php';

$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Kernel::class);

$base = '/secound_skincare_liva';
$outputArg = $argv[1] ?? '_site';
$outputDir = str_starts_with($outputArg, '/')
    ? rtrim($outputArg, '/')
    : rtrim(__DIR__.'/../'.$outputArg, '/');

if (! is_dir($outputDir)) {
    mkdir($outputDir, 0777, true);
}

function transformForGitHubPages(string $html, string $base): string
{
    // Remove local browser logger injected by boost dev tools
    $html = preg_replace('/<script id="browser-logger-active">[\s\S]*?<\/script>/', '', $html);

    // Fix build assets (both localhost absolute and root relative)
    $html = str_replace('http://localhost/build/', $base.'/build/', $html);
    $html = str_replace('"/build/', '"'.$base.'/build/', $html);
    $html = str_replace("'/build/", "'".$base.'/build/', $html);

    // Fix image assets
    $html = str_replace('http://localhost/img/', $base.'/img/', $html);
    $html = str_replace('"/img/', '"'.$base.'/img/', $html);
    $html = str_replace("'/img/", "'".$base.'/img/', $html);

    // Fix products catalog links (preserve optional query string)
    $html = preg_replace('/href="(?:https?:\/\/localhost)?\/products(\?[^"]*)?"/', 'href="'.$base.'/products/$1"', $html);
    $html = preg_replace("/href='(?:https?:\/\/localhost)?\/products(\?[^']*)?'/", "href='".$base."/products/$1'", $html);

    // Fix about & contact links
    $html = preg_replace('/href="(?:https?:\/\/localhost)?\/about\/?"/', 'href="'.$base.'/about/"', $html);
    $html = preg_replace('/href="(?:https?:\/\/localhost)?\/contact\/?"/', 'href="'.$base.'/contact/"', $html);

    // Fix product detail links
    $html = preg_replace('/href="(?:https?:\/\/localhost)?\/product\/([^"#\?\/]+)\/?"/', 'href="'.$base.'/product/$1/"', $html);
    $html = preg_replace("/href='(?:https?:\/\/localhost)?\/product\/([^'#\?\/]+)\/?'/", "href='".$base."/product/$1/'", $html);

    // Fix collection and anchor links starting with /#
    $html = str_replace(['href="http://localhost/#', 'href="/#'], 'href="'.$base.'/#', $html);
    $html = str_replace(["href='http://localhost/#", "href='/#"], "href='".$base.'/#', $html);

    // Fix root links
    $html = str_replace(['href="http://localhost"', 'href="http://localhost/"', 'href="/"'], 'href="'.$base.'/"', $html);
    $html = str_replace(["href='http://localhost'", "href='http://localhost/'", "href='/'"], "href='".$base."/'", $html);

    return $html;
}

function exportRoute(Kernel $kernel, string $uri, string $targetFile, string $base): void
{
    $dir = dirname($targetFile);
    if (! is_dir($dir)) {
        mkdir($dir, 0777, true);
    }

    $request = Request::create($uri, 'GET');
    $response = $kernel->handle($request);
    $html = transformForGitHubPages($response->getContent(), $base);
    file_put_contents($targetFile, $html);
}

echo "1. Exporting Home, Catalog, About & Contact Pages to {$outputDir}...\n";
exportRoute($kernel, '/', $outputDir.'/index.html', $base);
copy($outputDir.'/index.html', $outputDir.'/404.html');
exportRoute($kernel, '/products', $outputDir.'/products/index.html', $base);
exportRoute($kernel, '/about', $outputDir.'/about/index.html', $base);
exportRoute($kernel, '/contact', $outputDir.'/contact/index.html', $base);

echo "2. Exporting Product Detail Pages...\n";
$products = ProductCatalog::all();
foreach ($products as $p) {
    $id = $p['id'];
    exportRoute($kernel, '/product/'.$id, $outputDir.'/product/'.$id.'/index.html', $base);
    echo "  - product/{$id}/index.html\n";
}

echo "3. Copying static assets (build & img)...\n";
$copyDir = function (string $src, string $dst) use (&$copyDir): void {
    if (! is_dir($src)) {
        return;
    }
    $dir = opendir($src);
    @mkdir($dst, 0777, true);
    while (false !== ($file = readdir($dir))) {
        if ($file !== '.' && $file !== '..') {
            if (is_dir($src.'/'.$file)) {
                $copyDir($src.'/'.$file, $dst.'/'.$file);
            } else {
                copy($src.'/'.$file, $dst.'/'.$file);
            }
        }
    }
    closedir($dir);
};

$copyDir(__DIR__.'/../public/build', $outputDir.'/build');
$copyDir(__DIR__.'/../public/img', $outputDir.'/img');
file_put_contents($outputDir.'/.nojekyll', '');
echo "✓ Export complete in {$outputDir}\n";
