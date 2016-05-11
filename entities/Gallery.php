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

	/** @Column(name="private", type="integer", length=1) */
	protected $private;

	/**
	* @ManyToOne(targetEntity="User")
	* @JoinColumn(name="FKuid", referencedColumnName="uid", onDelete="CASCADE")
	*/
	protected $user;

	/** 
	* @OneToMany(targetEntity="Image", mappedBy="gallery")
	* JoinColumn(name="gid", referencedColumnName="FKgid")
	*/
	protected $images;

	public function getGid(){ return $this->gid; }
	public function setGid($gid){ $this->gid = $gid; }

	public function getName(){ return $this->name; }
	public function setName($name){ $this->name = $name; }

	public function getPrivate(){ return $this->private; }
	public function setPrivate($private){ $this->private = $private; }

	public function getUser(){ return $this->user; }
	public function setUser($user){ $this->user = $user; }

	public function getImages(){ return $this->images; }
	public function setImages($images){ $this->images = $images; }

	public function displayThumb(){

		$imgs = $this->getImages();
		echo '<div class="col-md-4 col-sm-6 col-xs-12">';
		echo '<a href="gallery/' . $this->getGid() . '" class="thumbnail">';
		echo '<div class="image-holder">';
		if(count($imgs) > 0){
			echo '<img src="' . IMAGES_PATH . $imgs[0]->getPath() . '">';
		}
		echo '</div>';
		echo '</a>';
		echo '<a href="gallery/' . $this->getGid() . '">';
		echo '<h3>' . $this->getName() . '&nbsp;<small>by ' . $this->getUser()->getUsername() . '</small></h3>';
		echo '</a>';
		echo '</div>';

	}

}