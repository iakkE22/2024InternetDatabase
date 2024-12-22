<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\PlaylistSongs $model */

$this->title = 'Update Playlist Songs: ' . $model->PlaylistID;
$this->params['breadcrumbs'][] = ['label' => 'Playlist Songs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->PlaylistID, 'url' => ['view', 'PlaylistID' => $model->PlaylistID, 'SongID' => $model->SongID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="playlist-songs-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
