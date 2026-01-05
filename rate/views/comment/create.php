<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\modules\rate\models\RateComment */

$this->title = Yii::t('app', 'Create Rate Comment');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Rate Comments'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rate-comment-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
