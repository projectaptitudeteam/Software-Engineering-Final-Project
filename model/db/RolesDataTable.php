<?php

require_once __DIR__ . "../obj/Role.php";

class RolesDataTable
{
    /**
     * Get all rolls from the database
     * @return array|false
     */
    public function getRoles() : array|false {
        $db = Database::getDB();
        $query = "SELECT * FROM roles WHERE disabled = 0";
        $statement = $db->prepare($query);
        $statement->execute();
        $data = $statement->fetchAll();
        $roles = array();
        foreach($data as $row) {
            $roles[] = new Role($row["id"], $row["name"], $row["displayName"]);
        }
        if ( $statement->errorCode() !== "0" || sizeof($roles) === 0)
            return false;
        else
            return $roles;
    }

    /**
     * @param string $name
     * @return int|false
     */
    public function getRoleIdFromName(string $name) : int|false {
        $db = Database::getDB();
        $query = 'SELECT id FROM roles WHERE name=:name AND disabled = 0';
        $statement = $db->prepare($query);
        $statement->execute();
        $data = $statement->fetch();
        $id = $data["id"];
        if( $statement->errorCode() !== "0" || ! is_int($id))
            return false;
        else
            return $id;
    }
}