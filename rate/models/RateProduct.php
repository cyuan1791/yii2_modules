<?php

namespace frontend\modules\rate\models;

use Yii;

/**
 * This is the model class for table "rate_product".
 *
 * @property int $id
 * @property string $url
 * @property string $page_path
 * @property string $module
 * @property string $name
 * @property string $mid
 * @property string $owner_email
 * @property string $city
 * @property string $state
 * @property string $country
 * @property int $type
 * @property int $views
 * @property float $rating_ave
 * @property int $status
 * @property int $created_at
 *
 * @property RateReview[] $rateReviews
 */
class RateProduct extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'rate_product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['url', 'page_path', 'module', 'name', 'mid', 'owner_email', 'city', 'state', 'created_at'], 'required'],
            [['type', 'views', 'status', 'created_at'], 'integer'],
            [['rating_ave'], 'number'],
            [['url', 'page_path', 'name', 'owner_email', 'country'], 'string', 'max' => 255],
            [['module', 'mid', 'city', 'state'], 'string', 'max' => 128],
            [['page_path'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'url' => Yii::t('app', 'Url'),
            'page_path' => Yii::t('app', 'Page Path'),
            'module' => Yii::t('app', 'Module'),
            'name' => Yii::t('app', 'Name'),
            'mid' => Yii::t('app', 'Mid'),
            'owner_email' => Yii::t('app', 'Owner Email'),
            'city' => Yii::t('app', 'City'),
            'state' => Yii::t('app', 'State'),
            'country' => Yii::t('app', 'Country'),
            'type' => Yii::t('app', 'Type'),
            'views' => Yii::t('app', 'Views'),
            'rating_ave' => Yii::t('app', 'Rating Ave'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
        ];
    }

    /**
     * Gets query for [[RateReviews]].
     *
     * @return \yii\db\ActiveQuery|RateReviewQuery
     */
    public function getRateReviews()
    {
        return $this->hasMany(RateReview::className(), ['product_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return RateProductQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new RateProductQuery(get_called_class());
    }
}
