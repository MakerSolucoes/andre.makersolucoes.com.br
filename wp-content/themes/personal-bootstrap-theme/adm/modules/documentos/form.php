<form id="form" method="post" class="alert alert-primary " action="../documentos/" enctype="multipart/form-data">
	<?php
	if (USER_IS_ADMIN) {
		echo '<form id="form" method="post" class="alert alert-primary " action="../documentos/" enctype="multipart/form-data">';
		echo '<div class="my-2 form-group">
				<input type="number" class="form-control" name="id_aluno" placeholder="ID Aluno" required>
			</div>';
	} ?>

	<div class="row p-1">
		<h4 class="shadow-none p-2 mb-1 bg-light rounded">
			#1 - Identificação
		</h4>
		<div class="shadow-none p-3 mb-3 bg-light rounded">
			<div class="row justify-content-center ">
				<div class="form-group">
					<div class="form-check form-check-inline">
						<input class="form-check-input" type="radio" name="IdentificationDoc" id="rg" value="rg"
							checked>
						<label class="form-check-label" for="rg">RG</label>
					</div>
					<div class="form-check form-check-inline">
						<input class="form-check-input" type="radio" name="IdentificationDoc" id="cnh" value="cnh">
						<label class="form-check-label" for="cnh">CNH</label>
					</div>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="form-group col-6">
					<label for="x-ef-primary-f" class="form-label">Frente</label>
					<input id="x-ef-primary-f" class="form-control" type="file"
						accept="image/jpeg, image/png, image/gif, application/pdf" name="x-ef-primary-f">
				</div>
				<div class="form-group col-6">
					<label for="x-ef-primary-v" class="form-label">Verso</label>
					<input id="x-ef-primary-v" class="form-control" type="file"
						accept="image/jpeg, image/png, image/gif, application/pdf" name="x-ef-primary-v">
				</div>
				<div class=" cpfContent mt-3">
					<div class="row">
						<div class="col-12">
							<div class="form-group">
								<label for="cpfCheckbox" class="form-label">O documento consta CPF?</label>
								<div class="form-check form-check-inline">
									<input class="form-check-input" type="radio" name="cpf" id="cpfYes" value="true"
										disabled>
									<label class="form-check-label" for="cpfYes">
										Sim
									</label>
								</div>
								<div class="form-check form-check-inline">
									<input class="form-check-input" type="radio" name="cpf" id="cpfNone" value="false"
										checked>
									<label class="form-check-label" for="cpfNone">
										Não
									</label>
								</div>
							</div>
						</div>
						<div class="col-12">
							<input id="x-ef-primary-cpf" class="form-control" type="file" name="x-ef-primary-cpf"
								accept="image/jpeg, image/png, image/gif, application/pdf" <?php

																																												if (!USER_IS_ADMIN && ms_doc_validate(USER_ID)['status'] != 3) {
																																													echo 'required="required"';
																																												} ?>>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row p-1">
		<h4 class="shadow-none p-2 mb-1 bg-light rounded d-flex justify-content-between">
			#2 - Certidão
		</h4>
		<div class="shadow-none p-3 mb-3 bg-light rounded">
			<div class="row justify-content-center">
				<div class="form-group ">
					<div class="form-check form-check-inline">
						<input class="form-check-input" type="radio" name="CertificateDoc" id="bornCertificate"
							value="bornCertificate" checked>
						<label class="form-check-label" for="bornCertificate">Certidão de Nascimento</label>
					</div>
					<div class="form-check form-check-inline">
						<input class="form-check-input" type="radio" name="CertificateDoc" id="married" value="married">
						<label class="form-check-label" for="married">Certidão de Casamento</label>
					</div>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="form-group">
					<label class="form-label" for="x-ef-secundary-f">Frente</label>
					<input id="x-ef-secundary-f" class="browse form-control" type="file"
						accept="image/jpeg, image/png, image/gif, application/pdf" name="x-ef-secundary-f">
				</div>
			</div>
		</div>
	</div>
	<div class="row p-1">
		<h4 class="shadow-none p-2 mb-1 bg-light rounded">
			#3 - Gradução
		</h4>
		<div class="shadow-none p-3 bg-light rounded">
			<div class="row justify-content-center">
				<div class="form-group ">
					<div class="form-check form-check-inline">
						<input class="form-check-input" type="radio" name="classCertiticate" id="university"
							value="universityCertificate" checked>
						<label class="form-check-label" for="university">Diploma</label>
					</div>
					<div class="form-check form-check-inline">
						<input class="form-check-input" type="radio" name="classCertiticate" id="conclusion"
							value="conclusion">
						<label class="form-check-label" for="conclusion">Certificado de Conclusão</label>
					</div>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="form-group col-6">
					<label for="x-ef-third-f" class="form-label">Frente</label>
					<input id="x-ef-third-f" class="form-control" type="file" name="x-ef-third-f"
						accept="image/jpeg, image/png, image/gif, application/pdf">
				</div>
				<div class="form-group col-6">
					<label for="x-ef-third-v" class="form-label">Verso</label>
					<input id="x-ef-third-v" class="form-control" type="file" name="x-ef-third-v"
						accept="image/jpeg, image/png, image/gif, application/pdf">
				</div>
			</div>
		</div>
	</div>


	<?php
	if (USER_IS_ADMIN) {
		echo '<div class="d-flex justify-content-center">
		<button id="y-send-doc" type="submit" class="btn btn-primary">
			Enviar Documentos
		</button>
	</div>';
	} else {
		if (ms_doc_validate(USER_ID)['status'] == '3') {	?>

	<div class="d-flex justify-content-center">
		<a id="x-resend-doc" type="button" class="btn btn-warning">
			Reenviar novos documentos
		</a>
	</div>
	<div class="d-flex justify-content-center">
		<button id="x-send-doc" type="button" class="btn d-none btn-primary">
			Enviar Documentos
		</button>
	</div>

	<?php } else { ?>

	<div class="mt-5 d-flex justify-content-center">
		<button id="x-send-doc" type="button" class="btn btn-primary">
			Enviar Documentos
		</button>
	</div>

	<?php }
	} ?>

	<div class="modal fade" id="sendDoc" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="ModalLabel">Verifique as informações antes de encaminhar</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<div class="modalStepOne d-none">
						<h5>#1 - Identificação</h5>
						<div class="row justify-content-center">
							<div class="my-1 col-4">
								<div>
									<b>Informações Gerais:</b>
									<p>Tipo de documento: <span id="ident_type"></span></p>
									<p class="cpf_check">Consta CPF: <span id="cpf_check"></span></p>
								</div>
							</div>
							<div class="col-8">
								<div id="carousel_identification" class="carousel carousel-dark slide"
									data-bs-ride="carousel">
									<div class="carousel-inner">
										<div class="carousel-item active">
											<img id="StepOneImgFront" class="d-block w-100">
										</div>
										<div class="carousel-item">
											<img id="StepOneImgback" class="d-block w-100">
										</div>
										<div class="carousel-item cpf-previwer">
											<img id="StepOneImgcpf" class="d-block w-100">
										</div>
									</div>
									<button class="carousel-control-prev" type="button"
										data-bs-target="#carousel_identification" data-bs-slide="prev">
										<span class="carousel-control-prev-icon" aria-hidden="true"></span>
										<span class="visually-hidden">Previous</span>
									</button>
									<button class="carousel-control-next" type="button"
										data-bs-target="#carousel_identification" data-bs-slide="next">
										<span class="carousel-control-next-icon" aria-hidden="true"></span>
										<span class="visually-hidden">Next</span>
									</button>
								</div>
							</div>
						</div>
					</div>
					<div class="modalStepTwo d-none">
						<h5>#2 - Certidão</h5>
						<div class="row justify-content-center">
							<div class="my-1 col-4">
								<div>
									<b>Informações Gerais:</b>
									<p>Tipo de documento: <span id="cert_type"></span></p>
								</div>
							</div>
							<div class="col-8">
								<div id="carousel_cert" class="carousel carousel-dark slide" data-bs-ride="carousel">
									<div class="carousel-inner">
										<div class="carousel-item active">
											<img id="StepTwoImgFront" class="d-block w-100">
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="modalStepThree d-none">
						<h5>#3 - Graduação</h5>
						<div class="row justify-content-center">
							<div class="my-1 col-4">
								<div>
									<b>Informações Gerais:</b>
									<p>Tipo de documento: <span id="grd_type"></span></p>
								</div>
							</div>
							<div class="col-8">
								<div id="carousel_grd" class="carousel carousel-dark slide" data-bs-ride="carousel">
									<div class="carousel-inner">
										<div class="carousel-item active">
											<img id="StepThreeImgFront" class="d-block w-100">
										</div>
										<div class="carousel-item">
											<img id="StepThreeImgback" class="d-block w-100">
										</div>
									</div>
									<button class="carousel-control-prev" type="button" data-bs-target="#carousel_grd"
										data-bs-slide="prev">
										<span class="carousel-control-prev-icon" aria-hidden="true"></span>
										<span class="visually-hidden">Previous</span>
									</button>
									<button class="carousel-control-next" type="button" data-bs-target="#carousel_grd"
										data-bs-slide="next">
										<span class="carousel-control-next-icon" aria-hidden="true"></span>
										<span class="visually-hidden">Next</span>
									</button>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button id="submit" class="btn btn-danger" type="submit" data-bs-dismiss="modal">Enviar</button>
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Revisar</button>
				</div>
			</div>
		</div>
	</div>
</form>