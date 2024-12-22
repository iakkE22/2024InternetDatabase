<?php

use app\models\Songlikes;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\SonglikesSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Songlikes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="songlikes-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Songlikes', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'SongID',
            'LikeCount',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Songlikes $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'SongID' => $model->SongID]);
                 }
            ],
        ],
    ]); ?>


</div>
