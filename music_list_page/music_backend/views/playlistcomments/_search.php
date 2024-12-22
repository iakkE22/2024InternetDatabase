<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\PlaylistcommentsSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="playlistcomments-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'CommentID') ?>

    <?= $form->field($model, 'PlaylistID') ?>

    <?= $form->field($model, 'UserID') ?>

    <?= $form->field($model, 'CommentText') ?>

    <?= $form->field($model, 'CommentDate') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
