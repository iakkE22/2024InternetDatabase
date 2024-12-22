<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Mvcomments $model */

$this->title = 'Create Mvcomments';
$this->params['breadcrumbs'][] = ['label' => 'Mvcomments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mvcomments-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
