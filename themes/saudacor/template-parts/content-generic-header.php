<?php 
$title = strstr( wp_title(" | ", false, right), " | ", true );

// Set bg
$addionalClass = '';
if (is_search())
	$addionalClass = 'search-bg';

if (get_post_type() == 'events')
	$addionalClass = 'events-bg';

if (get_post_type() == 'projects')
	$addionalClass = 'projects-bg';

 ?>
<header class="generic-bg <?php echo $addionalClass; ?>">
	<h1><?php echo $title; ?></h1>
</header>