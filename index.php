<?php 
require_once __DIR__."/configuration.php";
$configuration = new configuration();

// This is for your website
$configuration->page('', 'index');


// This is For Admin 
$configuration->page('admin', 'admin');
$configuration->call();
