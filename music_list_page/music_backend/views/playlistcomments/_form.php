<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Playlistcomments $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="playlistcomments-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'PlaylistID')->textInput() ?>

    <?= $form->field($model, 'UserID')->textInput() ?>

    <?= $form->field($model, 'CommentText')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'CommentDate')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
