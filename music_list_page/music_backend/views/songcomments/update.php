<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Songcomments $model */

$this->title = 'Update Songcomments: ' . $model->CommentID;
$this->params['breadcrumbs'][] = ['label' => 'Songcomments', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->CommentID, 'url' => ['view', 'CommentID' => $model->CommentID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="songcomments-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
