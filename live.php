<?php
// استقبال اسم القناة من الرابط
$name = $_GET['name'] ?? '';

// قائمة القنوات وربطها بروابط M3U8 الحقيقية
$channels = [
    'bein1' => 'https://abcc.yallashooot.store:8181/bein3/index.m3u8',
    'bein2' => 'https://abcc.yallashooot.store:8181/bein2/index.m3u8',
    'bein3' => 'https://abcc.yallashooot.store:8181/bein3/index.m3u8',
    'bein4' => 'https://abcc.yallashooot.store:8181/bein4/index.m3u8',
    'bein5' => 'https://abcc.yallashooot.store:8181/bein5/index.m3u8',
];

// لو القناة موجودة في القائمة، نعرض رابط M3U8 مباشر
if (array_key_exists($name, $channels)) {
    header("Content-Type: application/vnd.apple.mpegurl");
    header("Location: " . $channels[$name]);
    exit;
} else {
    // لو مش موجودة
    http_response_code(404);
    echo "القناة غير موجودة.";
}
?>