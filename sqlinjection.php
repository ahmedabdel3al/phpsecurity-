<?php
$connection = new PDO('mysql:host=127.0.0.1;dbname=phpsecurity', 'root', '');
if (isset($_POST['email'])) {
    $email = $_POST['email'];
    /**
     * By Using query method it easy to make sqlinjection in your database 
     * just insert in email input '; '; Drop Table users;--
     * this well remove users tables 
     * so avoid using  db query in your project 
     */
    //$user = $connection->query("SELECT * from users WHERE email = '{$email}'");
    /**
     * using prepare statment prevent you from sqlinjection 
     */    
    $user = $connection->prepare("SELECT * from users WHERE email = :email");
    $user->execute(['email'=>$email]);
    if ($user->rowCount()) {
        die('Send Email');
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <form action="sqlinjection.php" method="post">
        Email <input value="recover" name="email" type="text">
    </form>
</body>

</html>