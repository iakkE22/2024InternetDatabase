<?php
use yii\helpers\Html;

$this->title = '后台管理';
?>

<div class="site-admin">
    <div class="container text-center">
        <h1 class="display-4">欢迎管理员！</h1>
        <p class="lead">请选择需要管理的数据库表：</p>

        <!-- 卡片布局 -->
        <div class="row justify-content-center">
            <!-- 用户管理卡片 -->
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm h-100">
                    <div class="card-body text-center">
                        <h5 class="card-title">Users</h5>
                        <p class="card-text text-muted">管理用户信息</p>
                        <?= Html::a('管理 Users', ['users/index'], ['class' => 'btn btn-primary btn-block']) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
