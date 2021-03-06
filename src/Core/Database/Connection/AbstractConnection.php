<?php

namespace Core\Database\Connection;

/**
 * Class AbstractConnection
 * @package Core\Database\Connection
 */
abstract class AbstractConnection implements ConnectionInterface
{
    const MYSQLI = 'mysqli';
    const PDO    = 'pdo';

    /**
     * @var string
     */
    protected static $host;

    /**
     * @var string
     */
    protected static $user;

    /**
     * @var string
     */
    protected static $password;

    /**
     * @var string
     */
    protected static $dbName;

    /**
     * @var int
     */
    protected static $port;

    /**
     * @var string
     */
    protected static $prefix;

    /**
     * @var \PDO|\mysqli
     */
    protected static $connection;

    /**
     * AbstractConnection constructor.
     *
     * @param string      $host
     * @param string      $user
     * @param string      $password
     * @param string      $dbName
     * @param int|null    $port
     * @param string|null $prefix
     */
    public function __construct(string $host, string $user, string $password, string $dbName, int $port = null, string $prefix = null)
    {
        static::$host = $host;
        static::$user = $user;
        static::$password = $password;
        static::$dbName = $dbName;
        static::$port = $port;
        static::$prefix = $prefix;

        static::initConnection();
    }
}