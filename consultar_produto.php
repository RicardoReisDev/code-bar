<?php

$host = 'localhost';
$usuario = 'root';
$senha = '';
$banco = 'codebar';

$conexao = new mysqli($host, $usuario, $senha, $banco);

if ($conexao->connect_error) {
    die('Erro na conexão com o banco de dados: ' . $conexao->connect_error);
}


$codigo = $_GET['codigo'];

$sql = "SELECT nome, preco FROM produtos WHERE codigo_barras = '$codigo'";
$resultado = $conexao->query($sql);

if ($resultado->num_rows > 0) {
    $produto = $resultado->fetch_assoc();
    $resposta = array(
        'encontrado' => true,
        'nome' => $produto['nome'],
        'preco' => $produto['preco']
    );
} else {
    $resposta = array(
        'encontrado' => false
    );
}

echo json_encode($resposta);

$conexao->close();
?>