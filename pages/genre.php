<h1>Genres</h1>
<?php

try {
    $stmt = $pdo->query( 'SELECT * FROM genres');

} catch (Exception $e) {
    echo("klaida");
}
$data = $stmt -> fetchAll ();

$pdo = null;

?>

