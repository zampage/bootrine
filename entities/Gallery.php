<?php

/**
* @Entity
* @Table(name="gallery")
*/
class Gallery
{

	/** @Id @Column(name="gid", type="integer") @GeneratedValue(strategy="AUTO") */
	protected $gid;

	/** @Column(name="name", type="string", length=64) */
	protected $name;

	/**
	* @ManyToOne(targetEntity="User")
	* @JoinColumn(name="FKuid", referencedColumnName="uid")
	*/
	protected $user;

	//, indexBy="gid"
	//JoinColumn(name="gid", referencedColumnName="FKgid")
	/** 
	* @OneToMany(targetEntity="Image", mappedBy="gallery")
	* JoinColumn(name="gid", referencedColumnName="FKgid")
	*/
	protected $images;

	public function getGid(){ return $this->gid; }
	public function setGid($gid){ $this->gid = $gid; }

	public function getName(){ return $this->name; }
	public function setName($name){ $this->name = $name; }

	public function getUser(){ return $this->user; }
	public function setUser($user){ $this->user = $user; }

	public function getImages(){ return $this->images; }
	public function setImages($images){ $this->images = $images; }

}