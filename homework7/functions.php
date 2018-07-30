<?php

function getUsersList() { //Возвращает массив всех пользователей: логин и хэш его пароля
    return [
        ['login' => 'Петя', 'password' => '$2y$10$FTfScgqGITcNDBghf8TxFuXy9kDX0Ut9QbsOUyWn8oV.KZ8tAmkhO'],//123
        ['login' => 'Маша', 'password' => '$2y$10$K08wEkLvJebSbByoBjyA2e.HwefLmGjnTNw5LhKsdaVR4UWV0WZgS'],//345
        ['login' => 'Юра', 'password' => '$2y$10$BJIv.LiOFQQN1O6Ov7biAOoUwlLowaeydejXN7KyezmFiQhaU42Ue'],//567
        ['login' => 'Аня', 'password' => '$2y$10$oHjA4MiABWtueD0InhtwnOlqpysLHUtz3DLGE6ffhGdobKJnFi9iu']//891
    ];

}

assert( true === is_array( getUsersList() ) ); //результат должен быть массивом


function existsUser($login) { //Проверяет существование логина в массиве пользователей
    if ( in_array( $login, array_column( getUsersList(),'login' ) ) ) {

        return true;
    }

    return false;
}

assert( true === is_bool( existsUser('1') ) ); //результат должен быть типа boolean


function checkPassword($login, $password) { //аунтентификация
    if ( existsUser($login) ) { //если пользователь существует

        $ul = getUsersList();

        foreach ($ul as $user) { //перебираю пользователей

            if ( $login == $user['login'] ) { //если логин найден

                return password_verify($password, $user['password']);
            }
        }
    }

    return false;
}

assert( true === is_bool( checkPassword('Петя','1') ) ); //результат должен быть типа boolean
assert( false === checkPassword('','') ); //false


function getCurrentUser() { //возвращает имя пользователя
    if ( PHP_SESSION_ACTIVE === session_status() ) { // если механизм сессий вкл и сессия создана
        if ( isset( $_SESSION['username'] ) ) { // и если существует индекс username в массиве сессии
            if ( existsUser( $_SESSION['username'] ) ) {

                return $_SESSION['username'];
            }
        }
    }

}

assert( null === getCurrentUser() ); //результат должен быть null (т.к. не запущенна сессия)


const FILENAME_LOG = __DIR__ . '/log.txt';

function putLog($log) {

    $log = date('Y-m-d H:i:s') . ' ' . $log . "\n";

    file_put_contents( FILENAME_LOG, $log, FILE_APPEND );

}

