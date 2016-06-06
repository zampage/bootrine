<?php

/**
* @Entity
* @Table(name="image")
*/
class Image
{

	/** @Id @Column(name="iid", type="integer") @GeneratedValue(strategy="AUTO") */
	protected $iid;

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

	public function display(){
		//print single images
		echo '<div class="col-md-3 col-sm-4 col-xs-12">';
		echo '<div class="thumbnail">';
		echo '<div class="image-holder gallerythumb" data-path="' . IMAGES_PATH . $this->getPath() . '">';
		echo '<img src="' . IMAGES_PATH . $this->getPath() . '" class="img-center" data-identifier="'.$this->getIid().'">';
		echo '<span class="glyphicon glyphicon-remove deleteImage"></span>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
	}

}