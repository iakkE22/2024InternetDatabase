<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Developers $model */

$this->title = $model->Name;
$this->params['breadcrumbs'][] = ['label' => 'Developers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="developers-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'DeveloperID' => $model->DeveloperID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'DeveloperID' => $model->DeveloperID], [
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
            'DeveloperID',
            'Name',
            'Email:email',
            'Phone',
            'Role',
            'Bio:ntext',
            'GitHubLink',
        ],
    ]) ?>

</div>
