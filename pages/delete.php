<?php
$mid = $_GET['mid'];
try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $e) {
    echo "can't connect";
    throw new PDOException($e->getMessage(), (int)$e->getCode());
    exit;
}
try{
    $stmt = $pdo->query("DELETE FROM filmai WHERE mid='$mid' ");
}
catch(Exception $e){
    echo "genre data unavailible";
    exit;
}
header('Location: ?page=all');