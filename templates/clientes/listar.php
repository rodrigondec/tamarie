<br /><br />
<h2>Lista de Clientes</h2>


<table class='lista'>
	<tr>
		<th>Nome</th>
		<th>Telefone</th>
		<th>Cnpj</th>
		<th>Endereço</th>
		<th>Divida</th>
		<th>Data de Pagamento</th>
		
	</tr>

<?php 
	$clientes = select_all('clientes');
	foreach ($clientes as $cliente):
		if ($cliente['divida'] == 0){
			$cliente['status_pagamento'] = 'quite';
		}
?>
	<tr>
		<td><?php echo $cliente['nome']?></td>
		<td><?php echo $cliente['telefone']?></td>
		<td><?php echo $cliente['cnpj']?></td>
		<td><?php echo $cliente['endereco']?></td>
		<?php  
		    if ($cliente['status_pagamento'] == 'quite'):
		?>    	
		<td>Sem Divida</td>
		<td>Nenhum pagamento agendado</td>
		<?php 
			endif;
			if ($cliente['status_pagamento'] == 'em divida'):	
		?>
		<td><?php echo 'R$ '.$cliente['divida']?></td>
		<td><?php echo converter_data($cliente['data_pagamento'])?></td>	
		<?php  
		    endif;
		    if ($cliente['status_pagamento'] == 'quite'):
		?>
		<td><a href='/<?php echo BASE; ?>/index.php/clientes/alterar/?id=<?php echo $cliente['id']; ?>'>Alterar</a></td>
		<td><a href='/<?php echo BASE; ?>/index.php/clientes/remover/?id=<?php echo $cliente['id']; ?>'>Remover</a></td>
		<?php  
		    endif;
		    if ($cliente['status_pagamento'] == 'em divida'):
		?>
		<td><a href='/<?php echo BASE; ?>/index.php/clientes/pagar_divida/?id=<?php echo $cliente['id']; ?>'>Pagar Divida</a></td>
		<td><a href='/<?php echo BASE; ?>/index.php/clientes/alterar/?id=<?php echo $cliente['id']; ?>'>Alterar</a></td>
		<td><a href='/<?php echo BASE; ?>/index.php/clientes/remover/?id=<?php echo $cliente['id']; ?>'>Remover</a></td>
		<?php  
		    endif;
		?>
	</tr>
	
<?php  
    endforeach;
?>
			
</table>

