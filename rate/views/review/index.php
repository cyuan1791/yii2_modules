<?php

    use yii\helpers\Html;

    /* @var $this yii\web\View */
    /* @var $searchModel frontend\modules\rate\models\RateReviewSearch */
    /* @var $dataProvider yii\data\ActiveDataProvider */

    $this->title                   = Yii::t('app', 'Rate Reviews');
    $this->params['breadcrumbs'][] = $this->title;
?>
<div class="rate-review-index">

    <h1><?php echo Html::encode($this->title) ?></h1>

    <p>
        <?php echo Html::a(Yii::t('app', 'Create Rate Review'), ['create', 'pid' => '_ProductID_'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


</div>