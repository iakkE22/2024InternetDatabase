<?php

use app\models\Developers;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\DevelopersSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Developers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="developers-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Developers', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'DeveloperID',
            'Name',
            'Email:email',
            'Phone',
            'Role',
            //'Bio:ntext',
            //'GitHubLink',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Developers $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'DeveloperID' => $model->DeveloperID]);
                 }
            ],
        ],
    ]); ?>


</div>
