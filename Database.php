<?php

class Database
{
    public PDO $connection;

    public function __construct(array $config, string $username = 'root', $password = '')
    {
        $dsn = 'mysql:' . http_build_query($config, '', ';');

        $this->connection = new PDO($dsn, $username, $password, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }

    public function query(string $query, array $params = []): PDOStatement
    {
        $statment = $this->connection->prepare($query);
        $statment->execute($params);
        
        return $statment;
    }
}