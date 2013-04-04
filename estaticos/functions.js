$('#dp2').datepicker();

function del_produto(link){
	td = link.parentNode;
	tr = td.parentNode;
	tr.remove();
}

function add_produto(){
	var tb = document.getElementById('tabela');
	var tr = document.createElement("tr");
	tr.innerHTML = "</td><td><input class='span2' type='text' name='referencia[]' required /></td><td><input class='span2' type='text' name='quantidade[]' required /></td><td><input class='span2' type='text' name='desconto[]' placeholder='Ex.: 25%' /></td><td><a href='#' onClick='del_produto(this)'>remover</a></td>";
	tb.appendChild(tr);
}

function cancelar_venda(){
	var check = confirm('Deseja cancelar a venda?')
	if (check){
		window.location = '/tamarie/index.php/estoque/listar/';
	}
}

function mask(str,textbox,tipo){
	if (tipo == 'cpf'){
		var loc = '3,7,11';
		var delim = '.,.,-';

		var locs = loc.split(',');
		var delims = delim.split(',');

		for (var i = 0; i <= locs.length; i++){
			for (var k = 0; k <= str.length; k++){
			 	if (k == locs[i]){
			  		if (str.substring(k, k+1) != delims[i]){
			    		str = str.substring(0,k) + delims[i] + str.substring(k,str.length);
			 	 	}
			 	}
			}
		}
		textbox.value = str;
	}

	if (tipo == 'telefone'){
		var loc = '0,3,4,9';
		var delim = '(,), ,-';

		var locs = loc.split(',');
		var delims = delim.split(',');

		for (var i = 0; i <= locs.length; i++){
			for (var k = 0; k <= str.length; k++){
			 	if (k == locs[i]){
			  		if (str.substring(k, k+1) != delims[i]){
			    		str = str.substring(0,k) + delims[i] + str.substring(k,str.length);
			 	 	}
			 	}
			}
		}
		textbox.value = str
	}	
}