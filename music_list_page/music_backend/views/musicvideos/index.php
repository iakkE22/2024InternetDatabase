<?php

use app\models\Musicvideos;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\MusicvideosSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Musicvideos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="musicvideos-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Musicvideos', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'MVID',
            'Title',
            'ArtistID',
            'VideoPath',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Musicvideos $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'MVID' => $model->MVID]);
                 }
            ],
        ],
    ]); ?>


</div>
