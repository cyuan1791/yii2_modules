<?php

namespace frontend\modules\rate\models;

/**
 * This is the ActiveQuery class for [[RateComment]].
 *
 * @see RateComment
 */
class RateCommentQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return RateComment[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return RateComment|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
