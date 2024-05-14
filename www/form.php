<?php
require_once 'helpers.php';

$users = getUsers();
$date = date('Y-d-m H:i:s');

$name = $_POST['name'];
$surname = $_POST['surname'];
$email = $_POST['email'];
$password = $_POST['password'];
$passwordConfirm = $_POST['passwordConfirm'];

if (!validateName($name))
{
    $message = 'Укажите ваше имя. Без ввода имени регистрация невозможна';
    echo $message . '<br>';
    $log = "$date: $message";
    addLog($log);
    addError($message);
}

if (!validateSurname($surname))
{
    $message = 'Укажите вашу фамилию. Без ввода фамилии регистрация невозможна';
    echo $message . '<br>';
    $log = "$date: $message";
    addLog($log);
    addError($message);
}

if (!validateEmail($email))
{
    $message = 'Неверный формат электронной почты';
    echo $message . '<br>';
    $log = "$date: $message";
    addLog($log);
    addError($message);
}

if (!emailIsUnique($email))
{
    $message = 'Пользователь с таким адресом эл. почты уже существует';
    echo $message . '<br>';
    $log = "$date: $message";
    addLog($log);
    addError($message);
}

if (!validatePassword($password))
{
    $message = 'Пароль слишком короткий. Минимальная длина пароля - 8 символов';
    echo $message . '<br>';
    $log = "$date: $message";
    addLog($log);
    addError($message);
} elseif (!passwordIsConfirm($password, $passwordConfirm)) {
    $message = 'Пароли не совпадают';
    echo $message . '<br>';
    $log = "$date: $message";
    addLog($log);
    addError($message);
}

if (!getErrors())
{
    $id = defineNewUserId();
    addNewUser($id, $email, $name);

    $message = 'Регистрация нового пользователя прошла успешно';
    echo $message;
    $log = "$date: $message";
    addLog($log);
}
