<?php 

$host = '127.0.0.1';
$db = 'attendance_db';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

//$host = 'sql101.infinityfree.com';
//$db = 'if0_35407295_attendee';
//$user = 'if0_35407295';
//$pass = '1LnCUKaXBgX2';
//$charset = 'utf8mb4';



$dsn = "mysql:host=$host; dbname=$db; charset=$charset";

try { 
    $pdo = new PDO($dsn, $user, $pass); 


    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

 } catch (PDOException $e){

    throw new PDOException($e->getMessage());


 }
    require_once 'crud.php'; // Assuming 'Crud.php' is the correct file name
    $crud = new crud($pdo);


?>
