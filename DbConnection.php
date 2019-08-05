<?php

/**
 * Статичный класс, устанавливающий постоянное соединение с базой данных
 * 
 * Пример использования:
 * $connection = DbConnection::getDbConnection('localhost', 'user-name' 'password', 'db-name');
 * 
 */
class DbConnection
{
    /**
     * Переменная хранящая ресурс соединения mysqli
     */
    private static $con;

    /**
     * Статичный метод для создания соединения
     *
     * @param string $host Имя хоста или IP адрес
     * @param string $user Имя пользователя Mysql
     * @param string $password Пароль пользователя
     * @param string $db Имя базы данных
     * 
     * @return mysqli Ресурс соединения
     */
    public static function getDbConnection(string $host, string $user, string $password, string $db) : mysqli
    {
        if (self::$con && !is_null(self::$con)) {
            return self::$con;
        }

        self::$con = new mysqli($host, $user, $password, $db);

        if (self::$con->connect_errno) {
            exit("Не удалось подключиться к MySQL: (" . self::$con->connect_errno . ") " . self::$con->connect_error);
        }

        self::$con->set_charset("utf8");

        return self::$con;
    }
}
