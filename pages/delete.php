<?php
$mid = $_GET['mid'];
try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $e) {
    echo "Prisijungimo klaida";
    throw new PDOException($e->getMessage(), (int)$e->getCode());
    exit;
}
try{
    $stmt = $pdo->query("DELETE FROM filmai WHERE mid='$mid' ");
}
catch(Exception $e){
    echo "Zanru duomenys nepasiekiami";
    exit;
}
header('Location: ?page=manage-movies');