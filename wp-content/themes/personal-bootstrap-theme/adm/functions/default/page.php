<?php

function ms_page($post_type, $page, $normal = true)
{
	if ($normal) {
		if (is_post_type_archive()) {
			$post_type = get_query_var('post_type');
		}

		if (is_front_page()) {
			$post_type = get_post_type();
			$page = 'home';
		}

		if (is_single()) {
			$post_type = get_post_type();
			$page = 'single';
		}
	}
	// Adicionar filtro de usuário
	$folder = '/adm';

	$arquivo = $folder . '/post-types/' . $post_type . '/' . $page;

	if (!locate_template($arquivo . '.php')) {
		$arquivo = $folder . '/post-types/' . $post_type . '/default';
	}
	get_template_part($arquivo);
}