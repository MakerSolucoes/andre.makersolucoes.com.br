<?php

function ms_file_name_generate($post, $key, $file_type)
{
	switch ($post['doc-1']) {
		case 'rg':
			$doc_1 = 'rg-';
			break;
		case 'cnh':
			$doc_1 = 'cnh-';
			break;
	}
	switch ($post['doc-2']) {
		case 'married':
			$doc_2 = 'certidao-casamento-';
			break;
		case 'bornCertificate':
			$doc_2 = 'certidao-nascimento-';
			break;
	}
	switch ($post['doc-3']) {
		case 'universityCertificate':
			$doc_3 = 'diploma-';
			break;
		case 'conclusion':
			$doc_3 = 'certificado-conclusao-';
			break;
	}

	switch ($file_type) {
		case 'image/jpeg':
			$file_type = '.jpg';
			break;
		case 'image/png':
			$file_type = '.png';
			break;
	}
	switch ($key) {
		case 'x-ef-primary-f':
			$data['file_name'] = $doc_1 . 'F' . $file_type;
			$data['url'] = 'identificacao/';
			break;
		case 'x-ef-primary-v':
			$data['file_name'] = $doc_1 . 'V' . $file_type;
			$data['url'] = 'identificacao/';
			break;
		case 'x-ef-primary-cpf':
			$data['file_name'] = 'CPF' . $file_type;
			$data['url'] = 'identificacao/';
			break;
		case 'x-ef-secundary-f':
			$data['file_name'] = $doc_2 . 'F' . $file_type;
			$data['url'] = 'certidao/';
			break;
		case 'x-ef-third-f':
			$data['file_name'] = $doc_3 . 'F' . $file_type;
			$data['url'] = 'graduacao/';
			break;
		case 'x-ef-third-v':
			$data['file_name'] = $doc_3 . 'V' . $file_type;
			$data['url'] = 'graduacao/';
			break;
	}
	return $data;
}