<?php
$connection = new PDO("sqlite:./database/people.db");

$query = <<<SQL
    CREATE TABLE IF NOT EXISTS people (
        name TEXT PRIMARY KEY,
        age INT
    )
SQL;

$connection->exec($query);
var_dump($connection->query("SELECT * FROM people")->fetchAll(\PDO::FETCH_ASSOC));
