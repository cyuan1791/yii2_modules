<?php

    use yii\helpers\Html;
    use yii\widgets\ActiveForm;

    /* @var $this yii\web\View */
    /* @var $model frontend\modules\rate\models\RateReview */
    /*
        $siteId = Yii::$app->session->get('site_id');
         or
        $siteId = Yii::$app->session['site_id'];
        // Accessing GET parameters in the target action
        id = Yii::$app->request->get('id');
        $var1 = Yii::$app->request->get('var1');

    */
    $this->title                   = Yii::t('app', 'Create Rate Review');
    $this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Rate Reviews'), 'url' => ['index']];
    $this->params['breadcrumbs'][] = $this->title;
    $pid                           = Yii::$app->request->get('pid');
    echo $pid;
?>
<div class="rate-review-create">

    <h1><?php echo Html::encode($this->title) ?></h1>


    <div class="rate-review-form">

        <?php $form = ActiveForm::begin(); ?>

        <?php echo $form->field($model, 'product_id')->hiddenInput(['value' => $pid]) ?>

        <?php echo $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

        <?php echo $form->field($model, 'email')->hiddenInput(
            ['value' => Yii::$app->user->identity->email]) ?>

        <?php echo $form->field($model, 'author')->hiddenInput(
            ['value' => Yii::$app->user->identity->username]) ?>
        <?php echo $form->field($model, 'content')->hiddenInput(
            ['value' => Yii::$app->user->identity->username]) ?>
        <?php echo $form->field($model, 'created_at')->hiddenInput(
            ['value' => time()]) ?>
        <?php echo $form->field($model, 'updated_at')->hiddenInput(
            ['value' => time()]) ?>



        <?php echo $form->field($model, 'brief')->textarea(['rows' => 6]) ?>


        <?php echo $form->field($model, 'rating')->textInput() ?>


        <div class="form-group">
            <?php echo Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>


</div>