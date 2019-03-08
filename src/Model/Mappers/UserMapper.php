<?php

declare(strict_types = 1);

namespace Model\Mappers;

use Model\Repository;

class UserMapper 
{	 
	private $storageAdapter; 

	public function __construct(IUser $storage) 
	{
		 $this->storageAdapter = $storage;
	} 

	public function getById(int $id): ?Entity\User
	{
		 return $this->storageAdapter->getById($id);
	}

	public function getByLogin(string $login): ?Entity\User
	{
		return $this->storageAdapter->getByLogin($login);
	}

	private function createUser(array $user): Entity\User
	{
		return $this->storageAdapter->createUser($user);
	}

	private function getDataFromSource(array $search = [])
	{
		return $this->storageAdapter->getDataFromSource($search = []);
	}

}

