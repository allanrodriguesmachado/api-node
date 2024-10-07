<?php

declare(strict_types=1);

use App\Database\Connect;
use App\Database\Entity\UserEntity;

require_once "../vendor/autoload.php";

//try {
//    $pdo = new PDO(
//        "pgsql:host=db;port=5432;dbname=fullstack",
//        "admin",
//        "admin",
//        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
//    );

//
//    $stmt = $pdo->query("SELECT * FROM users");
//
//    while ($user = $stmt->fetch(PDO::FETCH_ASSOC)) {
//        dd($user);
//    }
//
//}catch (PDOException $exception) {
//    dd($exception);
//}

//$pdo =  Connect::getInstance();
//
//$insertSql = sprintf("INSERT INTO users (first_name) VALUES ('%s')", 'Thaina');
//
////$exec = $pdo->query($insertSql);
//
////$user = $pdo->query("SELECT * FROM users");
////dd($user->fetchAll());
////dd($exec->execute());
//
////$user = $pdo->exec("UPDATE users SET first_name = 'Alinha' WHERE id = 1");
//$user = $pdo->exec("DELETE FROM users WHERE id = 1");


//$connect = Connect::getInstance();
//$read = $connect->query("SELECT * FROM users");
//
//if (!$read->rowCount()) {
//    echo "<p>Nao teve resultados</p>";
//}
//
///** @var UserEntity $user */
//$user = $read->fetchAll(PDO::FETCH_CLASS, UserEntity::class);
//echo "<pre>";
//print_r($user->setFirstName());
//echo "</pre>", exit();
//foreach ($read->fetch() AS $item) {
//    var_dump($item);
//}

//try {
//    $pdo = Connect::getInstance();
//    $pdo->beginTransaction();
//
//    $sqlOne = "INSERT INTO users (first_name) VALUES ('Kalel')";
//    $pdo->query($sqlOne);
//
//
//    $sqlTwo = "INSERT INTO users (first_name) VALUES ('Anativa')";
//    $pdo->query($sqlTwo);
//
//    $pdo->commit();
//}catch (PDOException $exception){
//    $pdo->rollBack();
//    var_dump($exception->getMessage());
//}


//$sql = "INSERT INTO users (first_name) VALUES (?)";
//$stmt = Connect::getInstance()->prepare($sql);
//$stmt->bindValue(1, 'Allan Rodrigues Developer', PDO::PARAM_INT);
//$stmt->execute();
//var_dump($stmt->fetch());

$layer = new ReflectionClass(\App\Models\User::class);
$model = new \App\Models\User();

var_dump($model);