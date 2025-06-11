<?php
// روابط القنوات
$channels = [
  "bein1" => "https://tv.sainaertebat.com/hls2/bein1.m3u8",
  "bein2" => "https://abcc.yallashooot.store:8181/bein2/index.m3u8"
];

// جلب اسم القناة من الرابط
$name = $_GET['name'] ?? '';

// التحقق إن القناة موجودة
if (!isset($channels[$name])) {
  http_response_code(404);
  exit("القناة غير موجودة.");
}

// جلب رابط القناة الحقيقي
$url = $channels[$name];

// قراءة محتوى البث من المصدر
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
$data = curl_exec($ch);
$contentType = curl_getinfo($ch, CURLINFO_CONTENT_TYPE);
curl_close($ch);

// إرسال نوع المحتوى m3u8
header("Content-Type: $contentType");
echo $data;