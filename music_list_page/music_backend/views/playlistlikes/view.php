<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Playlistlikes $model */

$this->title = $model->PlaylistID;
$this->params['breadcrumbs'][] = ['label' => 'Playlistlikes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="playlistlikes-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'PlaylistID' => $model->PlaylistID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'PlaylistID' => $model->PlaylistID], [
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
            'PlaylistID',
            'LikeCount',
        ],
    ]) ?>

</div>
