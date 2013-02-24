<?php
include(dirname(__FILE__).'/../../bootstrap/Propel.php');

function create_category($name)
{
	$category = new JobeetCategory(); 
	$category->setName($name);

	return $category;
}

$t = new lime_test(3);

$category = create_category('Web developer');

$t->is($category->getSlug(),'web-developer',  '->getSlug() transform the name to a slug');


$category->setName('Project manager'); 
$t->is($category->getSlug(),'project-manager',  '->setName() update the slug when the category name is updated');


