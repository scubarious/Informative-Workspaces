<?php

namespace NDM\TryCatchBundle\Entity;


/**
 * ComponentRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
use Doctrine\ORM\Query;

use Doctrine\ORM\Query\Expr;

class ComponentChannelRepository extends EntityRepository
{
	public function findForComponent($prop, $val) {
		$qb = $this->createQueryBuilder('c');

		$qb
			->innerJoin('c.component', 'comp', Expr\Join::WITH, $qb->expr()->eq('comp.' . $prop, ':'. $prop))
			->setParameter(':' . $prop, $val)
		;

		return $qb->getQuery()->execute(array(), Query::HYDRATE_ARRAY);
	}

	public function findForChannel($prop, $val) {
		$qb = $this->createQueryBuilder('c');

		$qb
			->innerJoin('c.channel', 'chan', Expr\Join::WITH, $qb->expr()->eq('chan.' . $prop, ':'. $prop))
			->setParameter(':' . $prop, $val)
		;

		return $qb->getQuery()->execute(array(), Query::HYDRATE_ARRAY);
	}

	public function findOneForComponent($prop, $val) {
		$qb = $this->createQueryBuilder('c');

		$qb
			->innerJoin('c.component', 'comp', Expr\Join::WITH, $qb->expr()->eq('comp.' . $prop, ':'. $prop))
			->setParameter(':' . $prop, $val)
			->setMaxResults(1)
		;

		return $qb->getQuery()->getOneOrNullResult(Query::HYDRATE_ARRAY);
	}

	public function findOneForChannel($prop, $val) {
		$qb = $this->createQueryBuilder('c');

		$qb
			->innerJoin('c.channel', 'chan', Expr\Join::WITH, $qb->expr()->eq('chan.' . $prop, ':'. $prop))
			->setParameter(':' . $prop, $val)
			->setMaxResults(1)
		;

		return $qb->getQuery()->getOneOrNullResult(Query::HYDRATE_ARRAY);
	}
}