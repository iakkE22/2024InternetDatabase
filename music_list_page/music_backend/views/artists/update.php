<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Artists $model */

$this->title = 'Update Artists: ' . $model->Name;
$this->params['breadcrumbs'][] = ['label' => 'Artists', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Name, 'url' => ['view', 'ArtistID' => $model->ArtistID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="artists-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
