<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Admins $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="admins-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'AdminID')->textInput() ?>

    <?= $form->field($model, 'Permissions')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
