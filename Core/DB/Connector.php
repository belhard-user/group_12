<?php

namespace Core\DB;

class Connector
{
    public static function getConnection($config)
    {
        return new \PDO(
            "mysql:dbname={$config['dbname']}",
            $config['user'],
            $config['password'],
            $config['options']
        );
    }
}