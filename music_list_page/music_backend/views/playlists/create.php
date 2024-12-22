<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Playlists $model */

$this->title = 'Create Playlists';
$this->params['breadcrumbs'][] = ['label' => 'Playlists', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="playlists-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
