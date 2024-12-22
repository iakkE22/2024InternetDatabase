<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\ArtistsSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="artists-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ArtistID') ?>

    <?= $form->field($model, 'Name') ?>

    <?= $form->field($model, 'Bio') ?>

    <?= $form->field($model, 'ProfilePic') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
