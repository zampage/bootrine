<?php

/**
* @Entity
* @Table(name="image")
*/
class Image
{

	/** @Id @Column(name="iid", type="integer") @GeneratedValue(strategy="AUTO") */
	protected $iid;

	/** @Column(name="FKgid", type="integer") */
	protected $FKgid;

	/** @Column(name="path", type="string", length=128) */
	protected $path;

	/**
	* @ManyToOne(targetEntity="Gallery", inversedBy="images")
	* @JoinColumn(name="FKgid", referencedColumnName="gid", onDelete="CASCADE")
	*/
	protected $gallery;

	public function getIid(){ return $this->iid; }
	public function setIid($iid){ $this->iid = $iid; }

	public function getPath(){ return $this->path; }
	public function setPath($path){ $this->path = $path; }

	public function getGallery(){ return $this->gallery; }
	public function setGallery($gallery){ $this->gallery = $gallery; }

}