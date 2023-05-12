<?php
$template_url = 'adm/modules/documentos/';

$wp_query = new WP_Query(array(
	'post_type' => 'documentos',
	'meta_key'	=> 'status',
	'orderby' => 'meta_value',
	'order' => 'asc',
	'posts_per_page' => 20,
	'paged' => get_query_var('paged')
));
?>
<div id="options">
	<div class="container">
		<form id="search-form" method="POST" action="ms_ajax_search">
			<div class="row">
				<div class="col-6">
					<div class="form-group">
						<input id="search-admin" class="form-control" name="search-admin" type="text"
							placeholder="Insira o nome do aluno ou email">
					</div>
				</div>
				<div class="col-3">
					<div class="form-group">
						<select id="search-select" name="search_select" class="form-select">
							<option value="0" selected>Selecione</option>
							<option value="3">Aprovado</option>
							<option value="2">Recusado</option>
							<option value="1">Em análise</option>
						</select>
					</div>
				</div>
				<div class="col-3">
					<div class="form-group">
						<button id="search-button" type="button"
							class="form-control btn btn-primary btn-block">Pesquisar</button>
					</div>
				</div>
			</div>
			<div id="search-content" class="d-none col-7 rounded"></div>
		</form>
	</div>
	<div class="row justify-content-center">
		<div class="col-5 m-2">
			<div class="form-group">
				<button type="button" class="form-control btn btn-warning btn-block" data-bs-toggle="modal"
					data-bs-target="#formModal">Enviar arquivos</button>
				<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel"
					aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="formModalLabel">Enviar arquivos</h5>
								<button type="button" class="btn-close" data-bs-dismiss="modal"
									aria-label="Close"></button>
							</div>
							<div class="modal-body">
								<?php get_template_part($template_url . 'form'); ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div id="table">
	<div class="container">
		<table class="table table-hover">
			<thead>
				<tr>
					<th scope="col-1">ID</th>
					<th scope="col-5">Nome</th>
					<th scope="col-3">Email</th>
					<th scope="col-1">Status Geral</th>
					<th scope="col-1">QTD DOC</th>
					<th scope="col-1"></th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<?php
					if ($wp_query->have_posts()) : while ($wp_query->have_posts()) : $wp_query->the_post();
							$id = get_the_ID();

							$doc['aluno'] = get_field('aluno', $id);
							$doc['status'] = get_field('status', $id);

							$aluno['data'] = get_userdata($doc['aluno']);

							if (!$aluno['data'] == false) {
								echo '<tr>';
								echo '
					<th >' . $aluno['data']->ID . '</th>
					<th >' . $aluno['data']->user_firstname . ' ' . $aluno['data']->user_lastname . '</th>
					<th >' . $aluno['data']->user_email . '</th>
					<th >' . ms_doc_validate($doc['aluno'])['title'] . '</th>';
								if (ms_wait_doc($id)['documentos'] == 0) {
									echo '<th ><span class="badge bg-success rounded-pill">' . ms_wait_doc($id)['documentos'] . '</span></th>';
								} else {
									echo '<th ><span class="badge bg-primary rounded-pill">' . ms_wait_doc($id)['documentos'] . '</span></th>';
								}

								echo '<th ><a class=" ' . ms_doc_validate($doc['aluno'])['color'] . '" href="' . get_permalink() . ' "
							target="blank">Configurações</a></th>
				</tr>';
							}
						endwhile;
					endif;
					?>
			</tbody>
		</table>
	</div>
</div>
<div class="row" id="ef-pagination">
	<div class="col-12 d-flex justify-content-center"><?php echo bootstrap_pagination($wp_query); ?></div>
</div>