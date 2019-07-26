<?php
error_reporting(0);
ini_set(“display_errors”, 0 );

$server = "localhost";
$user = "root";
$pass = "";
$base = "geoRotas";

//minha conexao
//o @ não exibe o erro do php que ele monta
$conn = mysqli_connect($server, $user, $pass, $base);
//tratamento de erro
if(mysqli_connect_errno()){
    echo "Falha na conexão com o banco de dados:( ". $conn->connect_errno.") ". $conn->connect_error;
    exit; //parar o codigo
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Presente rápido</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12 mt-5">
                <table class="table table-dark">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Latitude</th>
                            <th scope="col">Longitde</th>
                            <th scope="col">Link</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $sql = "SELECT * FROM tb_rotas";
                            $query = mysqli_query($conn, $sql);
                            $user = $query->fetch_all(MYSQLI_ASSOC);
                            
                            foreach($user as $valor){ 
                            ?>
                        <tr>
                            <th scope="row"><?php echo $valor["id"]; ?></th>
                            <td><?php echo $valor["lat"]; ?></td>
                            <td><?php echo $valor["log"]; ?></td>
                            <td>
                                <a href="https://www.google.com.br/maps/@<?php echo $valor['lat']?>,<?php echo $valor['log']?>,20z"
                                    class="text-warning" target="_blank">
                                    https://www.google.com.br/maps/@<?php echo $valor["lat"]?>,<?php echo $valor["log"]?>,20z
                                </a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>

            <div class="col-12">
                <form action="limpar.php" method="POST">
                    <button type="submit" class="btn btn-danger">Limpar</button>
                </form>
            </div>

            <?php if($_GET['erro'] == "error"){ ?>
            <div class="alert_erro_server alert alert-danger alert-dismissible fade show" role="alert">
                Erro no server
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php } ?>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>

    <script>
        $(function () {
            setTimeout(function () {
                location.reload();
            }, 10000);
        })
    </script>
</body>

</html>