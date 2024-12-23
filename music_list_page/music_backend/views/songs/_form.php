<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Songs $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="songs-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ArtistID')->textInput() ?>

    <?= $form->field($model, 'FilePath')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'CoverImage')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
