<?php

namespace Topxia\Service\Card\Dao\Impl;

use Topxia\Service\Common\BaseDao;
use Topxia\Service\Card\Dao\CardDao;


class CardDaoImpl extends BaseDao implements CardDao
{
    protected $table = 'card';

    public function addCard($card)
    {
    	$affected = $this->getConnection()->insert($this->table , $card);
    	if ($affected <= 0) {
            throw $this->createDaoException('Insert card error.');
        }
        return $this->getCard($this->getConnection()->lastInsertId());

    }

    public function getCard($id)
    {
    	$sql = "SELECT * FROM {$this->table} WHERE id = ? LIMIT 1";
        return $this->getConnection()->fetchAssoc($sql, array($id)) ? : null;
    }

    protected function _createSearchQueryBuilder($conditions)
    {   
        $builder = $this->createDynamicQueryBuilder($conditions)
            ->from($this->table, 'cardId')
            ->andWhere('cardType = :cardType')
            ->andWhere('deadline = :deadline')
            ->andWhere('status = :status')
            ->andWhere('userId = :userId');

        return $builder;
    }

}