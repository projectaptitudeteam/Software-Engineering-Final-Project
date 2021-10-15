<?php

class UserDataTable
{
    public static function authenticateUser(string $username, string $password, string $role) : bool {
        $db = Database::getDB();
        $query = 'SELECT * FROM users WHERE username=:username AND password=:password AND role=:role';
        $statement = $db->prepare($query);
        $statement->bindParam(":username", $username);
        $statement->bindParam(":password", $password);
        $statement->bindParam(":role", $role);
        $statement->execute();
        $data = $statement->fetchAll();
        if ( $statement->errorCode() !== "0" || sizeof($data) === 0) {
            return false;
        } else if(sizeof($data) === 1) {
            return true;
        }
        return false;
    }

    public static function createUser(UserInterface $user): bool
    {
        $db = Database::getDB();
        $query = 'INSERT INTO 
                users (username, password, firstName, lastName, uuid, role, email, lastLoginTimestamp)
            VALUES
                (:username, :password, :firstName, :lastName, :uuid, :role, :email, :lastLoginTimestamp)';
        $statement = $db->prepare($query);
        $statement->bindValue(":username", $user->getUsername());
        $statement->bindValue(":password", $user->hashPassword());
        $statement->bindValue(":firstName", $user->getFirstName());
        $statement->bindValue(":lastName", $user->getLastName());
        $statement->bindValue("uuid", "");
        $statement->bindValue(":role", $user->getRole());
        $statement->bindValue(":email", $user->getEmailAddress());
        $statement->bindValue(":lastLoginTimestamp", date("Y-m-d H:i:s"));
        $success = $statement->execute();
        if (($statement->errorCode() !== "0") && ($success === false)) {
            return false;
        } else {
            return true;
        }
    }
}