<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\DevelopersSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="developers-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'DeveloperID') ?>

    <?= $form->field($model, 'Name') ?>

    <?= $form->field($model, 'Email') ?>

    <?= $form->field($model, 'Phone') ?>

    <?= $form->field($model, 'Role') ?>

    <?php // echo $form->field($model, 'Bio') ?>

    <?php // echo $form->field($model, 'GitHubLink') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
