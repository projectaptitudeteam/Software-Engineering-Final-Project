<?php

use JetBrains\PhpStorm\Pure;

require_once __DIR__ . "/interfaces/UserInterface.php";

class User implements UserInterface
{
    public function __construct(private int $id, private string $username, private string $password, private string $firstName, private string $lastName, private string $uuid, private string $role, private string $email) {

    }

    public function hashPassword(int $times = 50) : string {
        if($times === 0) return $this->getPassword();
        $this->password = password_hash($this->getPassword(), PASSWORD_BCRYPT);
        return $this->hashPassword($times - 1);
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function getEmailAddress(): string
    {
        return $this->email;
    }

    public function getRole(): string
    {
        return $this->role;
    }

    public function getUUID(): string
    {
        return $this->uuid;
    }

    public function getID(): int
    {
        return $this->id;
    }

    #[Pure] public function passwordMatches(string $password): bool
    {
        return strcmp($password, $this->getPassword()) === 0;
    }
}