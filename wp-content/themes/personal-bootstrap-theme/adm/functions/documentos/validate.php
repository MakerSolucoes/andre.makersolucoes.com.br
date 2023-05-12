<?php
function ms_doc_validate($id_user, $status = false)
{
	$wp_query = new WP_Query(array(
		'post_type' => 'documentos',
		'orderby' => 'id',
		'order' => 'asc',
		'posts_per_page' => 1,
		'nopaging' => true,
		'meta_query' => array(
			array('key' => 'aluno', 'value' => $id_user, 'compare' => '=='),
		)
	));

	if ($wp_query->have_posts()) : while ($wp_query->have_posts()) : $wp_query->the_post();
			$doc['id'] = get_the_ID();
			$doc['aluno'] = get_field('aluno');
			$doc['status'] = get_field('status');
			if (!$status == false) {
				$doc['status'] = $status;
			}
			$date = date('d-m-Y');
			switch ($doc['status']['value']) {
				case '3':
					$data = array(
						'id' => $doc['id'],
						'status' => 3,
						'title' => $doc['status']['label'] . ' - ' . $date,
						'creation' => false,
						'acess' => true,
						'color' => 'link-success',
						'background' => 'bg-success',
						'text-color' => 'text-white',
					);
					return $data;
					break;
				case '2':
					$data = array(
						'id' => $doc['id'],
						'status' => 2,
						'title' => $doc['status']['label'],
						'creation' => false,
						'color' => 'link-danger',
						'background' => 'bg-warning',
					);
					return $data;
				case '1' | true:
					$data = array(
						'id' => $doc['id'],
						'status' => 1,
						'title' => $doc['status']['label'],
						'creation' => false,
						'color' => 'link-info',
					);
					return $data;
				default:
					$data = array(
						'id' => $doc['id'],
						'status' => 1,
						'title' => 'Em análise',
						'creation' => false,
						'color' => 'link-info',
					);

					return $data;
					break;
			}
		endwhile;
	elseif (!$wp_query->have_posts()) :
		$data = array(
			'title' => 'Aguardando Análise',
			'creation' => true
		);
		return $data;

	endif;
}

function ms_wait_doc($post_id = false)
{
	$a = 0;
	$d = 0;
	$f = '';
	$wp_query = new WP_Query(array(
		'post_type' => 'documentos',
		'orderby' => 'id',
		'order' => 'asc',
		'posts_per_page' => -1,
		'nopaging' => true,
		'meta_query' => array(
			array('key' => 'status', 'value' => '3', 'compare' => '!='),
		)
	));
	if (!$post_id == false) {
		$wp_query = new WP_Query(array(
			'post_type' => 'documentos',
			'p' => $post_id,
		));
	}
	if ($wp_query->have_posts()) : while ($wp_query->have_posts()) : $wp_query->the_post();
			$doc['status'] = get_field('status');
			$doc['ident_status'] = get_field('ident_status');
			$doc['cert_status'] = get_field('cert_status');
			$doc['grd_status'] = get_field('grd_status');
			if ($doc['status'] != 3) {
				if ($doc['ident_status'] != 3) {
					$d++;
					$f .= '<br>Identificação';
				}
				if ($doc['cert_status'] != 3) {
					$d++;
					$f .= '<br>Certidão';
				}
				if ($doc['grd_status'] != 3) {
					$d++;
					$f .= '<br>Graduação';
				}
				$a++;
			}
		endwhile;
	endif;
	$data['alunos'] = $a;
	$data['documentos'] = $d;
	$data['fields'] = $f;
	return $data;
}
function verify_status_subfields($id)
{
	$field['ident_status'] = get_field('ident_status', $id);
	$field['cert_status'] = get_field('cert_status', $id);
	$field['grd_status'] = get_field('grd_status', $id);
	if ($field['ident_status'] && $field['cert_status'] && $field['grd_status']) {
		update_field('status', '3', $id);
	}
}