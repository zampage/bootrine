<?php

use Doctrine\ORM\EntityRepository;

class GalleryRepository extends EntityRepository
{

	public function findGallery() {
		

		$query = Manager::get()->createQuery('SELECT g FROM gallery g');
		return $query->getResult();
	}

}