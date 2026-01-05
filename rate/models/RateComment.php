<?php

namespace frontend\modules\rate\models;

use Yii;

/**
 * This is the model class for table "rate_comment".
 *
 * @property int $id
 * @property int $review_id
 * @property string $content
 * @property string $author
 * @property string $email
 * @property string|null $url
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 *
 * @property RateReview $review
 */
class RateComment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'rate_comment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['review_id', 'content', 'author', 'email', 'created_at', 'updated_at'], 'required'],
            [['review_id', 'status', 'created_at', 'updated_at'], 'integer'],
            [['content'], 'string'],
            [['author', 'email', 'url'], 'string', 'max' => 128],
            [['review_id'], 'exist', 'skipOnError' => true, 'targetClass' => RateReview::className(), 'targetAttribute' => ['review_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'review_id' => Yii::t('app', 'Review ID'),
            'content' => Yii::t('app', 'Content'),
            'author' => Yii::t('app', 'Author'),
            'email' => Yii::t('app', 'Email'),
            'url' => Yii::t('app', 'Url'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * Gets query for [[Review]].
     *
     * @return \yii\db\ActiveQuery|RateReviewQuery
     */
    public function getReview()
    {
        return $this->hasOne(RateReview::className(), ['id' => 'review_id']);
    }

    /**
     * {@inheritdoc}
     * @return RateCommentQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new RateCommentQuery(get_called_class());
    }
}
