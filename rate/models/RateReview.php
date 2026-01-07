<?php
namespace frontend\modules\rate\models;

use Yii;

/**
 * This is the model class for table "rate_review".
 *
 * @property int $id
 * @property int $product_id
 * @property string $title
 * @property string $email
 * @property string $author
 * @property string|null $brief
 * @property string $content
 * @property int $click
 * @property int $rating
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 *
 * @property RateProduct $product
 * @property RateComment[] $rateComments
 */
class RateReview extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'rate_review';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            //[['product_id', 'title', 'email', 'author', 'content', 'created_at', 'updated_at'], 'required'],
            //[['product_id', 'title', 'content', 'created_at', 'updated_at'], 'required'],
            [['product_id', 'click', 'rating', 'status', 'created_at', 'updated_at'], 'integer'],
            [['brief', 'content'], 'string'],
            [['title'], 'string', 'max' => 255],
            [['email', 'author'], 'string', 'max' => 128],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => RateProduct::className(), 'targetAttribute' => ['product_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id'         => Yii::t('app', 'ID'),
            'product_id' => Yii::t('app', ''),
            'title'      => Yii::t('app', 'Title'),
            'email'      => Yii::t('app', ''),
            'author'     => Yii::t('app', ''),
            'brief'      => Yii::t('app', 'Review'),
            'content'    => Yii::t('app', ''),
            'click'      => Yii::t('app', 'Click'),
            'rating'     => Yii::t('app', 'Rating'),
            'status'     => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', ''),
            'updated_at' => Yii::t('app', ''),
        ];
    }

    /**
     * Gets query for [[Product]].
     *
     * @return \yii\db\ActiveQuery|RateProductQuery
     */
    public function getProduct()
    {
        return $this->hasOne(RateProduct::className(), ['id' => 'product_id']);
    }

    /**
     * Gets query for [[RateComments]].
     *
     * @return \yii\db\ActiveQuery|RateCommentQuery
     */
    public function getRateComments()
    {
        return $this->hasMany(RateComment::className(), ['review_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return RateReviewQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new RateReviewQuery(get_called_class());
    }
}