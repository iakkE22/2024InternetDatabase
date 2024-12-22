<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Musicvideos $model */

$this->title = 'Create Musicvideos';
$this->params['breadcrumbs'][] = ['label' => 'Musicvideos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="musicvideos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
