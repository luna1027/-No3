<?php
session_start();
date_default_timezone_set("Asia/Taipei");

$Trailer = new DB('trailer');
$Movie = new DB('movie');

class DB
{
    protected $dsn = "mysql:host=localhost;charset=utf8;dbname=db30";
    protected $table;
    protected $pdo;

    public $level = [
        1 => '普遍級',
        2 => '輔導級',
        3 => '保護級',
        4 => '限制級'
    ];

    public $session = [
        1 => '14:00~16:00',
        2 => '16:00~18:00',
        3 => '18:00~20:00',
        4 => '20:00~22:00',
        5 => '22:00~24:00'
    ];

    public function __construct($table)
    {
        $this->table = $table;
        $this->pdo = new PDO($this->dsn, 'root', '');
    }

    protected function arrayToSqlArray($array)
    {
        foreach ($array as $key => $value) {
            $arr[] = "`$key`='$value'";
        }
        return $arr;
    }

    public function all(...$args)
    {
        $sql = " SELECT * FROM `$this->table` ";
        if (isset($args[0]) && is_array($args[0])) {
            $sql .= " WHERE " . join(" && ", $this->arrayToSqlArray($args[0]));
        } elseif (isset($args[0])) {
            $sql .= $args[0];
        }

        if (isset($args[1]) && is_array($args[1])) {
            $sql .= join(" && ", $this->arrayToSqlArray($args[1]));
        } elseif (isset($args[1])) {
            $sql .=  $args[1];
        }
        // echo $sql;
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find($args)
    {
        $sql = " SELECT * FROM `$this->table` WHERE ";
        if (is_array($args)) {
            $sql .= join(" && ", $this->arrayToSqlArray($args));
        } else {
            $sql .= "`id`= " . $args;
        }
        return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
    }

    public function del($args)
    {
        $sql = " DELETE FROM `$this->table` WHERE ";
        if (is_array($args)) {
            $sql .= join(" && ", $this->arrayToSqlArray($args));
        } else {
            $sql .= "`id`=" . $args;
        }
        echo $sql;
        return $this->pdo->exec($sql);
    }

    public function save($save)
    {
        // prr($save);
        if (isset($save['id'])) {
            $id = $save['id'];
            unset($save['id']);
            $sql = "UPDATE `$this->table` SET " . join(",", $this->arrayToSqlArray($save)) . " WHERE `id`=$id";
        } else {
            $keys = [];
            $value = [];
            foreach ($save as $key => $value) {
                $keys[] = "`$key`";
                $values[] = "'$value'";
            }
            // prr($keys);
            $sql = "INSERT INTO `$this->table`(" . join(",", $keys) . ") VALUES (" . join(",", $values) . ")";
        }
        echo $sql;
        return $this->pdo->exec($sql);
    }

    // Math
    public function count($args)
    {
        return $this->visualBasic('count', '*', $args);
    }

    public function max($field, $args)
    {
        return $this->visualBasic('max', $field, $args);
    }

    public function min($field, $args)
    {
        return $this->visualBasic('min', $field, $args);
    }

    public function sum($field, $args)
    {
        return $this->visualBasic('sum', $field, $args);
    }

    public function avg($field, $args)
    {
        return $this->visualBasic('avg', $field, $args);
    }

    protected function visualBasic($math, $field, $args)
    {
        $sql = "SELECT $math($field) FROM `$this->table` ";
        if ($args !== 1) {
            if (is_array($args)) {
                $sql .= " WHERE " . join(" && ", $this->arrayToSqlArray($args));
            } else {
                $sql .= " WHERE " . $args;
            }
        }

        return $this->pdo->query($sql)->fetchColumn();
    }
}

function prr($array)
{
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}

function q($sql)
{
    $dsn = "mysql:host=localhost;charset=utf8;dbname=db10";
    $pdo = new PDO($dsn, 'root', '');
    return $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
}

function to($url)
{
    header("location:" . $url);
}
