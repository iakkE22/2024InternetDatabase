<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\SongsSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="songs-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'SongID') ?>

    <?= $form->field($model, 'Title') ?>

    <?= $form->field($model, 'ArtistID') ?>

    <?= $form->field($model, 'FilePath') ?>

    <?= $form->field($model, 'CoverImage') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
