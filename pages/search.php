<h1>Search for a movie</h1>
<?php
if (isset($_POST["submit"])) {
    $keyword = $_POST["search"];
    try {
        $pdo = new PDO($dsn, $user, $pass, $options);
    } catch (Exception $e) {
        echo 'Negaliu prisijungti prie DB<br>';
        echo $e->getMessage();
        exit;
    }
    try {
        $stmt="SELECT * FROM filmai inner join genres on filmai.genre_id = genres.id WHERE title LIKE :keyword";
        $q=$pdo->prepare($stmt);
        $q->bindValue(':keyword','%'.$keyword.'%');
        $q->execute();
    } catch (Exception $e) {
        echo 'Klaida: Negaliu gauti duomenų iš DB';
        exit;
    }
    $data = $q->fetchAll();
    if (empty($data)){
        echo "Filmas nerastas";
    }
}
?>


<div class="container-fluid">
    <form action="" method="post">
        <input type="text" placeholder="Ieškoti..." name="search">
        <button type="submit" class="btn btn-primary" name="submit">Ieškoti</button>
    </form>
</div>
<?php if(isset($_POST["submit"]) && !empty($data)):?>
    <div class="container search-results">
        <table class="table table-bordered table-responsive">
            <thead>
            <tr>
                <th>ID</th>
                <th>title</th>
                <th>genre</th>
                <th>description</th>
                <th>release date</th>
            </tr>
            </thead>
            <?php foreach($data as $item):?>
                <tbody>
                <tr>
                    <td><?=$item['id'];?></td>
                    <td><?=$item['title'];?></td>
                    <td><?=$item['genre'];?></td>
                    <td><?=$item['description'];?></td>
                    <td><?=$item['release_date'];?></td>
                </tr>
                </tbody>
            <?php endforeach;?>
        </table>
    </div>
<?php endif;?>