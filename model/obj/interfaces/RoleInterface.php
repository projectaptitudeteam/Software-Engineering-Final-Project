<?php

interface RoleInterface
{
    public function getId() : int;
    public function getName() : string;
    public function getDisplayName() : string;
}