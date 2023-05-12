<?php
function submitForm($post, $files, $resend = false)
{

	$aluno['id'] = get_userdata(USER_ID);
	$aluno['validate'] = ms_doc_validate($aluno['id']->ID);

	$ms['doc-1'] = $post['IdentificationDoc'];
	$ms['cpf'] = $post['cpf'];
	$ms['doc-2'] = $post['CertificateDoc'];
	$ms['doc-3'] = $post['classCertiticate'];
	$ms['aluno'] = $post['id_aluno'];

	if ($ms['aluno']) {
		$aluno['id'] = get_userdata($ms['aluno']);
		$aluno['validate'] = ms_doc_validate($ms['aluno']);
	}

	if ($aluno['validate']['creation']) {
		$post['id'] = create_doc_user_post($aluno['id'], $ms);
	} else {
		$post['id'] = $aluno['validate']['id'];
	}

	$dir['basedir'] = wp_upload_dir()['basedir'] . '/' . date('Y') . '/doc/' . $aluno['id']->ID . '/';
	$dir['baseurl'] = wp_upload_dir()['baseurl'] . '/' . date('Y') . '/doc/' . $aluno['id']->ID . '/';

	if ($resend) {
		$dir['basedir'] = wp_upload_dir()['basedir'] . '/' . date('Y') . '/doc/' . $aluno['id']->ID . '/new/';
		$dir['baseurl'] = wp_upload_dir()['baseurl'] . '/' . date('Y') . '/doc/' . $aluno['id']->ID . '/new/';
		update_field('status', 1, $post['id']);
	}

	if (!file_exists($dir['basedir'])) {
		mkdir($dir['basedir'], 0755, true);
		mkdir($dir['basedir'] . 'identificacao', 0755, true);
		mkdir($dir['basedir'] . 'certidao', 0755, true);
		mkdir($dir['basedir'] . 'graduacao', 0755, true);
	}

	foreach ($files as $key => $file) {
		if (!empty($file['name'])) {
			$data = ms_file_name_generate($ms, $key, $file['type']);
			$url['basedir'] = $dir['basedir'] . $data['url'];
			$url['baseurl'] = $dir['baseurl'] . $data['url'];
			if (move_uploaded_file($file["tmp_name"], $url['basedir'] . $data['file_name'])) {
				ms_update_file_adm($data['file_name'], $url['baseurl'], $post['id']);
			} else {
				echo "Erro, o arquivo n&atilde;o pode ser enviado.<br>";
			}
		}
	}
}

function ms_update_adm($get, $id)
{
	foreach ($get as $key => $value) {
		if (!$value == 0) {
			update_field($key, $value, $id);
		}
	}
	if ($get['ident_status'] == 3 && $get['cert_status'] == 3 && $get['grd_status'] == 3) {
		update_field('status', 3, $id);
	}
}

function ms_update_file_adm($file_name, $url, $id)
{

	$extension = substr($file_name, -3);

	switch ($file_name) {
		case 'rg-F.' . $extension:
			update_field('ident_frente', $url . $file_name, $id);
			update_field('ident_status', '1', $id);
			break;
		case 'rg-V.' . $extension:
			update_field('ident_verso', $url . $file_name, $id);
			update_field('ident_status', '1', $id);
			break;
		case 'cnh-F.' . $extension:
			update_field('ident_frente', $url . $file_name, $id);
			update_field('ident_status', '1', $id);
			break;
		case 'cnh-V.' . $extension:
			update_field('ident_verso', $url . $file_name, $id);
			update_field('ident_status', '1', $id);
			break;
		case 'CPF-F.' . $extension:
			update_field('cpf_frente', $url . $file_name, $id);
			update_field('ident_status', '1', $id);
			break;
		case 'certidao-nascimento-F.' . $extension:
			update_field('cert_frente', $url . $file_name, $id);
			update_field('cert_status', '1', $id);
			break;
		case 'certidao-casamento-F.' . $extension:
			update_field('cert_frente', $url . $file_name, $id);
			update_field('cert_status', '1', $id);
			break;
		case 'certificado-conclusao-F.' . $extension:
			update_field('grd_frente', $url . $file_name, $id);
			update_field('grd_status', '1', $id);
			break;
		case 'certificado-conclusao-V.' . $extension:
			update_field('grd_verso', $url . $file_name, $id);
			update_field('grd_status', '1', $id);
			break;
		case 'diploma-F.' . $extension:
			update_field('grd_frente', $url . $file_name, $id);
			update_field('grd_status', '1', $id);
			break;
		case 'diploma-V.' . $extension:
			update_field('grd_verso', $url . $file_name, $id);
			update_field('grd_status', '1', $id);
			break;
	}
}

function create_doc_user_post($aluno, $data)
{
	$validate = ms_doc_validate($aluno->data->ID);
	if ($validate['creation'] == true) {
		$post['title'] =  $aluno->data->ID . ' - ' . $aluno->data->user_email . ' - ' . $aluno->data->display_name . ' - ' . $validate['title'];
		$args = array(
			'post_type'   => 'documentos',
			'post_title'    => $post['title'],
			'post_name'    => $aluno->data->ID,
			'post_content'  => '',
			'post_status'   => 'publish',
			'post_author'   => 1,
		);
		$post['id'] = wp_insert_post($args, true);
		update_field('aluno', $aluno->data->ID, $post['id']);
		update_field('status', 1, $post['id']);
		switch ($data['doc-1']) {
			case 'rg':
				update_field('ident_tipo', '0', $post['id']);

				switch ($data['cpf']) {
					case true:
						update_field('cpf_status', true, $post['id']);
						break;
					case false:
						update_field('cpf_status', false, $post['id']);
						break;
				}

				break;
			case 'cnh':
				update_field('ident_tipo', '1', $post['id']);
				break;
		}

		switch ($data['doc-2']) {
			case 'bornCertificate':
				update_field('cert_tipo', '0', $post['id']);
				break;
			case 'married':
				update_field('cert_tipo', '1', $post['id']);
				break;
		}
		switch ($data['doc-3']) {
			case 'universityCertificate':
				update_field('grd_tipo', '0', $post['id']);

				break;
			case 'conclusion':
				update_field('grd_tipo', '1', $post['id']);
				break;
		}

		return $post['id'];
	}
}