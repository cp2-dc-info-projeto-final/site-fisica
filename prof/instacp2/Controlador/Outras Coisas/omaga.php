<?php
	const preçosSabores = [
		'SMAO' => 18.30,
		'FNGO' => 15.00,
		'CRNE' => 17.30,
		'ATUM' => 15.00,
		'CORD' => 16.50
	];

	function calculaValorFrete(string $cep)
	{
		return rand(5, 15);
	}

	$total = null;
	$erros = [];    // Vetor onde guardaremos todas as mensagens de erro de validação dos campos

	if (empty($_REQUEST) == false)
	{
		// Remove os espaços em branco no início e no final de todas as strings em $_REQUEST:
		$request = array_map('trim', $_REQUEST);

		// Filtro básico dos campos:
		$request = filter_var_array(
			$request,
			[
				'qtde' => FILTER_VALIDATE_INT,
				'sabor' => FILTER_DEFAULT,
				'cep' => FILTER_DEFAULT,
				'email' => FILTER_VALIDATE_EMAIL,
			]
		);

		// Demais validações dos campos:
		$qtde = $request['qtde'];
		if ($qtde == false)
		{
			$erros[] = "A quantidade informada não é um número válido.";
		}
		else if ($qtde < 1 || 10 < $qtde)
		{
			$erros[] = "A quantidade deve ser entre 1 e 10.";
		}


		$sabor = $_REQUEST['sabor'];
		// PENDENTE: Validar $sabor

		$preçoUnitário = preçosSabores[$sabor];

		$cep = $_REQUEST['cep'];
		// PENDENTE: Validar $cep
		$preçoFrete = calculaValorFrete($cep);

		$email = $_REQUEST['email'];

		// Processa o pedido (apenas se não houve nenhum erro):
		if (empty($erros) == true)
		{
			$total = $preçoUnitário * $qtde + $preçoFrete;
		}
	}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8"/>
	<title>LP3 - Validação de dados: Loja</title>
</head>
<body>
	<h1>Loja</h1>

	<h2>Ração seca para Gatos</h2>
	<p>Pacote com 1kg</p>

	<!-- Lembrar de tirar o `novalidate` do <form> depois que terminar de testar a validação no servidor, para que a validação do lado do cliente volte a funcionar -->
	<form method="POST" novalidate>
		<input name="qtde" required type="number" placeholder="Qtde." min=1 max=10 /> (máx. 10 unid.)<br/>

		<fieldset>
			<legend>Sabor:</legend>
			<label><input name="sabor" required type="radio" value="SMAO"> Salmão (R$ 18,30)</label></br>
			<label><input name="sabor" required type="radio" value="FNGO"> Frango (R$ 15,00)</label></br>
			<label><input name="sabor" required type="radio" value="CRNE"> Carne (R$ 17,30)</label></br>
			<label><input name="sabor" required type="radio" value="ATUM"> Atum (R$ 15,00)</label></br>
			<label><input name="sabor" required type="radio" value="CORD"> Cordeiro (R$ 16,50)</label></br>
		</fieldset>

		<input name="cep" required type="text" placeholder="CEP" minlength=8 maxlenght=8 /></br>
		<input name="email" required type="email" placeholder="E-mail"/></br>

		<input type="submit" value="Fazer pedido"/>
	</form>

	<!-- Se o usuário preencheu corretamente o formulário, exibe o resultado: -->
	<?php if ($total != null) { ?>
		<div style="background-color: LightGrey">
			<p>Total: <strong>R$ <?= $total ?></strong></p>
			<p>CEP de entrega: <strong><?= $cep ?></strong></p>
			<p>A nota fiscal eletrônica será enviada em até 24h para <strong><?= $email ?></strong>.</p>
		</div>
	<?php } ?>

	<!-- Lista todas as mensagens de erro que possam ter ocorrido no processamento do formulário: -->
	<ul style="background-color: LightRed">
		<?php foreach($erros as $msg) { ?>
			<li><?= $msg ?></li>
		<?php } ?>
	</ul>
</body>
</html>
