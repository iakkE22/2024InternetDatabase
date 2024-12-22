<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Playlists $model */

$this->title = 'Update Playlists: ' . $model->Title;
$this->params['breadcrumbs'][] = ['label' => 'Playlists', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Title, 'url' => ['view', 'PlaylistID' => $model->PlaylistID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="playlists-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
