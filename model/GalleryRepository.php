<?php

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Query\Expr\Join;

class GalleryRepository extends EntityRepository
{

	//NOT WORKING!!! 
	public function findByIdOrderByImage(){
		$qb = Manager::get()->createQueryBuilder();
		$qb->select('i')
			->from('Gallery', 'g')
			->join('Image', 'i', Join::WITH, 'i.gallery=g.gid')
			->orderBy('i.iid', 'DESC');
		return $qb->getQuery()->getResult();
	}

}