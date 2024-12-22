<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\PlaylistSongsSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="playlist-songs-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'PlaylistID') ?>

    <?= $form->field($model, 'SongID') ?>

    <?= $form->field($model, 'AddedDate') ?>

    <?= $form->field($model, 'OrderIndex') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
