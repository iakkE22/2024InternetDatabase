<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Playlistlikes $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="playlistlikes-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'PlaylistID')->textInput() ?>

    <?= $form->field($model, 'LikeCount')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
