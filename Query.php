<?php

/**
 * Класс, позволяющий получить результат запроса к базе данных
 * 
 * Пример использования:
 * $queryConnection = new Query('localhost', 'user-name', 'password', 'db-name');
 * $result = $queryConnection->getQueryResult("SELECT * FROM table");
 */
class Query
{
    /**
     * Переменная хранящая ресурс соединения mysqli
     */
    private $connection;

    /**
     * Функция-конструктор, присваивающая переменной $connection ресурс соединения mysqli
     *              (новый или созданный ранее при помощи статичного класса DbConnection)
     * 
     * @param string $host Имя хоста или IP адрес
     * @param string $user Имя пользователя Mysql
     * @param string $password Пароль пользователя
     * @param string $db Имя базы данных
     * 
     * @return void Функция ничего не возвращает
     */
    public function __construct(string $host, string $user, string $password, string $db)
    {
        $this->connection = DbConnection::getDbConnection($host, $user, $password, $db);
    }

    /**
     * Выполняет запрос к базе данных и возвращает массив с выборкой (пустой массив в случае ошибки)
     * 
     * @param string $sql Строка SQL-запроса
     * 
     * @return array Массив с выборкой или пустой массив, если при выполнении запроса произошла ошибка 
     */
    public function getQueryResult(string $sql) : array
    {
        $result = $this->connection->query($sql);

        if (!$result) {
            print("Ошибка MySQL: " . $this->connection->error);
            return [];
        }

        $arr = $result->fetch_all(MYSQLI_ASSOC);
        array_walk_recursive($arr, function (&$value, $key) {
            $value = strip_tags($value);
        });

        return $arr;
    }
}