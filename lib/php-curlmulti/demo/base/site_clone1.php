<?php
require_once '../vendor/autoload.php';
use Ares333\CurlMulti\AutoClone;
$url = array (
		'https://caferati.me' => array (
				'/' => null
		)
);
$dir = __DIR__ . '/static';
$cacheDir = __DIR__ . '/cache';
if (! file_exists ( $dir )) {
	mkdir ( $dir );
}
if (! file_exists ( $cacheDir )) {
	mkdir ( $cacheDir );
}
$clone = new AutoClone ( $url, $dir );
$clone->overwrite = true;
$clone->getCurl ()->maxThread = 3;
$clone->getCurl ()->cache ['enable'] = true;
$clone->getCurl ()->cache ['enableDownload'] = true;
$clone->getCurl ()->cache ['dir'] = $cacheDir;
$clone->getCurl ()->cache ['compress'] = true;
$clone->start ();