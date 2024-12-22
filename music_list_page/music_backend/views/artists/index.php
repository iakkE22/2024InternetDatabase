<?php

use app\models\Artists;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\ArtistsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Artists';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="artists-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Artists', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ArtistID',
            'Name',
            'Bio:ntext',
            'ProfilePic',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Artists $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'ArtistID' => $model->ArtistID]);
                 }
            ],
        ],
    ]); ?>


</div>
