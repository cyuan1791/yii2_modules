<?php

    use yii\grid\ActionColumn;
    use yii\grid\GridView;
    use yii\helpers\Html;
    use yii\helpers\Url;

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

    <?php echo GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel'  => $searchModel,
            'columns'      => [
                ['class' => 'yii\grid\SerialColumn'],

                //'id',
                'product_id',
                //'title',
                'email:email',
                //'author',
                'brief:ntext',
                //'content:ntext',
                //'click',
                //'rating',
                //'status',
                //'created_at',
                //'updated_at',
                [
                    'class'      => ActionColumn::className(),
                    //            'template' => '{view} {update} {delete} {customButton}', // Add your custom button name to the template
                    'template'   => '{view} ',
                    'urlCreator' => function ($action, $model, $key, $index, $column) {
                        return Url::toRoute([$action, 'id' => $model->id]);
                    },
                ],
            ],
    ]); ?>


</div>