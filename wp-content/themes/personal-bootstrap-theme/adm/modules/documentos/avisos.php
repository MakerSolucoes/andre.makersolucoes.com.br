<?php
$ms['post_type']	= get_post_type();

if (!USER_IS_ADMIN) {
	$doc['validate'] = ms_doc_validate(USER_ID);
	if ($doc['validate']['creation']) {
		$status = 0;
	}

	switch ($doc['validate']['status']) {
		case '3':
			$data['type'] = 'alert-success';
			$data['content'] = 'Solicitar declaração de matrícula : <button type="button" class="btn btn-outline-primary">Solicitar declaração</button>';
			break;
		case '2':
			$data['type'] = 'alert-danger';
			$data['content'] = 'Você em alguns documentos pendentes de revisão:';
			$field['ident_status'] = get_field('ident_status', $doc['validate']['id']);
			$field['cert_status'] = get_field('cert_status', $doc['validate']['id']);
			$field['grd_status'] = get_field('grd_status', $doc['validate']['id']);
			foreach ($field as $key => $value) {
				if ($value == 2) {
					switch ($key) {
						case 'ident_status':
							$data['content'] .= '<br>Identificação';
							break;
						case 'cert_status':
							$data['content'] .= '<br>Certidão';
							break;
						case 'grd_status':
							$data['content'] .= '<br>Graduação';
							break;
					}
				}
			}
			break;
		case '1':
			$field['ident_status'] = get_field('ident_status', $doc['validate']['id']);
			$field['cert_status'] = get_field('cert_status', $doc['validate']['id']);
			$field['grd_status'] = get_field('grd_status', $doc['validate']['id']);

			$data['type'] = 'alert-primary';
			$data['content'] = 'Os documentos que estão em análise são:';

			foreach ($field as $key => $value) {
				if ($value != 3) {
					switch ($key) {
						case 'ident_status':
							$data['content'] .= '<br>Identificação';
							break;
						case 'cert_status':
							$data['content'] .= '<br>Certidão';
							break;
						case 'grd_status':
							$data['content'] .= '<br>Graduação';
							break;
					}
				}
			}
			break;
		default:
			$data['type'] = 'alert-primary';
			$data['content'] = '<h4>Para regularizar sua matricula deve fazer o upload dos seguintes documentos:</h4>
							<ul>
							<li>RG ou CNH</li>
							<li>CPF (caso já conste no RG não é necessário)</li>
							<li>Certidão de Nascimento ou Casamento</li>
							<li>Diploma (frente e verso). Caso não disponível, é possível o envio temporário da Declaração de Conclusão de Curso (expedida pela IES) ou Certidão de Conclusão de Curso.</li>
							</ul>
							<div>
								Em seguida, validaremos a inclusão ou informaremos qual o erro ocorrido. <br>
							</div>
							<div>
							<b>Obs.: Os tipos de arquivos aceitos são: gif, png, jpg, jpeg e pdf.</b>
							</div>';
			break;
	}
} else {
	$data['type'] = 'alert-secondary';
	if (is_single()) {
		$count = ms_wait_doc(get_the_ID());
		$data['content'] = $count['documentos'] . ' documento(s) a ser(em) revisado(s) deste aluno.<br>';
		$data['content'] .= 'Os documentos pendentes são das seguinte seções:' . $count['fields'];
		if (empty($count['fields'])) {
			$data['content'] = 'Todos os documentos deste aluno foram aprovados.';
			$data['type'] = 'alert-success';
		}
	} else {
		$count = ms_wait_doc();
		$data['content'] = $count['documentos'] . ' documentos a serem revisados de um total de ' . $count['alunos'] . ' aluno(s).';
	}
}
?>

<div id="warnings">
	<div class="container">
		<div class="alert <?php echo $data['type'] ?>">
			<?php echo $data['content'] . '<br>' ?>
		</div>
	</div>
</div>