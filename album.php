<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Discografia - Tião Carreiro e Pardinho</title>
    <link rel="stylesheet" href="css/index.css">
</head>
<body>
    <div class="wrapper">
        <div class="header">
            <div class="column"><image src="Assets/logo.png" /> </div>
            <div class="column"><h1 align="right">Discografia</h1></div>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div>
                    <?php
                    require_once "config.php";
                    $album_id = $_GET["id"];
                    if(isset($album_id)) {
                        $query = "SELECT * FROM Album where id = $album_id;";
                    }
                    
                    $result = $link->query($query);

                    if($result){
                        if($result->num_rows == 1){
                            $row = $result->fetch_assoc();
                            echo "<p><strong>Álbum " . $row['nome'] . ", " . $row['ano'] . "</strong></p>";
                            echo '<a href="album?id=' . $row['id'] . '">editar</a>';
                            $query2 = "SELECT * FROM Faixa where album_id = " . $row['id'] . " order by numero;";
                            
                            $result2 = $link->query($query2);
                            echo '<table>';
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>#</th>";
                                        echo "<th>Nome</th>";
                                        echo "<th>Duração</th>";
                                        echo "<th>Ações</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row2 = $result2->fetch_assoc()){
                                    echo "<tr>";
                                        echo "<td>" . $row2['numero'] . "</td>";
                                        echo "<td>" . $row2['nome'] . "</td>";
                                        echo "<td>" . $row2['duracao'] . "</td>";
                                        echo "<td></td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            $result2->free();
                            $result->free();
                        } else{
                            echo '<div class="alert alert-danger"><em>Álbum não encontrado.</em></div>';
                        }
                    } else{
                        echo "Erro interno, consulte o administrador. ";
                    }
                    
                    $link->close();
                    ?>
                </div>
            </div>        
        </div>
    </div>
    <script src="script/index.js"></script>
</body>
</html>