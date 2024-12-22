<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Mvcomments $model */

$this->title = 'Update Mvcomments: ' . $model->CommentID;
$this->params['breadcrumbs'][] = ['label' => 'Mvcomments', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->CommentID, 'url' => ['view', 'CommentID' => $model->CommentID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mvcomments-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
