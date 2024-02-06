<!DOCTYPE html>
<html>

<head>
	<title>Painel de Administração</title>
    <meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="./css/styles.css">
	<script src="https://cdn.jsdelivr.net/npm/quagga/dist/quagga.min.js"></script>
</head>

<body>
	<header>
		<img src="./assets/logo.png" alt="Logo da Empresa" class="logo">
		<h1>Painel de Administração</h1>
	</header>
	<h2>Inserir Produtos</h2> <?php

    $host = 'localhost';
    $usuario = 'root';
    $senha = '';
    $banco = 'codebar';

    $conexao = new mysqli($host, $usuario, $senha, $banco);

    if ($conexao->connect_error) {
        die('Erro na conexão com o banco de dados: ' . $conexao->connect_error);
    }

    $codigo = $_POST['codigo'];
    $nome = $_POST['nome'];
    $quantidade = $_POST['quantidade'];
    $preco = $_POST['preco'];

    $sql = "INSERT INTO produtos (codigo_barras, nome, quantidade, preco) VALUES ('$codigo', '$nome', $quantidade, $preco)";

    if ($conexao->query($sql) === true) {
        echo "Produto inserido com sucesso!";
    } else {
        echo "Erro ao inserir o produto: " . $conexao->error;
    }

    $conexao->close();
    ?> <a href="admin.html" class="back-button">Voltar</a>
	<footer> &copy; 2024 Ricardo C. Reis. Todos os direitos reservados. </footer>
</body>

</html>