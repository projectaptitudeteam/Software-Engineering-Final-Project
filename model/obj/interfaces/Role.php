<?php

class Role implements RoleInterface
{
    public function __construct(private int $id, private string $name, private string $displayName) {

    }
    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDisplayName(): string
    {
        return $this->displayName;
    }
}