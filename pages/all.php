<h1>All movies</h1>

<?php

try {
    $stmt = $pdo->query( 'SELECT * FROM filmai inner join genres on filmai.genre_id = genres.id');

} catch (Exception $e) {
    echo("errror");
}
$data = $stmt -> fetchAll ();

$pdo = null;

?>
<table class="table table-bordered table-responsive">
    <?php foreach($data as $item):?>
    <tr>
        <td><?=$item['mid'];?></td>
        <td><?=$item['title'];?></td>
        <td><?=$item['genre'];?></td>
        <td><?=$item['release_date'];?></td>
        <td><?=$item['description'];?></td>
        <td><a href="?page=delete&mid=<?=$item['mid']?>">delete</a></td>
        <td><a href="?page=update&id=<?=$item['id']?>">edit</a></td>

    </tr>
    <?php endforeach;?>
</table>
