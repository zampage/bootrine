<?php

/**
* @Entity(repositoryClass="UserRepository")
* @Table(name="user")
*/
class User
{

	/** @Id @Column(name="uid", type="integer") @GeneratedValue */
	protected $uid;

	/** @Column(name="username", type="string", length=64) **/
	protected $username;

	/** @Column(name="password", type="string", length=32) **/
	protected $password;

	public function getUid(){ return $this->uid; }
	public function setUid($uid){ $this->uid = $uid; }

	public function getUsername(){ return $this->username; }
	public function setUsername($username){ $this->username = $username; }

	public function getPassword(){ return $this->password; }
	public function setPassword($password){ $this->password = $password; }

}