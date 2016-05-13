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
		echo '<div class="col-md-4 col-sm-6 col-xs-12">';
		echo '<a href="#" class="thumbnail">';
		echo '<div class="image-holder">';
		echo '<img src="' . IMAGES_PATH . $this->getPath() . '">';
		echo '</div>';
		echo '</a>';
		echo '</div>';
	}

}