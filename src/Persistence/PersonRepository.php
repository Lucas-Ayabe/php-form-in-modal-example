<?php

namespace Lucas\AjaxInModal\Persistence;

use Lucas\AjaxInModal\Models\Person;
use PDO;

class PersonRepository
{
    public function __construct(private PDO $connection)
    {
    }

    public function create(Person $person): void
    {
        $stmt = $this
            ->connection
            ->prepare("INSERT INTO people VALUES (:name, :age)");

        $stmt->execute((array) $person);
    }

    public function update(Person $person): void
    {
        $query = <<<SQL
            UPDATE people
            SET name = :name, age = :age
            WHERE name = :name
        SQL;

        $stmt = $this
            ->connection
            ->prepare($query);

        $stmt->execute((array) $person);
    }

    public function findAll(): array
    {
        return $this
            ->connection
            ->query("SELECT * FROM people")
            ->fetchAll(
                \PDO::FETCH_FUNC,
                fn (string $name, int $age) => new Person($name, $age)
            );
    }

    public function find(string $name): ?Person
    {
        $stmt = $this
            ->connection
            ->prepare("SELECT * FROM people WHERE name = ?");
        $stmt->execute([$name]);

        [$person] = $stmt->fetchAll(
            \PDO::FETCH_FUNC,
            fn (string $name, int $age) => new Person($name, $age)
        );

        return $person;
    }
}
