<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\modules\rate\models\RateReview */

$this->title = Yii::t('app', 'Create Rate Review');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Rate Reviews'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rate-review-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
