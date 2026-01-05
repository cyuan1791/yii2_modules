<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\modules\rate\models\RateProduct */

$this->title = Yii::t('app', 'Create Rate Product');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Rate Products'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rate-product-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
