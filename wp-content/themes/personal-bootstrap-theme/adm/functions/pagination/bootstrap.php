<?php

function bootstrap_pagination(\WP_Query $wp_query = null, $echo = true, $params = [])
{
	if (null === $wp_query) {
		global $wp_query;
	}

	$add_args = [];

	if (isset($_GET['tipo'])) {
		$add_args['tipo'] = (string)$_GET['tipo'];
	}

	$bigint = 999999999;

	$pages = paginate_links(
		array_merge([
			'base'         => str_replace($bigint, '%#%', esc_url(get_pagenum_link($bigint))),
			'format'       => '?paged=%#%',
			'current'      => max(1, get_query_var('paged')),
			'total'        => $wp_query->max_num_pages,
			'type'         => 'array',
			'show_all'     => false,
			'end_size'     => 3,
			'mid_size'     => 1,
			'prev_next'    => true,
			'prev_text'    => __('«'),
			'next_text'    => __('»'),
			'add_args'     => $add_args,
			'add_fragment' => ''
		], $params)
	);

	if (is_array($pages)) {
		$pagination = '<div class="pagination"><ul class="pagination">';

		foreach ($pages as $page) {
			$pagination .= '<li class="page-item' . (strpos($page, 'current') !== false ? ' active' : '') . '"> ' . str_replace('page-numbers', 'page-link', $page) . '</li>';
		}

		$pagination .= '</ul></div>';

		if ($echo) {
			echo $pagination;
		} else {
			return $pagination;
		}
	}

	return null;
}

add_action('template_redirect', function () {
	if (is_singular('cursos')) {
		global $wp_query;
		$page = (int) $wp_query->get('page');
		if ($page > 1) {
			// convert 'page' to 'paged'
			$wp_query->set('page', 1);
			$wp_query->set('paged', $page);
		}
		// prevent redirect
		remove_action('template_redirect', 'redirect_canonical');
	}
}, 0);