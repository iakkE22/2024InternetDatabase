<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Musicvideos $model */

$this->title = 'Update Musicvideos: ' . $model->Title;
$this->params['breadcrumbs'][] = ['label' => 'Musicvideos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Title, 'url' => ['view', 'MVID' => $model->MVID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="musicvideos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
