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

            <!-- 开发者管理卡片 -->
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm h-100">
                    <div class="card-body text-center">
                        <h5 class="card-title">Developers</h5>
                        <p class="card-text text-muted">管理开发者信息</p>
                        <?= Html::a('管理 Developers', ['developers/index'], ['class' => 'btn btn-primary btn-block']) ?>
                    </div>
                </div>
            </div>

            <!-- 歌曲管理卡片 -->
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm h-100">
                    <div class="card-body text-center">
                        <h5 class="card-title">Songs</h5>
                        <p class="card-text text-muted">管理歌曲信息</p>
                        <?= Html::a('管理 Songs', ['songs/index'], ['class' => 'btn btn-primary btn-block']) ?>
                    </div>
                </div>
            </div>

            <!-- 歌单管理卡片 -->
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm h-100">
                    <div class="card-body text-center">
                        <h5 class="card-title">Playlists</h5>
                        <p class="card-text text-muted">管理歌单信息</p>
                        <?= Html::a('管理 Playlists', ['playlists/index'], ['class' => 'btn btn-primary btn-block']) ?>
                    </div>
                </div>
            </div>

            <!-- 视频管理卡片 -->
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm h-100">
                    <div class="card-body text-center">
                        <h5 class="card-title">Music Videos</h5>
                        <p class="card-text text-muted">管理音乐视频信息</p>
                        <?= Html::a('管理 Music Videos', ['musicvideos/index'], ['class' => 'btn btn-primary btn-block']) ?>
                    </div>
                </div>
            </div>

            <!-- 视频评论管理卡片 -->
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm h-100">
                    <div class="card-body text-center">
                        <h5 class="card-title">Music Video Comments</h5>
                        <p class="card-text text-muted">管理视频评论信息</p>
                        <?= Html::a('管理 Video Comments', ['mvcomments/index'], ['class' => 'btn btn-primary btn-block']) ?>
                    </div>
                </div>
            </div>

            <!-- 视频点赞管理卡片 -->
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm h-100">
                    <div class="card-body text-center">
                        <h5 class="card-title">Music Video Likes</h5>
                        <p class="card-text text-muted">管理视频点赞信息</p>
                        <?= Html::a('管理 Video Likes', ['mvlikes/index'], ['class' => 'btn btn-primary btn-block']) ?>
                    </div>
                </div>
            </div>

            <!-- 歌单评论管理卡片 -->
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm h-100">
                    <div class="card-body text-center">
                        <h5 class="card-title">Playlist Comments</h5>
                        <p class="card-text text-muted">管理歌单评论信息</p>
                        <?= Html::a('管理 Playlist Comments', ['playlistcomments/index'], ['class' => 'btn btn-primary btn-block']) ?>
                    </div>
                </div>
            </div>

            <!-- 歌单点赞管理卡片 -->
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm h-100">
                    <div class="card-body text-center">
                        <h5 class="card-title">Playlist Likes</h5>
                        <p class="card-text text-muted">管理歌单点赞信息</p>
                        <?= Html::a('管理 Playlist Likes', ['playlistlikes/index'], ['class' => 'btn btn-primary btn-block']) ?>
                    </div>
                </div>
            </div>

            <!-- 歌曲评论管理卡片 -->
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm h-100">
                    <div class="card-body text-center">
                        <h5 class="card-title">Song Comments</h5>
                        <p class="card-text text-muted">管理歌曲评论信息</p>
                        <?= Html::a('管理 Song Comments', ['songcomments/index'], ['class' => 'btn btn-primary btn-block']) ?>
                    </div>
                </div>
            </div>

            <!-- 歌曲点赞管理卡片 -->
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm h-100">
                    <div class="card-body text-center">
                        <h5 class="card-title">Song Likes</h5>
                        <p class="card-text text-muted">管理歌曲点赞信息</p>
                        <?= Html::a('管理 Song Likes', ['songlikes/index'], ['class' => 'btn btn-primary btn-block']) ?>
                    </div>
                </div>
            </div>

            <!-- 管理员管理卡片 -->
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm h-100">
                    <div class="card-body text-center">
                        <h5 class="card-title">Admins</h5>
                        <p class="card-text text-muted">管理管理员信息</p>
                        <?= Html::a('管理 Admins', ['admins/index'], ['class' => 'btn btn-primary btn-block']) ?>
                    </div>
                </div>
            </div>

            <!-- 艺术家管理卡片 -->
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm h-100">
                    <div class="card-body text-center">
                        <h5 class="card-title">Artists</h5>
                        <p class="card-text text-muted">管理艺术家信息</p>
                        <?= Html::a('管理 Artists', ['artists/index'], ['class' => 'btn btn-primary btn-block']) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
