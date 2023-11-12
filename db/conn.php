<?php 

$host = '127.0.0.1';
$db = 'attendance_db';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host; dbname=$db; charset=$charset";

try { 
    $pdo = new PDO($dsn, $user, $pass); 
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    require_once 'Crud.php'; // Assuming 'Crud.php' is the correct file name
    $crud = new crud($pdo);

} catch (PDOException $e) {   
    // Log the error
    error_log($e->getMessage());
    // Display a user-friendly message
    http_response_code(500);
    echo "Database connection failed. Please try again later.";
    exit;
}

?>
