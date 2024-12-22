<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Songlikes $model */

$this->title = $model->SongID;
$this->params['breadcrumbs'][] = ['label' => 'Songlikes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="songlikes-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'SongID' => $model->SongID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'SongID' => $model->SongID], [
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
            'SongID',
            'LikeCount',
        ],
    ]) ?>

</div>
