<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\MusicvideosSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="musicvideos-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'MVID') ?>

    <?= $form->field($model, 'Title') ?>

    <?= $form->field($model, 'ArtistID') ?>

    <?= $form->field($model, 'VideoPath') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
