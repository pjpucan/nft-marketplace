<!doctype html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title><?= wp_get_document_title(); ?></title>
		<script>document.documentElement.className = document.documentElement.className.replace(/\bno-js\b/, 'js'); var expanded = null; </script>

		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>

	<div class="bg-d-black relative">
		<div class="container">
			<div class="flex items-center justify-between py-4">
				<a class="flex text-white text-2xl items-center">
					<img src="<?=get_stylesheet_directory_uri()?>/assets/images/storefront.png" alt="" class="mr-2">
					<span>NFT Marketplace</span>
				</a>
				<nav>
					<img src="<?=get_stylesheet_directory_uri()?>/assets/images/hamburger.svg" class="block lg:hidden">
					<ul>
						<?php wp_nav_menu(array('theme_location'=>'header-menu','container'=>'', 'items_wrap' => '%3$s')); ?>
					</ul>
				</nav>
			</div>
		</div>
	</div>