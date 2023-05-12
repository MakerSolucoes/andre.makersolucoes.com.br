

// Style Functions
function radioValidate(input, dimissClass){
	let inputName = $(input)[0].name
	if (inputName == 'cpf') {
		dimissClass = '#x-ef-primary-cpf';
	}
	var prop = $(input).prop('checked');
	if (prop == true) {
		switch (input) {
			case '#cnh':
				$(dimissClass).addClass('d-none');
				$('#x-ef-primary-cpf').attr('required', false);
				$('#x-ef-primary-f').attr('required', 'required');
				$('.cpf-previwer').removeClass('carousel-item');
				$('.cpf-previwer').addClass('d-none');
				break;
				case '#rg':
					$(dimissClass).removeClass('d-none');
					$('.cpf-previwer').addClass('carousel-item');
					$('.cpf-previwer').removeClass('d-none');
					if (ms_form_validate('#cpfNone') == true) {
						$('#x-ef-primary-cpf').attr('required', 'required');
					}
				break
			case '#cpfYes':
				$(dimissClass).addClass('d-none');
				$('.cpf-previwer').removeClass('carousel-item');
				$('.cpf-previwer').addClass('d-none');
				$('.cpf_check').removeClass('d-none');
				$('#x-ef-primary-cpf').attr('required', false);
				break
				case '#cpfNone':
				ms_show_class('.cpf_check')
				$(dimissClass).removeClass('d-none');
				$('.cpf-previwer').addClass('carousel-item');
				$('.cpf-previwer').removeClass('d-none');
				$('#x-ef-primary-cpf').attr('required', 'required');
				break
		}
	}
}

function ms_form_validate(input = null){
	var data = '';
	$("#form :input[required]").each(function(){
		var form = this
		if (input != null) {
			if ($(input).attr('type') == 'radio') {
				if ($(input).prop('checked')) {
					form = input;
				}
			}
		}
		if ($(form).val().length > 1) {
			data = true;
		}else{
			data = false;
		}
	});
	return data;
}

function ms_white_val(){
	$('#form :input[type=radio]:checked').each(function(){
		switch ($(this).val()) {
			case 'true':
				$('#cpf_check').html('<br>Sim');
				break
			case 'false':
				$('#cpf_check').html('<br>Não');
				break
			case 'cnh':
				$('#ident_type').html('<br>CNH');
				$('.cpf_check').addClass('d-none');
				break;
			case 'rg':
				$('#ident_type').html('<br>RG');
				break
			case 'bornCertificate':
				$('#cert_type').html('<br>Certidão de Nascimento');
				break
			case 'married':
				$('#cert_type').html('<br>Certidão de Casamento');
				break
			case 'universityCertificate':
				$('#grd_type').html('<br>Diploma');
				break
			case 'conclusion':
				$('#grd_type').html('<br>Certificado de Conclusão');
				break
		}
	});
}

function previwerImg(element) {
	var previwerClass = '';
	switch (element.name) {
		case 'x-ef-primary-f':
			previwerClass = 'StepOneImgFront';
			if (ms_form_validate('#cnh') != true && ms_form_validate('#rg') == true && ms_form_validate('#cpfNone') == true) {
				ms_show_class('.cpfContent');
			}
			$('#cpfYes').attr('disabled', false);
			ms_show_class('.modalStepOne');
			$('#x-ef-primary-v').attr('required', 'required');
		break;
		case 'x-ef-primary-v':
			previwerClass = 'StepOneImgback';
			ms_show_class('.modalStepOne');
			$('#cpfYes').attr('disabled', false);
			$('#x-ef-primary-f').attr('required', 'required');
		break;
		case 'x-ef-primary-cpf':
			previwerClass = 'StepOneImgcpf';
			ms_show_class('.modalStepOne');
		break;
		case 'x-ef-secundary-f':
			previwerClass = 'StepTwoImgFront';
			ms_show_class('.modalStepTwo');
			break;
		case 'x-ef-third-f':
			previwerClass = 'StepThreeImgFront';
			ms_show_class('.modalStepThree');
			$('#x-ef-third-v').attr('required', 'required');
		break;
		case 'x-ef-third-v':
			previwerClass = 'StepThreeImgback';
			ms_show_class('.modalStepThree');
			$('#x-ef-third-f').attr('required', 'required');
		break;
	}
	var reader = new FileReader();
	reader.onload = function(e) {
	// get loaded data and render thumbnail.
	$('#'+previwerClass)[0].src = e.target.result;
	};
	// read the image file as a data URL.
	reader.readAsDataURL(element.files[0]);
}


function ms_unlock_form() {
	$("#form :input").prop("disabled", true);
}
function ms_show_class(div){
	$(div).removeClass('d-none');
}
function ms_hide_class(div){
	$(div).addClass('d-none');
}
function ms_clean_value(div){
	$(div).attr('value', '-');
}