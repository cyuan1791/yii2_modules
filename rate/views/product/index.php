<?php

    use yii\grid\ActionColumn;
    use yii\grid\GridView;
    use yii\helpers\Html;
    use yii\helpers\Url;

    /* @var $this yii\web\View */
    /* @var $dataProvider yii\data\ActiveDataProvider */

    $this->title                   = Yii::t('app', 'Rate Products');
    $this->params['breadcrumbs'][] = $this->title;
?>
<div class="rate-product-index">

    <h1><?php echo Html::encode($this->title)?></h1>

    <p>
        <?php echo Html::a(Yii::t('app', 'Create Rate Product'), ['create'], ['class' => 'btn btn-success'])?>
    </p>


    <?php echo GridView::widget([
    'dataProvider' => $dataProvider,
    'columns'      => [
        ['class' => 'yii\grid\SerialColumn'],

        'id',
        'url:url',
        'page_path',
        'module',
        'name',
        //'mid',
        //'owner_email:email',
        //'city',
        //'state',
        //'country',
        //'type',
        //'views',
        //'rating_ave',
        //'status',
        //'created_at',
        [
            'class'      => ActionColumn::className(),
            'urlCreator' => function ($action, $model, $key, $index, $column) {
                return Url::toRoute([$action, 'id' => $model->id]);
            },
        ],
    ],
]);?>


</div>