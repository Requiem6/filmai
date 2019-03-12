<h1>Manage moviess</h1>

<?php

try {
    $stmt = $pdo->query( 'SELECT * FROM filmai inner join genres on filmai.genre_id = genres.id');

} catch (Exception $e) {
    echo("klaida");
}
$data = $stmt -> fetchAll ();

$pdo = null;

?>


<table class="table table-bordered table-responsive">
    <?php foreach($data as $item):?>
        <tr>
            <td><?=$item['id'];?></td>
            <td><?=$item['title'];?></td>
            <td><?=$item['genre'];?></td>
            <td><?=$item['release_date'];?></td>
            <td><?=$item['description'];?></td>
            <td><a class="" href="pages/delete.php?">Delete</a></td>
        </tr>

    <?php endforeach;?>
</table>
