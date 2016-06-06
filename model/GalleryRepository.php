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

	public function findAllPublic(){
		$qb = Manager::get()->createQueryBuilder();
		$qb->select('g')
			->from('Gallery', 'g')
			->where('g.private=0');
		return $qb->getQuery()->getResult();
	}

	public function findAllPublicAndOwnPrivate($user){
		$qb = Manager::get()->createQueryBuilder();
		$qb->select('g')
			->from('Gallery', 'g')
			->where('g.private=0')
			->orwhere('g.user=:u')
			->setParameter('u', $user);
		return $qb->getQuery()->getResult();
	}

}