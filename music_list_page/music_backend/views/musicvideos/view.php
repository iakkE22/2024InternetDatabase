<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Musicvideos $model */

$this->title = $model->Title;
$this->params['breadcrumbs'][] = ['label' => 'Musicvideos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="musicvideos-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'MVID' => $model->MVID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'MVID' => $model->MVID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'MVID',
            'Title',
            'ArtistID',
            'VideoPath',
        ],
    ]) ?>

</div>
