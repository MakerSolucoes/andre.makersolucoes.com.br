let content = '#search-content';
let form = '#search-form';
// Search
$("#search-admin").on("keyup", function () {
	ms_search_ajax(form,content);
});
$('#search-button').on('click', function(){
	ms_show_class(content);
	ms_search_ajax(form,content);
})
$('#search-select').on('change', function(){
	ms_show_class(content);
	ms_search_ajax(form,content);
})
$(content).hover(function () {
	ms_show_class(content);
});
$('#search-select').focusout(function(){
	ms_hide_class(content);
})
$("#search-admin").focusout(function(){
	ms_hide_class(content);
})
$("#search-admin").focusin(function(){
	ms_show_class(content);
	ms_search_ajax(form,content);
})

// Form input
$('input[type="file"]').change(function(e) {
	previwerImg(this)
	
});
$('input[type="radio"]').on('change', function(){
	let fieldCpf = '.cpfContent';
	let id = '#'+this.id;
	radioValidate(id, fieldCpf);
})

// Form Send Doc
$('#x-send-doc').on('click', function(){
	if (ms_form_validate()) {
		ms_white_val()
		$('#sendDoc').modal('show');
	}else{
		$('#submit').click();
	}
})
$('#y-send-doc').on('click', function(){
	if (ms_form_validate()) {
		$('#submit').click();
	}
})

$('#x-resend-doc').on('click',function(e){
	$("#form :input").prop("disabled", false);
	ms_hide_class('#x-resend-doc');
	$('#x-send-doc').removeClass('d-none');
})

// Page Single
$('option.single').on('click', function(){
	if (this.value == 2) {
		switch (this.parentNode.name) {
			case 'status':
				ms_show_class('#geral_obs');
				$('#geral_obs input').attr('required', 'required');
				break;
			case 'ident_status':
				ms_show_class('#ident_obs');
				$('#ident_obs input').attr('required', 'required');
				break;
			case 'cert_status':
				ms_show_class('#cert_obs');
				$('#cert_obs input').attr('required', 'required');
				break;
			case 'grd_status':
				ms_show_class('#grd_obs');
				$('#grd_obs input').attr('required', 'required');
				break;
		}
	}else{
		$('input[type="text"]').attr('required', false);
		switch (this.parentNode.name) {
			case 'status':
				ms_clean_value('#geral_obs input');
				ms_hide_class('#geral_obs');
				break;
			case 'ident_status':
				ms_clean_value('#ident_obs input');
				ms_hide_class('#ident_obs');
				break;
			case 'cert_status':
				ms_clean_value('#cert_obs input');
				ms_hide_class('#cert_obs');
				break;
			case 'grd_status':
				ms_clean_value('#grd_obs input ');
				ms_hide_class('#grd_obs');
				break;
		}
	}
})