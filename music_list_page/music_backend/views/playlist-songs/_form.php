<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\PlaylistSongs $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="playlist-songs-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'PlaylistID')->textInput() ?>

    <?= $form->field($model, 'SongID')->textInput() ?>

    <?= $form->field($model, 'AddedDate')->textInput() ?>

    <?= $form->field($model, 'OrderIndex')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
