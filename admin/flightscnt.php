<?php

require '../helpers/init_conn_db.php';

if(!$conn){
    die("Falha na conexão");
}

$sql = "SELECT * FROM flight";
                $query = $conn->query($sql);

                echo "$query->num_rows";
?>