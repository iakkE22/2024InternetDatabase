<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Mvlikes $model */

$this->title = 'Create Mvlikes';
$this->params['breadcrumbs'][] = ['label' => 'Mvlikes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mvlikes-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
