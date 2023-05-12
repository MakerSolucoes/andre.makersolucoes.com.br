<?php

function ms_ajax_search()
{
	$field['search'] = $_POST['data']['search'];
	$field['select'] = $_POST['data']['select'];
	echo '<ul class="list-group">';
	if (empty($field['search']) && empty($field['select'])) {
		echo '</ul>';
		die();
	}
	echo '<li class="list-group-item d-flex justify-content-between align-items-center">ID - Nome do Aluno | Email | Status Geral </li>';
	if (!empty($field['search'])) {
		if (is_numeric($_POST['data']['search'])) {
			$aluno['data'] = get_userdata($_POST['data']['search']);
			if ($_POST['data']['search'] != 0) {
				$validate = ms_doc_validate($_POST['data']['search']);
				echo '<li class="list-group-item d-flex justify-content-between align-items-center"><a href="' . get_permalink($validate['id']) . '" target="_blank">' . $aluno['data']->ID . ' - ' . $aluno['data']->user_firstname . ' ' . $aluno['data']->user_lastname . ' | ' . $aluno['data']->user_email . ' | ' . $validate['title'] . '</a></li>';
			}
		} else {
			$wp_user_query = new WP_User_Query(
				array(
					'search' => "*{$field['search']}*",
					'search_columns' => array(
						'user_login',
						'user_nicename',
						'user_email',
					),

				)
			);
			$users = $wp_user_query->get_results();
			if (!empty($users)) {
				foreach ($users as $user) {
					$validate = ms_doc_validate($user->data->ID);
					$aluno['data'] = get_userdata(get_field('aluno', $validate['id']));
					if (!$field['select'] == 0) {
						if ($field['select'] == $validate['status']) {
							echo '<li class="list-group-item d-flex justify-content-between align-items-center"><a href="' . get_permalink($validate['id']) . '" target="_blank">' . $aluno['data']->ID . ' - ' . $aluno['data']->user_firstname . ' ' . $aluno['data']->user_lastname . ' | ' . $aluno['data']->user_email . ' | ' . $validate['title'] . '</a></li>';
						} else {
							echo '<li class="list-group-item d-flex justify-content-between align-items-center">Nenhum resultado foi encontrado na sua busca de: ' . $field['search'] . ' com o status selecionado</li>';
						}
						die();
					}
					echo '<li class="list-group-item d-flex justify-content-between align-items-center"><a href="' . get_permalink($validate['id']) . '" target="_blank">' . $aluno['data']->ID . ' - ' . $aluno['data']->user_firstname . ' ' . $aluno['data']->user_lastname . ' | ' . $aluno['data']->user_email . ' | ' . $validate['title'] . '</a></li>';
					die();
				}
			} else {
				echo '<li class="list-group-item d-flex justify-content-between align-items-center">Nenhum resultado foi encontrado na sua busca de: ' . $field['search'] . '</li>';
				die();
			}
		}
	}
	if (!empty($field['select'])) {
		$wp_query = new WP_Query(array(
			'post_type' => 'documentos',
			'orderby' => 'id',
			'order' => 'asc',
			'posts_per_page' => 1,
			'nopaging' => true,
			'meta_query' => array(
				array('key' => 'status', 'value' => $field['select'], 'compare' => '=='),
			)
		));

		if ($wp_query->have_posts()) : while ($wp_query->have_posts()) : $wp_query->the_post();
				$aluno['id'] = get_field('aluno');
				$validate = ms_doc_validate($aluno['id']);
				$aluno['data'] = get_userdata($aluno['id']);
				echo '<li class="list-group-item d-flex justify-content-between align-items-center"><a href="' . get_permalink($validate['id']) . '" target="_blank">' . $aluno['data']->ID . ' - ' . $aluno['data']->user_firstname . ' ' . $aluno['data']->user_lastname . ' | ' . $aluno['data']->user_email . ' | ' . $validate['title'] . '</a></li>';
			endwhile;
		endif;
	}
	echo '</ul>';
	die();
}
add_action('wp_ajax_nopriv_ms_ajax_search', 'ms_ajax_search');
add_action('wp_ajax_ms_ajax_search', 'ms_ajax_search');