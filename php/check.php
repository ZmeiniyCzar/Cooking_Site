<?php
$login = filter_var(trim($_POST['login_reg']), FILTER_SANITIZE_STRING);
$name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
$password = filter_var(trim($_POST['password_reg']), FILTER_SANITIZE_STRING);

if (mb_strlen($login) < 5 && mb_strlen($login) > 90) {
    echo "Неподходящая длина логина";
    exit();
} else if (mb_strlen($name) < 5) {
    echo "Неподходящая длина имени.";
    exit();
}

$password1 = md5($password . "newpassword");

$link=mysqli_connect("localhost", "root", "", "validat");
$sql="SELECT * FROM users WHERE login = '$login'";

$res=$link->query($sql);
$user2=mysqli_fetch_assoc($res);

if ($user2) {
    echo "Данный логин уже используется!";
    $link->close();
}else{
    $sql2="INSERT INTO users (name, login, password) VALUES('$name','$login', '$password1')";
    $link->query($sql2);
    $link->close();
}


exit();


?>

