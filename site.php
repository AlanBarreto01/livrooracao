<?php

use \Hcode\Page;
use \Hcode\Model\User;
use \Hcode\Model\Product;

$app->get('/', function() {
    
    $product = Product::listAll();
    
	$page = new Page();

	$page->setTpl("index", [
		'products'=>Product::checkList($products)
	]);

});

$app->post('/login', function() {

    
	$page = new Page();

	$page->setTpl("login");

});
