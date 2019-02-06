<?php
require __DIR__.'/vendor/autoload.php';

$detect = new \Detection\MobileDetect;
$phone = isset($_GET['phone']) ? $_GET['phone'] : null;
$text = isset($_GET['text']) ? $_GET['text'] : null;

if (!$phone || !$text) {
	http_response_code(400);
	return;
}

// it's a computer
if (!$detect->isMobile() || !$detect->isTablet())
{
	header("Location: https://web.whatsapp.com/send?phone=$phone&text=$text");
} else {
	header("Location: https://api.whatsapp.com/send?phone=$phone&text=$text");
}