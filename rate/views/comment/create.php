<?php

    use yii\helpers\Html;
    use yii\widgets\ActiveForm;

    /* @var $this yii\web\View */
    /* @var $model frontend\modules\rate\models\RateComment */

    $this->title                   = Yii::t('app', 'Create Rate Comment');
    $this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Rate Comments'), 'url' => ['index']];
    $this->params['breadcrumbs'][] = $this->title;

?>
<div class="rate-comment-create">

    <h1><?php echo Html::encode($this->title) ?></h1>

    <div class="rate-comment-form">

        <?php $form = ActiveForm::begin(); ?>

        <?php echo $form->field($model, 'review_id')->textInput() ?>

        <?php echo $form->field($model, 'content')->textarea(['rows' => 6]) ?>

        <?php echo $form->field($model, 'author')->textInput(['maxlength' => true]) ?>

        <?php echo $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

        <?php echo $form->field($model, 'url')->textInput(['maxlength' => true]) ?>

        <?php echo $form->field($model, 'status')->textInput() ?>

        <?php echo $form->field($model, 'created_at')->textInput() ?>

        <?php echo $form->field($model, 'updated_at')->textInput() ?>

        <div class="form-group">
            <?php echo Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>


</div>