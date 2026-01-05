<?php

namespace frontend\modules\rate\models;

/**
 * This is the ActiveQuery class for [[RateReview]].
 *
 * @see RateReview
 */
class RateReviewQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return RateReview[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return RateReview|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
