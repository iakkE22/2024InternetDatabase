<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Playlistlikes $model */

$this->title = 'Update Playlistlikes: ' . $model->PlaylistID;
$this->params['breadcrumbs'][] = ['label' => 'Playlistlikes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->PlaylistID, 'url' => ['view', 'PlaylistID' => $model->PlaylistID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="playlistlikes-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
