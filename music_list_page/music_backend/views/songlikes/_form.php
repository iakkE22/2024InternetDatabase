<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Songlikes $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="songlikes-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'SongID')->textInput() ?>

    <?= $form->field($model, 'LikeCount')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
