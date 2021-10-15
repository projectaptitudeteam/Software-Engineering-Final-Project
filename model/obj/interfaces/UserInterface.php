<?php

interface UserInterface
{
    public function hashPassword(int $times = 1000) : string;
    public function getPassword() : string;
    public function getUsername() : string;
    public function getFirstName() : string;
    public function getLastName() : string;
    public function getEmailAddress() : string;
    public function getRole() : string;
    public function getUUID() : string;
    public function getID() : int;
    public function passwordMatches(string $password) : bool;

}