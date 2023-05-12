function ms_search_ajax(form, content){
	$(content).html('');
	let ms_value = '';
	let ms_action = $(form).attr("action");
	let ms_method = $(form).attr("method");
	ms_value = {
		'search' : $('#search-admin').val(),
		'select' : $('#search-select').val(),
	}

	let timer;
	clearTimeout(timer);
	// Sets new timer that may or may not get cleared
	timer = setTimeout(() => {
	
		$.ajax({
			method: ms_method,
			url: url_ajax,
			data: {
				action: ms_action,
				data: ms_value,
			},
		
			success: (msg) => {
				ms_show_class(content);
				$(content).html(msg)
			},
			error: function (MLHttpRequest, textStatus, errorThrown) {
				console.log(
					"Erro ao processar sua requisição, atualize e tente novamente. Caso o erro persista contate o administrador do sistema <br>" +
						MLHttpRequest + textStatus + errorThrown
				);
			},
		});	
	}, 500);
}