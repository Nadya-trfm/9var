<?php


namespace vendor\core;


use http\Params;

class Db
{
    protected $pdo;
    protected static $instance;
    public static $countSql = 0;
    public static $queries = [];

    protected function __construct()
    {
        $db = require ROOT . '/config/config_db.php';
        $options = [
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
        ];
        # передаем настройки подклбчения
        $this->pdo = new \PDO($db['dsn'], $db['user'], $db['pass'], $options);
    }

    public static function instance()
    {
        if(self::$instance === null)
        {
            self::$instance = new self;
        }
        return self::$instance;
    }
    # выполняет Sql запрос без данных из базы| true or false
    public function execute($sql, $params = [])
    {
        self::$countSql++;
        self::$queries[] = $sql;
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute($params);
    }
    # выполняет Sql запрос, озвращает данные из базы
    public function query($sql, $params = [])
    {
        self::$countSql++;
        self::$queries[] = $sql;
        $stmt = $this->pdo->prepare($sql);
        $res = $stmt->execute($params);
        if($res !== false)
        {
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        }
        return  [];
    }
}