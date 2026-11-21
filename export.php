<?php

require __DIR__ . '/vendor/autoload.php';
$app = require __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$exportDir = __DIR__ . '/dist';
if (is_dir($exportDir)) {
    // Delete old
    $files = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator($exportDir, RecursiveDirectoryIterator::SKIP_DOTS),
        RecursiveIteratorIterator::CHILD_FIRST
    );
    foreach ($files as $fileinfo) {
        $todo = ($fileinfo->isDir() ? 'rmdir' : 'unlink');
        $todo($fileinfo->getRealPath());
    }
    rmdir($exportDir);
}
mkdir($exportDir, 0777, true);

// Copy build directory
function copyDir($src, $dst) {
    if (!is_dir($src)) return;
    @mkdir($dst, 0777, true);
    foreach (scandir($src) as $file) {
        if ($file === '.' || $file === '..') continue;
        if (is_dir("$src/$file")) {
            copyDir("$src/$file", "$dst/$file");
        } else {
            copy("$src/$file", "$dst/$file");
        }
    }
}

copyDir(__DIR__ . '/public/build', "$exportDir/build");
if (is_dir(__DIR__ . '/public/images')) {
    copyDir(__DIR__ . '/public/images', "$exportDir/images");
}
if (is_dir(__DIR__ . '/public/storage')) {
    copyDir(__DIR__ . '/public/storage', "$exportDir/storage");
}
if (file_exists(__DIR__ . '/public/favicon.ico')) {
    copy(__DIR__ . '/public/favicon.ico', "$exportDir/favicon.ico");
}
if (file_exists(__DIR__ . '/public/robots.txt')) {
    copy(__DIR__ . '/public/robots.txt', "$exportDir/robots.txt");
}

file_put_contents("$exportDir/.nojekyll", "");

$baseUrl = 'http://127.0.0.1:8005';
$urlsToCrawl = [
    '/' => 'index.html',
    '/projects' => 'projects/index.html',
    '/blog' => 'blog/index.html',
];

// Fetch projects
foreach (\App\Models\Project::all() as $project) {
    $urlsToCrawl['/projects/' . $project->slug] = 'projects/' . $project->slug . '/index.html';
}

// Fetch blogs
foreach (\App\Models\Post::all() as $post) {
    $urlsToCrawl['/blog/' . $post->slug] = 'blog/' . $post->slug . '/index.html';
}

echo "Total URLs to crawl: " . count($urlsToCrawl) . PHP_EOL;

foreach ($urlsToCrawl as $path => $destFile) {
    $fullUrl = $baseUrl . $path;
    $html = @file_get_contents($fullUrl);
    if ($html === false) {
        echo "Failed to fetch: $fullUrl" . PHP_EOL;
        continue;
    }

    // Replace absolute localhost URLs with base path for GitHub Pages (/portfolio/)
    // We also make sure build/assets URLs are properly referenced.
    $html = str_replace(
        ['http://127.0.0.1:8005/build/', 'http://127.0.0.1:8005/images/', 'http://127.0.0.1:8005/storage/', 'http://127.0.0.1:8005/'],
        ['/portfolio/build/', '/portfolio/images/', '/portfolio/storage/', '/portfolio/'],
        $html
    );

    // Also handle relative references if any
    $html = str_replace(
        ['href="/build/', 'src="/build/', 'href="/images/', 'src="/images/', 'href="/storage/', 'src="/storage/'],
        ['href="/portfolio/build/', 'src="/portfolio/build/', 'href="/portfolio/images/', 'src="/portfolio/images/', 'href="/portfolio/storage/', 'src="/portfolio/storage/'],
        $html
    );

    // Remove broken Livewire 404 scripts on static export
    $html = preg_replace('#<script src="[^"]*livewire[^"]*"[^>]*></script>#i', '', $html);

    // Inject Alpine.js and Lucide Icons CDN so mobile menu, icons, and interactions work 100% on static export
    $headInject = <<<HTML
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.8/dist/cdn.min.js"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
</head>
HTML;
    $html = str_replace('</head>', $headInject, $html);

    // Inject WhatsApp submit handler for static contact form and initialize Lucide icons
    $contactScript = <<<HTML
<script>
document.addEventListener('DOMContentLoaded', function() {
    if (window.lucide) {
        lucide.createIcons();
    }
    var form = document.querySelector('form');
    if (form) {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            var inputs = form.querySelectorAll('input');
            var textarea = form.querySelector('textarea');
            var name = inputs[0] ? inputs[0].value : '';
            var email = inputs[1] ? inputs[1].value : '';
            var subject = inputs[2] ? inputs[2].value : '';
            var message = textarea ? textarea.value : '';
            
            var text = "Hello Ashika!%0A*Name:* " + encodeURIComponent(name) + "%0A*Email:* " + encodeURIComponent(email) + "%0A*Subject:* " + encodeURIComponent(subject) + "%0A*Message:* " + encodeURIComponent(message);
            window.open("https://wa.me/8801938267920?text=" + text, "_blank");
        });
    }
});
</script>
</body>
HTML;
    $html = str_replace('</body>', $contactScript, $html);

    $destPath = "$exportDir/$destFile";
    @mkdir(dirname($destPath), 0777, true);
    file_put_contents($destPath, $html);
    echo "Saved: $destFile (" . strlen($html) . " bytes)" . PHP_EOL;
}

// Create 404.html copying index.html so SPA / refresh doesn't break
copy("$exportDir/index.html", "$exportDir/404.html");

echo "Export completed successfully to $exportDir" . PHP_EOL;
