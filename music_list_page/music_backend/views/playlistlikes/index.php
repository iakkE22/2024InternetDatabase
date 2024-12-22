<?php

use app\models\Playlistlikes;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\PlaylistlikesSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Playlistlikes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="playlistlikes-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Playlistlikes', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'PlaylistID',
            'LikeCount',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Playlistlikes $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'PlaylistID' => $model->PlaylistID]);
                 }
            ],
        ],
    ]); ?>


</div>
