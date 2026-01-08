<?php

    use yii\widgets\DetailView;

    /* @var $this yii\web\View */
    /* @var $model frontend\modules\rate\models\RateReview */

    $this->title                   = $model->title;
    $this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Rate Reviews'), 'url' => ['index']];
    $this->params['breadcrumbs'][] = $this->title;
    \yii\web\YiiAsset::register($this);
?>
<div class="rate-review-view">


    <?php echo DetailView::widget([
            'model'      => $model,
            'attributes' => [
                'id',
                'product_id',
                'title',
                'email:email',
                'author',
                'brief:ntext',
                'content:ntext',
                'click',
                'rating',
                'status',
                'created_at',
                'updated_at',
            ],
    ]) ?>

</div>