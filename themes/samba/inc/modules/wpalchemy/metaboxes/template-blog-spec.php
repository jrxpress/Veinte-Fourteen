<?php

$custom_metabox_temp_port = $simple_mb_temp_port = new WPAlchemy_MetaBox(array
(
	'id' => '_custom_meta_blog_template',
	'title' => 'Blog Template Custom Options',
	'template' => get_template_directory() . '/inc/modules/wpalchemy/metaboxes/template-blog-meta.php',
	'include_template' => array('template_blog.php',
								'template_blog_masonry.php',
								'template_blog_date.php',
								'template_blog_timeline.php') // use an array for multiple items
));
/* eof */