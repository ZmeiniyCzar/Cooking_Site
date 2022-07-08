<?php
    $login='admin';
    $password='admin';

    $data=$_POST;
    if(isset($data['registration'])){
        $errors=array();
        if ($data['login_reg']!=$login){
            $errors[]='Введен некорректный логин';
        }
        if ($data['password_reg']!=$password){
            $errors[]='Введен некорректный пароль';
        }
        if (empty($errors)){
            echo '<div class="alert alert-success">Вы успешно заполнинили все данные!</div>';
        }else{
            echo '<div class="alert alert-danger">'.array_shift($errors).'</div>';
        }
    }


?>
