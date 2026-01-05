<?php

namespace frontend\modules\rate\models;

/**
 * This is the ActiveQuery class for [[RateProduct]].
 *
 * @see RateProduct
 */
class RateProductQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return RateProduct[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return RateProduct|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
