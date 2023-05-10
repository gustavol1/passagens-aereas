<?php

require '../helpers/init_conn_db.php';

if(!$conn){
    die("Falha na conexão");
}

$sql = "SELECT * FROM airline";
                $query = $conn->query($sql);

                echo "$query->num_rows";
?><!-- Visit codeastro.com for more projects -->