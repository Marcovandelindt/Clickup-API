<?php

namespace App\Models\User;

class User
{
    protected $id;
    protected $name;
    protected $email;
    protected $clickup_access_token;
    protected $created_at;
    protected $updated_at;

    /**
     * Get the id of the user
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Get the name of a user
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Get the email of a user
     *
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * Get the Clcikup Access Token of a user
     *
     * @return string
     */
    public function getClickupAccessToken(): string
    {
        return $this->clickup_access_token;
    }

    /**
     * Set a clickup access token for a user
     *
     * @param string $clickupAccessToken
     */
    public function setClickupAccessToken($clickupAccessToken)
    {
        $this->clickup_access_token = $clickupAccessToken;
    }

    /**
     * Get a user by id
     *
     * @param int $id
     */
    public static function getById($id)
    {

    }
}