<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Songlikes $model */

$this->title = 'Update Songlikes: ' . $model->SongID;
$this->params['breadcrumbs'][] = ['label' => 'Songlikes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->SongID, 'url' => ['view', 'SongID' => $model->SongID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="songlikes-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
