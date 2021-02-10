<?php

class Connection {

    private $databaseFile;
    private $connection;

    public function __construct()
    {
        $this->databaseFile = realpath(__DIR__ . "/database/db.sqlite");
        $this->connect();
    }

    private function connect()
    {
        return $this->connection = new PDO("sqlite:{$this->databaseFile}");
    }

    public function getConnection()
    {
        return $this->connection ?: $this->connection = $this->connect();
    }

    public function query($query)
    {
        $result      = $this->getConnection()->query($query);

        $result->setFetchMode(PDO::FETCH_INTO, new stdClass);

        return $result;
    }
    
    public function insertUser($name, $email)
    {
        $sql = "INSERT INTO users (name, email) VALUES (:name, :email)";
        $stmt = $this->connection->prepare($sql);    
        $stmt->execute([
            ':name' => $name,
            ':email' => $email,
        ]);

        return $this->connection->lastInsertId();
    }
    
    public function updateUser($name, $email, $id)
    {
        $sql = "UPDATE users "
                ."SET name = :name, " 
                ."    email = :email "
                ."WHERE id = :id";

        $stmt = $this->connection->prepare($sql);    
        return $stmt->execute([
            ':name' => $name,
            ':email' => $email,
            ':id' => $id,
        ]);
        
    }

    public function deleteUser($id) {
        $sql = 'DELETE FROM users '
                . 'WHERE id = :id';

        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue(':id', $id);

        $stmt->execute();

        return $stmt->rowCount();
    }    
    
    public function insertColor($name)
    {
        $sql = "INSERT INTO colors (name) VALUES (:name)";
        $stmt = $this->connection->prepare($sql);    
        $stmt->execute([
            ':name' => $name,
        ]);

        return $this->connection->lastInsertId();
    }
    
    public function updateColor($name, $id)
    {
        $sql = "UPDATE colors "
                ."SET name = :name " 
                ."WHERE id = :id";

        $stmt = $this->connection->prepare($sql);    
        return $stmt->execute([
            ':name' => $name,
            ':id' => $id,
        ]);
    }

    public function deleteColor($id) {
        $sql = 'DELETE FROM colors '
                . 'WHERE id = :id';

        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue(':id', $id);

        $stmt->execute();

        return $stmt->rowCount();
    }
    
    public function insertColorUser($color_id, $user_id)
    {
        $sql = "INSERT INTO user_colors (user_id, color_id) VALUES (:user_id, :color_id)";
        $stmt = $this->connection->prepare($sql);    
        $stmt->execute([
            ':user_id' => $user_id,
            ':color_id' => $color_id,
        ]);

        return $this->connection->lastInsertId();
    }
    
    public function deleteColorsUser($user_id)
    {
        $sql = 'DELETE FROM user_colors '
                . 'WHERE user_id = :user_id';

        $stmt = $this->connection->prepare($sql);    
        $stmt->execute([
            ':user_id' => $user_id,
        ]);

        return $stmt->rowCount();
    }
    
    public function deleteColorUser($color_id)
    {
        $sql = 'DELETE FROM user_colors '
                . 'WHERE color_id = :color_id';

        $stmt = $this->connection->prepare($sql);    
        $stmt->execute([
            ':color_id' => $color_id,
        ]);

        return $stmt->rowCount();;
    }    
    
    public function deleteSingleColorUser($color_id, $user_id)
    {
        $sql = 'DELETE FROM user_colors '
                . 'WHERE color_id = :color_id '
                . 'AND user_id = :user_id';

        $stmt = $this->connection->prepare($sql);    
        $stmt->execute([
            ':color_id' => $color_id,
            ':user_id' => $user_id,
        ]);

        return $stmt->rowCount();
    }
}