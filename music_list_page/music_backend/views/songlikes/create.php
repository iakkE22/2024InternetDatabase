<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Songlikes $model */

$this->title = 'Create Songlikes';
$this->params['breadcrumbs'][] = ['label' => 'Songlikes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="songlikes-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
