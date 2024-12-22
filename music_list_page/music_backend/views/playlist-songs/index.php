<?php

use app\models\PlaylistSongs;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\PlaylistSongsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Playlist Songs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="playlist-songs-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Playlist Songs', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'PlaylistID',
            'SongID',
            'AddedDate',
            'OrderIndex',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, PlaylistSongs $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'PlaylistID' => $model->PlaylistID, 'SongID' => $model->SongID]);
                 }
            ],
        ],
    ]); ?>


</div>
