<?php
$template_url = 'adm/modules/documentos/';
$doc_permission = ms_doc_validate(USER_ID);
echo '<div class="container">';
get_template_part($template_url . 'form');
echo '</div>';

if ($doc_permission['status'] == 3 || $doc_permission['status'] == 1) {
	echo '<script>ms_unlock_form()</script>';
}