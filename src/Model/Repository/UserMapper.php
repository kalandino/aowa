<?php

declare(strict_types = 1);

namespace Model\Repository;

use Model\Entity;

class UserMapper
{
    private $storageAdapter;

    public function __construct(IStorageAdapter $storage)
    {
         $this->storageAdapter = $storage;
    }

    /**
     * Получаем пользователя по идентификатору
     *
     * @param int $id
     * @return Entity\User|null
     */
    public function getById(int $id): ?Entity\User
    {
        foreach ($this->storageAdapter->getDataFromSource(['id' => $id]) as $user) {
            return $this->storageAdapter->createUser($user);
        }

        return null;
    }

    /**
     * Получаем пользователя по логину
     *
     * @param string $login
     * @return Entity\User
     */
    public function getByLogin(string $login): ?Entity\User
    {
        foreach ($this->storageAdapter->getDataFromSource(['login' => $login]) as $user) {
            if ($user['login'] === $login) {
                return $this->storageAdapter->createUser($user);
            }
        }

        return null;
    }
}
