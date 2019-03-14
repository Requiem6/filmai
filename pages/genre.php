<h1>Genres</h1>
<?php

try {
    $stmt = $pdo->query( 'SELECT * FROM genres');

} catch (Exception $e) {
    echo("error");
}
$data = $stmt -> fetchAll ();

$pdo = null;

?>
<select>
    <?php foreach($data as $item):?>
    <option><?=$item['id'];?></option>

</select>
<?php endforeach;?>

