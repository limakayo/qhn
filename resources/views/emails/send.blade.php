<html>
<head></head>
<body>
  <p><strong>Nome: </strong>{{ $nome }}</p>
  <p><strong>Telefone: </strong>{{ $telefone }}</p>
  <p><strong>Produto: </strong>{{ $produto }}</p>
  @if($potencia)
  	<p><strong>Potência: </strong>{{ $potencia }}</p>
  @endif
  <p><strong>Mensagem: </strong>{{ $mensagem }}</p>
  <p><strong>Site: </strong>www.qhn.com.br</p>
</body>
</html>
