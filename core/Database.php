<?php

namespace Core;

use PDO;
use PDOStatement;

final class Database
{
    private PDO $connection;
    private PDOStatement $statement;

    public function __construct(array $config, string $username = 'root', $password = '')
    {
        $dsn = 'mysql:' . http_build_query($config, '', ';');

        $this->connection = new PDO($dsn, $username, $password, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }

    public function query(string $query, array $params = []): self
    {
        $this->statement = $this->connection->prepare($query);
        $this->statement->execute($params);
        
        return $this;
    }

    public function find(): array | false
    {
        return $this->statement->fetch();
    }

    public function findAll(): array
    {
        return $this->statement->fetchAll();
    }
}