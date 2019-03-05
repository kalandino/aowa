<?php

class User 
{
	 private $email; 
	private $username; 

	public function __construct( string $username, string $email) 
	{
		 $this ->email = $email; 
		$this ->username = $username;
	}

	public function getEmail() { /**/ } 
	public function getUserName() { /**/ }
} 



class UserMapper 
{	 
	private $storageAdapter; 

	public function __construct( IStorageAdapter $storage) 
	{
		 $this ->storageAdapter = $storage; 
	} 

	public function findById( int $id): User 
	{
		 $result = $this->storageAdapter->find($id);

		if ($result === null ) { 
			throw new Exception ( 'User #' . $id . ' not found' );
		}

		return $this->mapRowToUser($result);
	}

	private function mapRowToUser(array $row): User 
	{
		 return new User ($row[ 'username' ],$row[ 'email' ]);
	} 
} 



public function testDataMapper( IStorageAdapter $adapter) 
{
	 $mapper = new UserMapper ($adapter); 
	$user = $mapper->findById( 1 );
}



// Identity Map 

class IdentityMap 
{ private $identityMap = []; 
public function add( IDomainObject $obj) 
{ $key = $this ->getGlobalKey( get_class ($obj), $obj->getId()); 
$this ->identityMap[$key] = $obj; } 
public function get( string $classname, int $id) 
{ $key = $this ->getGlobalKey($classname, $id); 
if ( isset ( $this ->identityMap[$key])) { 
return $this ->identityMap[$key]; } 
throw new EmptyCacheException () ; } 
private function getGlobalKey( string $classname, int $id) 
{ return sprintf ( '%s.%d' ,$classname,$id); 
} } 


public function testIdentityMap( string $domainObjectName, int $objectId) 
{ $identityMap = new IdentityMap (); 
try { 
return $identityMap->get($domainObjectName, $objectId); } catch ( EmptyCacheException $e) { } 
$domainObject = $this ->dataProvider->getEntityById($domainObjectName, $objectId); 
$identityMap->add($domainObject); 
return $domainObject; } 



 // Lazy Load

class Customer 
{ private $entityManager; private $orders; 
public function getOrders() 
{ if ( $this ->orders === null) { 
$this ->orders = $this ->entityManager->getRepository( 'Example\\Order' )->findBy([ 'user' => self ]); 
} 
return $this ->orders; } 
} 
