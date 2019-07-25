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

$lat = $_POST['lat'];
$log = $_POST['log'];

$sql = "INSERT INTO tb_rotas(lat, log) VALUES($lat, $log)";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);