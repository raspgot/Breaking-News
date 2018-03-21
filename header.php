<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <?php wp_head() ?>

</head>
<body>

<!-- header container -->
<div class="container">

	<!-- Header -->
	<header class="blog-header py-3">
		<div class="row flex-nowrap justify-content-between align-items-center">

			<!-- user navigation -->
			<div class="col-4 pt-1">
				<a class="text-muted" href="#">Subscribe</a>
			</div>

			<!-- Blog title -->
			<div class="col-4 text-center">
				<h1 class="blog-header-logo text-dark">
					<img src="<?= get_image("logo.png") ?>" alt="<?= get_bloginfo() ?>">
				</h1>
			</div>

			<!-- Switch lang -->
			<div class="col-4 d-flex justify-content-end align-items-center">

				<div class="btn-group">
					<a data-toggle="dropdown" class="dropdown-toggle"><?= pll_current_language("name") ?></a>
					<div class="dropdown-menu">
						
						<?php foreach(get_languages() as $slug => $name): ?>
						<a href="<?= is_home() ? pll_home_url($slug) : get_route(get_the_ID(), $slug) ?>" class="dropdown-item"><?= $name ?></a>
						<?php endforeach; ?>

					</div>
				</div>

			</div>
		</div>
	</header>
	<!-- end header -->

	<!-- Main navigation -->
	<div class="nav-scroller py-1 mb-2">
		<nav class="nav d-flex justify-content-between">

			<?php foreach( get_menu_by_slug("main-menu") as $item ): ?>
			<a class="p-2 text-muted" href="<?= $item->url ?>"><?= $item->title ?></a>
			<?php endforeach; ?>

		</nav>
	</div>
	<!-- end Main navigation -->

</div>
<!-- end header container -->

<main role="main" class="container">

<?= __("This is the best Breaking News Website", "breaknews") ?>