<?php

$imageDay = 'tag.jpg';
$imageNight = 'nacht.jpg';
$lat = 50.83594;
$lon = 12.92330;
$timeZone = new DateTimeZone('Europe/Berlin');

$sunRise = date_sunrise(time(), SUNFUNCS_RET_STRING, $lat, $lon);
$sunSet = date_sunset(time(), SUNFUNCS_RET_STRING, $lat, $lon);
$sunRise = DateTime::createFromFormat('Y-m-d H:i', date('Y-m-d ') . $sunRise);
$sunSet = DateTime::createFromFormat('Y-m-d H:i', date('Y-m-d ') . $sunSet);
$sunRise->setTimezone($timeZone);
$sunSet->setTimezone($timeZone);

$now = new DateTime();
$now->setTimezone($timeZone);
$image = $imageNight;
if ($now >= $sunRise && $now <= $sunSet) {
    $image = $imageDay;
}

header("Content-type: image/jpeg");
readfile($image);
