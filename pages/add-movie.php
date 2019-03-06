<?php
include_once 'inc/config.php';
try {
$pdo = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $e) {
echo "Connection error";
throw new PDOException($e->getMessage(), (int)$e->getCode());
exit;
}
try{
$stmt = $pdo->query('SELECT * FROM genres');
}
catch(Exception $e){
echo "genres aren't reachable";
exit;
}
$data = $stmt->fetchAll();
$pdo =null;
if (isset($_POST["Submit"])){
try {
$pdo = new PDO($dsn, $user, $pass, $options);
// set the PDO error mode to exception
$stmt = "INSERT INTO Filmai (genre_id, title, description, release_date)
VALUES (:genre_id, :title, :description, :release_date)";
$querie= $pdo -> prepare($stmt);
$querie->execute(array(
':genre_id'=>$_POST['genre'],
':title'=>$_POST['title'],
':description'=>$_POST['description'],
':release_date'=>$_POST['release_date'],
));

}
catch(PDOException $e)
{
echo "something went wrong";
}
$conn = null;
}
?>



<form METHOD="POST" >
    <fieldset>
        <legend>Add a movie</legend>
        <span>title:</span><br>
        <input type="text" name="title" ><br>
        <span>Genre:</span><br>
        <select name="genre" ><br>
            <?php foreach ($data as $value):?>
                <option value="<?=$value["id"] ?>"><?=$value["genre"] ?></option>
            <?php endforeach ?>
        </select><br>
        <span>descripyion:</span><br>
        <input type="text" name="description" ><br>
        <span>Release date:</span><br>
        <input type="date" name="release_date"><br>
        <input type="submit" name="Submit">
    </fieldset>
</form>



