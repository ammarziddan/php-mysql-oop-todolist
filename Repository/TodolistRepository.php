<?php

namespace Repository {

    use Entity\Todolist;
    use PDO;

    interface TodolistRepository
    {
        public function save(Todolist $todolist): void;

        public function remove(int $number): bool;

        public function findAll(): array;
    }

    class TodolistRepositoryImpl implements TodolistRepository
    {
        public array $todolist = [];
        private PDO $connection;

        public function __construct(PDO $connection)
        {
            $this->connection = $connection;
        }

        public function save(Todolist $todolist): void
        {
            /* $number = count($this->todolist) + 1; */
            /* $this->todolist[$number] = $todolist; */

            $sql = "INSERT INTO todolist(todo) VALUES(?)";
            $statement = $this->connection->prepare($sql);
            $statement->execute([$todolist->getTodo()]);
        }

        public function remove(int $number): bool
        {

            /* if ($number > count($this->todolist) || $number < 1) { */
            /*     return false; */
            /* } */
            /**/
            /* for ($i = $number; $i < count($this->todolist); $i++) { */
            /*     $this->todolist[$i] = $this->todolist[$i + 1]; */
            /* } */
            /**/
            /* unset($this->todolist[count($this->todolist)]); */
            /**/
            /* return true; */

            $sql = "SELECT id FROM todolist WHERE id = ?";
            $statement = $this->connection->prepare($sql);
            $statement->execute([$number]);

            if ($statement->fetch()) {
                // todolist ada
                $sql = "DELETE FROM todolist WHERE id = ?";
                $statement = $this->connection->prepare($sql);
                $statement->execute([$number]);

                return true;
            } else {
                // todolist tidak ada
                return false;
            }

        }

        public function findAll(): array
        {
            /* return $this->todolist; */
            $sql = "SELECT id, todo FROM todolist";
            $statement = $this->connection->prepare($sql);
            $statement->execute();

            $result = [];

            foreach ($statement as $row) {
                $todolist = new Todolist();
                $todolist->setId($row['id']);
                $todolist->setTodo($row['todo']);

                $result[] = $todolist;
            }

            return $result;
        }
    }
}
