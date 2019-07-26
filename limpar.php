<?php 
//atributos da conexao
$server = "localhost";
$user = "root";
$pass = "";
$base = "geoRotas";

//minha conexao
//o @ não exibe o erro do php que ele monta
@$conn = mysqli_connect($server, $user, $pass, $base);
//tratamento de erro
if(mysqli_connect_errno()){
    echo "Falha na conexão com o banco de dados:( ". $conn->connect_errno.") ". $conn->connect_error;
    exit; //parar o codigo
}

$sql = "TRUNCATE tb_rotas";

if (mysqli_query($conn, $sql)) {
    header("Location: resultado.php");
} else {
    header("Location: resultado.php?erro=error");
}
mysqli_close($conn);