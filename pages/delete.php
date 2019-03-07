<?php

$id= $_GET['id'];

try{

    $stmt = $pdo->query('DELETE FROM filmai WHERE id '['id']);

}
catch (exception $e){
    echo "klaida";
    exit;
}
$data = $stmt->fetchALL();
$pdo = null;

?>
lol
