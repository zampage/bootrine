<?php

use Doctrine\ORM\EntityRepository;

class Gallery extends EntityRepository
{

	public function getGallery($gid){

		return Manager::get()
				->createQuery('SELECT gid, name, iid, path FROM image JOIN gallery on gid = FKgid WHERE FKgid = :gid')
				->setParameter(':gid', $gid)
				->getResult();

	}

	public function setGallery($name, $links = array()){

		//Save a new gallery

	}

}