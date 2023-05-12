<?php
$TemplateUrl = 'adm/modules/documentos/';

if (USER_IS_ADMIN) {
	if ($_GET) {
		ms_update_adm($_GET, get_the_ID());
	}
	get_template_part($TemplateUrl . 'avisos');

	$doc['aluno'] = get_field('aluno');
	$doc['validation'] = ms_doc_validate($doc['aluno']);

	$doc['status'] = get_field('status');
	$doc['geral_obs'] = get_field('geral_obs');

	$doc['ident_status'] = get_field('ident_status');
	$doc['ident_tipo'] = get_field('ident_tipo');
	$doc['ident_frente'] = get_field('ident_frente');
	$doc['ident_verso'] = get_field('ident_verso');
	$doc['cpf_status'] = get_field('cpf_status');
	$doc['cpf_frente'] = get_field('cpf_frente');

	$doc['ident_obs'] = get_field('ident_obs');


	$doc['cert_status'] = get_field('cert_status');
	$doc['cert_tipo'] = get_field('cert_tipo');
	$doc['cert_frente'] = get_field('cert_frente');

	$doc['cert_obs'] = get_field('cert_obs');

	$doc['grd_status'] = get_field('grd_status');
	$doc['grd_tipo'] = get_field('grd_tipo');
	$doc['grd_frente'] = get_field('grd_frente');
	$doc['grd_verso'] = get_field('grd_verso');

	$doc['grd_obs'] = get_field('grd_obs');


	$aluno['data'] = get_userdata($doc['aluno']);


?>

<form>
	<div class="container">
		<div class="accordion" id="accordion-admin">
			<div class="accordion-item">
				<h2 class="accordion-header" id="headingZero">
					<button
						class="accordion-button <?php echo $doc['validation']['background'] . ' ' . $doc['validation']['text-color']; ?>"
						type="button" data-bs-toggle="collapse" data-bs-target="#collapseZero" aria-expanded="true"
						aria-controls="collapseZero">
						Informações do Aluno
					</button>
				</h2>
				<div id="collapseZero" class="accordion-collapse collapse show" aria-labelledby="headingZero"
					data-bs-parent="#accordion-admin">
					<div class="accordion-body">
						<div class="row align-items-center">
							<div class="col-4">
								<div class="row">
									<div class="col-12">
										<div class="form-group">
											<div class="my-1 row">
												<h5>Status</h5>
												<select name="status" class="form-select">
													<option class="single" value="0" <?php if ($doc['status']['value'] == 0) {
																								echo 'selected="selected"';
																							} ?>>Selecione</option>
													<option class="single" value="1" <?php if ($doc['status']['value'] == 1) {
																								echo 'selected="selected"';
																							} ?>>Em análise</option>
													<option class="single" value="2" <?php if ($doc['status']['value'] == 2) {
																								echo 'selected="selected"';
																							} ?>>Recusado</option>
													<option class="single" value="3" <?php if ($doc['status']['value'] == 3) {
																								echo 'selected="selected"';
																							} ?>>Aprovado</option>
												</select>
											</div>
										</div>
									</div>
									<div id="geral_obs" class="col-12
										<?php if (empty($doc['geral_obs']) || $doc['geral_obs'] == '-') {
											echo 'd-none';
										} ?>">
										<div class="form-group">
											<div class="my-1 row">
												<h5>Observação</h5>
												<input name="geral_obs" class="form-control" type="text" value="<?php
																													if (!empty($doc['geral_obs'])) {
																														echo $doc['geral_obs'];
																													}
																													?>">
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-8">
								<div class="form-group">
									<h5>Dados do aluno</h5>
									<table class="table table-hover ">
										<tr>
											<th scope="col-4">
												Nome:
											</th>
											<td scope="col-8">
												<?php echo $aluno['data']->first_name . ' ' . $aluno['data']->last_name; ?>
											</td>
										</tr>
										<tr>
											<th scope="col-4">
												Email:
											</th>
											<td scope="col-8">
												<?php echo $aluno['data']->user_email; ?>
											</td>
										</tr>
										<tr>
											<th scope="col-4">
												Cursos:
											</th>
											<td scope="col-8"></td>
										</tr>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="accordion" id="accordion-admin">
				<div class="accordion-item">
					<h2 class="accordion-header" id="headingOne">
						<button class="accordion-button" type="button" data-bs-toggle="collapse"
							data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
							#1 - Identificação
						</button>
					</h2>
					<div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne"
						data-bs-parent="#accordion-admin">
						<div class="accordion-body">
							<div class="row align-items-center">
								<div class="col-4">
									<div class="row">
										<div class="col-12">
											<div class="form-group">
												<div class="my-1 row">
													<h5>Status</h5>
													<select name="ident_status" class="form-select">
														<option class="single" value="null" <?php if ($doc['ident_status'] == 0) {
																									echo 'selected="selected"';
																								} ?>>Selecione</option>
														<option class="single" value="1" <?php if ($doc['ident_status'] == 1) {
																									echo 'selected="selected"';
																								} ?>>Em análise</option>
														<option class="single" value="2" <?php if ($doc['ident_status'] == 2) {
																									echo 'selected="selected"';
																								} ?>>Recusado</option>
														<option class="single" value="3" <?php if ($doc['ident_status'] == 3) {
																									echo 'selected="selected"';
																								} ?>>Aprovado</option>
													</select>
												</div>
											</div>
										</div>
										<div id="ident_obs" class="col-12
										<?php if (empty($doc['ident_obs']) ||  $doc['ident_obs'] == '-') {
											echo 'd-none';
										} ?>">
											<div class="form-group">
												<div class="my-1 row">
													<h5>Observação</h5>
													<input name="ident_obs" class="form-control" type="text" value="<?php
																														if (!empty($doc['ident_obs'])) {
																															echo $doc['ident_obs'];
																														}
																														?>">
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-4">
									<div class="card" style="width: 20rem;">
										<img src=" <?php echo $doc['ident_frente']; ?>" class="card-img-top">
										<div class="card-body">
											<h5 class="card-title">Frente</h5>
											<a href="<?php echo $doc['ident_frente']; ?>"
												class="btn btn-primary">Ver</a>
										</div>
									</div>
								</div>
								<div class="col-4">
									<div class="card" style="width: 20rem;">
										<img src=" <?php echo $doc['ident_verso']; ?>" class="card-img-top">
										<div class="card-body">
											<h5 class="card-title">Verso</h5>
											<a href="<?php echo $doc['ident_verso']; ?>" class="btn btn-primary">Ver</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="accordion-item">
					<h2 class="accordion-header" id="headingTwo">
						<button class="accordion-button" type="button" data-bs-toggle="collapse"
							data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
							#2 - Certidão
						</button>
					</h2>
					<div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
						data-bs-parent="#accordion-admin">
						<div class="accordion-body">
							<div class="row align-items-center">
								<div class="col-4">
									<div class="row">
										<div class="col-12">
											<div class="form-group">
												<div class="my-1 row">
													<h5>Status</h5>
													<select name="cert_status" class="form-select">
														<option class="single" value="null" <?php if ($doc['cert_status'] == 0) {
																									echo 'selected="selected"';
																								} ?>>Selecione</option>
														<option class="single" value="1" <?php if ($doc['cert_status'] == 1) {
																									echo 'selected="selected"';
																								} ?>>Em análise</option>
														<option class="single" value="2" <?php if ($doc['cert_status'] == 2) {
																									echo 'selected="selected"';
																								} ?>>Recusado</option>
														<option class="single" value="3" <?php if ($doc['cert_status'] == 3) {
																									echo 'selected="selected"';
																								} ?>>Aprovado</option>
													</select>
												</div>
											</div>
										</div>
										<div id="cert_obs" class="col-12
										<?php if (empty($doc['cert_obs']) || $doc['cert_obs'] == '-') {
											echo 'd-none';
										} ?>">
											<div class="form-group">
												<div class="my-1 row">
													<h5>Observação</h5>
													<input name="cert_obs" class="form-control" type="text" value="<?php
																														if (!empty($doc['cert_obs'])) {
																															echo $doc['cert_obs'];
																														}
																														?>">
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-4">
									<div class="card" style="width: 20rem;">
										<img src=" <?php echo $doc['cert_frente']; ?>" class="card-img-top">
										<div class="card-body">
											<h5 class="card-title">Frente</h5>
											<a href="<?php echo $doc['cert_frente']; ?>" class="btn btn-primary">Ver</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="accordion-item">
					<h2 class="accordion-header" id="headingThree">
						<button class="accordion-button" type="button" data-bs-toggle="collapse"
							data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
							#3 - Graduação
						</button>
					</h2>
					<div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
						data-bs-parent="#accordion-admin">
						<div class="accordion-body">
							<div class="row align-items-center">
								<div class="col-4">
									<div class="row">
										<div class="col-12">
											<div class="form-group">
												<div class="my-1 row">
													<h5>Status</h5>
													<select name="grd_status" class="form-select">
														<option class="single" value="null" <?php if ($doc['grd_status'] == 0) {
																									echo 'selected="selected"';
																								} ?>>Selecione</option>
														<option class="single" value="1" <?php if ($doc['grd_status'] == 1) {
																									echo 'selected="selected"';
																								} ?>>Em análise</option>
														<option class="single" value="2" <?php if ($doc['grd_status'] == 2) {
																									echo 'selected="selected"';
																								} ?>>Recusado</option>
														<option class="single" value="3" <?php if ($doc['grd_status'] == 3) {
																									echo 'selected="selected"';
																								} ?>>Aprovado</option>
													</select>
												</div>
											</div>
										</div>
										<div id="grd_obs" class="col-12
										<?php if (empty($doc['grd_obs']) || $doc['grd_obs'] == '-') {
											echo 'd-none';
										} ?>">
											<div class="form-group">
												<div class="my-1 row">
													<h5>Observação</h5>
													<input name="grd_obs" class="form-control" type="text" value="<?php
																														if (!empty($doc['grd_obs'])) {
																															echo $doc['grd_obs'];
																														}
																														?>">
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-4">
									<div class="card" style="width: 20rem;">
										<img src=" <?php echo $doc['grd_frente']; ?>" class="card-img-top">
										<div class="card-body">
											<h5 class="card-title">Frente</h5>
											<a href="<?php echo $doc['grd_frente']; ?>" class="btn btn-primary">Ver</a>
										</div>
									</div>
								</div>
								<div class="col-4">
									<div class="card" style="width: 20rem;">
										<img src=" <?php echo $doc['grd_verso']; ?>" class="card-img-top">
										<div class="card-body">
											<h5 class="card-title">Verso</h5>
											<a href="<?php echo $doc['grd_verso']; ?>" class="btn btn-primary">Ver</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row my-3 text-center">
			<div class="col-12">
				<button type="submit" class="btn btn-primary">Atualizar Documentos</button>
			</div>
		</div>
	</div>
</form>



<?php
}