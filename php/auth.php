<?php
$login = filter_var(trim($_POST['login_enter']), FILTER_SANITIZE_STRING);
$password = filter_var(trim($_POST['password_enter']), FILTER_SANITIZE_STRING);

$password1 = md5($password. "12345");
$link=mysqli_connect("localhost", "root", "", "validat");

$sql="SELECT * FROM users";
$result1=mysqli_query($link,$sql);
$user = mysqli_fetch_assoc($result1);
$rows=mysqli_fetch_all($result1, MYSQLI_ASSOC);


echo "<pre>"; print_r($result1); echo "</pre>";
echo "<pre>"; print_r($user); echo "</pre>";
echo "<pre>"; print_r($rows); echo "</pre>";
echo "<pre>"; print_r($login); echo "</pre>";
echo "<pre>"; print_r($password1); echo "</pre>";

foreach($rows as $row){
    if($row["login"]==$login){
        if($row["password"]==$password1){
            setcookie('user', $user['name'], time() + 3600, "/");
            echo "Добро пожаловать, ".$row["name"];
        }else{
            echo "Логин или праоль введены неверно";
            exit();
        }
    }else{
        echo "Логин или праоль введены неверно";
        exit();
    }
}
$link->close();
?>
