<?php

    use yii\grid\ActionColumn;
    use yii\grid\GridView;
    use yii\helpers\Html;
    use yii\helpers\Url;

    /* @var $this yii\web\View */
    /* @var $searchModel frontend\modules\rate\models\RateCommentSearch */
    /* @var $dataProvider yii\data\ActiveDataProvider */

    $this->title                   = Yii::t('app', 'Rate Comments');
    $this->params['breadcrumbs'][] = $this->title;
?>
<div class="rate-comment-index">

    <h1><?php echo Html::encode($this->title) ?></h1>

    <p>
        <?php echo Html::a(Yii::t('app', 'Create Rate Comment'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php echo GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel'  => $searchModel,
            'columns'      => [
                ['class' => 'yii\grid\SerialColumn'],

                'id',
                'review_id',
                'content:ntext',
                'author',
                'email:email',
                //'url:url',
                //'status',
                //'created_at',
                //'updated_at',
                [
                    'class'      => ActionColumn::class,
                    'urlCreator' => function ($action, $model, $key, $index, $column) {
                        return Url::toRoute([$action, 'id' => $model->id]);
                    },
                ],
            ],
    ]); ?>


</div>