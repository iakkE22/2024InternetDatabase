<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Artists $model */

$this->title = $model->Name;
$this->params['breadcrumbs'][] = ['label' => 'Artists', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="artists-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'ArtistID' => $model->ArtistID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'ArtistID' => $model->ArtistID], [
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
            'ArtistID',
            'Name',
            'Bio:ntext',
            'ProfilePic',
        ],
    ]) ?>

</div>
