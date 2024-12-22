<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Mvlikes $model */

$this->title = 'Update Mvlikes: ' . $model->MVID;
$this->params['breadcrumbs'][] = ['label' => 'Mvlikes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->MVID, 'url' => ['view', 'MVID' => $model->MVID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mvlikes-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
