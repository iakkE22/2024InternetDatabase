<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Developers $model */

$this->title = 'Update Developers: ' . $model->Name;
$this->params['breadcrumbs'][] = ['label' => 'Developers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Name, 'url' => ['view', 'DeveloperID' => $model->DeveloperID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="developers-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
