<?php

$TemplateUrl = 'adm/modules/documentos/';
if (!empty($_POST['id_aluno'])) {
	$doc_permission = ms_doc_validate($_POST['id_aluno']);
} else {
	$doc_permission = ms_doc_validate(USER_ID);
}
if (!empty($_POST) && !empty($_FILES)) {
	if (!USER_IS_ADMIN && $doc_permission['status'] == 3) {
		submitForm($_POST, $_FILES, true);
	} else {
		submitForm($_POST, $_FILES);
	}
}

// Validar se está funcionando corretamente em todos os tipos de usuário
if (is_user_logged_in()) {
	get_template_part($TemplateUrl . 'avisos');
	if (current_user_can('administrator')) {
		get_template_part($TemplateUrl . 'admin');
	}
	if (current_user_can('subscriber')) {
		get_template_part($TemplateUrl . 'user');
	}
} else {
	echo 'Você precisa estar logado para continuar';
}