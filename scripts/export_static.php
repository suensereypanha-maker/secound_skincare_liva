<?php

require __DIR__ . '/../vendor/autoload.php';

$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$base = '/secound_skincare_liva';

function transformForGitHubPages(string $html, string $base): string
{
    // Remove local browser logger injected by boost dev tools
    $html = preg_replace('/<script id="browser-logger-active">[\s\S]*?<\/script>/', '', $html);

    // Fix build assets (both localhost absolute and root relative)
    $html = str_replace('http://localhost/build/', $base . '/build/', $html);
    $html = str_replace('"/build/', '"' . $base . '/build/', $html);
    $html = str_replace("'/build/", "'" . $base . '/build/', $html);
    
    // Fix image assets
    $html = str_replace('http://localhost/img/', $base . '/img/', $html);
    $html = str_replace('"/img/', '"' . $base . '/img/', $html);
    $html = str_replace("'/img/", "'" . $base . '/img/', $html);

    // Fix product links
    $html = preg_replace('/href="\/product\/([^"#\?]+)"/', 'href="' . $base . '/product/$1/"', $html);
    $html = preg_replace("/href='\/product\/([^'#\?]+)'/", "href='" . $base . "/product/$1/'", $html);

    // Fix root link
    $html = str_replace('href="/"', 'href="' . $base . '/"', $html);
    $html = str_replace("href='/'", "href='" . $base . "/'", $html);

    // Fix collection and anchor links starting with /#
    $html = str_replace('href="/#', 'href="' . $base . '/#', $html);
    $html = str_replace("href='/#", "href='" . $base . "/#", $html);

    return $html;
}

echo "1. Exporting Home Page (index.html)...\n";
$request = Illuminate\Http\Request::create('/', 'GET');
$response = $kernel->handle($request);
$homeHtml = transformForGitHubPages($response->getContent(), $base);
file_put_contents(__DIR__ . '/../index.html', $homeHtml);
file_put_contents(__DIR__ . '/../404.html', $homeHtml);
echo "✓ index.html and 404.html written.\n";

echo "2. Exporting Product Pages...\n";
$products = App\Services\ProductCatalog::all();
foreach ($products as $p) {
    $id = $p['id'];
    $dir = __DIR__ . '/../product/' . $id;
    if (!is_dir($dir)) {
        mkdir($dir, 0777, true);
    }
    $req = Illuminate\Http\Request::create('/product/' . $id, 'GET');
    $res = $kernel->handle($req);
    $prodHtml = transformForGitHubPages($res->getContent(), $base);
    file_put_contents($dir . '/index.html', $prodHtml);
    echo "  - product/{$id}/index.html\n";
}

echo "3. Copying static assets (build & img)...\n";
$copyDir = function($src, $dst) use (&$copyDir) {
    $dir = opendir($src);
    @mkdir($dst, 0777, true);
    while (false !== ($file = readdir($dir))) {
        if (($file != '.') && ($file != '..')) {
            if (is_dir($src . '/' . $file)) {
                $copyDir($src . '/' . $file, $dst . '/' . $file);
            } else {
                copy($src . '/' . $file, $dst . '/' . $file);
            }
        }
    }
    closedir($dir);
};

$copyDir(__DIR__ . '/../public/build', __DIR__ . '/../build');
$copyDir(__DIR__ . '/../public/img', __DIR__ . '/../img');
file_put_contents(__DIR__ . '/../.nojekyll', '');
echo "✓ .nojekyll, build/, and img/ ready for GitHub Pages.\n";
echo "Done!\n";
