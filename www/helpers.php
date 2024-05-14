<?php
function validateName($name)
{
    if (!empty($name)) return true; else return false;
}
function validateSurname($surname)
{
    if (!empty($surname)) return true; else return false;
}
function validateEmail($email): bool
{
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) return true; else return false;
}
function emailIsUnique($email): bool
{
    global $users;

    if (count($users) === 0) {
        return true;
    }

    foreach ($users as $user) {
        if ($user->email === $email) return false; else return true;
    }
}
function validatePassword($password): bool
{
    if (strlen($password) >= 8) return true; else return false;
}
function passwordIsConfirm($password, $passwordConform):bool
{
    if ($password === $passwordConform) return true; else return false;
}
function addError($error)
{
    $_SESSION['errors'][] = $error;
}
function getErrors(): array | bool
{
    if (!empty($_SESSION['errors']))
    {
        return $_SESSION['errors'];
    }

    return false;
}
function getUsers(): array
{
    $usersJson = file_get_contents('users.php');
    return json_decode($usersJson);
}
function addLog($log)
{
    file_put_contents('logs.txt', "$log\n", FILE_APPEND);
}
function addNewUser($id, $email, $name)
{
    global $users;

    $users[] = ['id' => $id, 'email' => $email, 'name' => $name];
    $userJson = json_encode($users);
    file_put_contents('users.php', $userJson);
}
function defineNewUserId()
{
    global $users;

    if (count($users) > 0)
    {
        $lastUserId = end($users)->id;
        return ++$lastUserId;
    }

    $userId = 1;
    return $userId;
}


