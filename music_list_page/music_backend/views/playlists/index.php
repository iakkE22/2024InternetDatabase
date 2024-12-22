<?php

use app\models\Playlists;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\PlaylistsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Playlists';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="playlists-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Playlists', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'PlaylistID',
            'Title',
            'Description:ntext',
            'CoverImage',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Playlists $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'PlaylistID' => $model->PlaylistID]);
                 }
            ],
        ],
    ]); ?>


</div>
