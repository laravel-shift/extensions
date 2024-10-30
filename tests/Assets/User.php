<?php

namespace LaravelDoctrineTest\Extensions\Assets;

use Illuminate\Contracts\Auth\Authenticatable;

class User implements Authenticatable
{
    public $id = 1;
    public $name = 'John Doe';

    public function getAuthIdentifierName()
    {
        return 'id';
    }

    public function getAuthIdentifier()
    {
        return $this->id;
    }

    public function getUserIdentifier()
    {
        return $this->id;
    }

    public function getAuthPassword()
    {
        return 'password';
    }

    public function getRememberToken()
    {
        return 'token';
    }

    public function setRememberToken($value)
    {
        return;
    }

    public function getRememberTokenName()
    {
        return 'token';
    }

    public function getAuthPasswordName()
    {
        // TODO: Implement getAuthPasswordName() method.
    }
}
