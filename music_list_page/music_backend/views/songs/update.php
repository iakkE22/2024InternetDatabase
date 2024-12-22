<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Songs $model */

$this->title = 'Update Songs: ' . $model->Title;
$this->params['breadcrumbs'][] = ['label' => 'Songs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Title, 'url' => ['view', 'SongID' => $model->SongID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="songs-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
