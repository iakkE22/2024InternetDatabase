<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Playlistcomments $model */

$this->title = 'Update Playlistcomments: ' . $model->CommentID;
$this->params['breadcrumbs'][] = ['label' => 'Playlistcomments', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->CommentID, 'url' => ['view', 'CommentID' => $model->CommentID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="playlistcomments-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
