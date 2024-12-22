<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\PlaylistSongs $model */

$this->title = 'Create Playlist Songs';
$this->params['breadcrumbs'][] = ['label' => 'Playlist Songs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="playlist-songs-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
