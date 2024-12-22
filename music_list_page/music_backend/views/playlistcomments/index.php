<?php

use app\models\Playlistcomments;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\PlaylistcommentsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Playlistcomments';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="playlistcomments-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Playlistcomments', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'CommentID',
            'PlaylistID',
            'UserID',
            'CommentText:ntext',
            'CommentDate',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Playlistcomments $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'CommentID' => $model->CommentID]);
                 }
            ],
        ],
    ]); ?>


</div>
