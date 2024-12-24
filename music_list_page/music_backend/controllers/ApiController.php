<?php
/**
 * Team: Chillguys，NKU
 * Coding by Luojin 2213912 Litianyi 2210636 Liaoyuanjin 2213741,20241220
 * 1.Coding by Luojin 2213912
 * 创建了这个主要用于根据api来调用不同的函数的控制器，从而读取特定的表来返回不同的值给前端
 * 创建用于注册和登录的api：actionLogin() & actionSignup()
 * 创建了获取用户信息的api：actionGetUserInfo()
 * 创建了调用用户评论的api用于个人页面显示：actionGetUserComments()
 * 创建了获取歌单的api：actionGetPlaylists()
 * 创建了获取特定歌曲的api：actionGetSongs($id)
 * 创建了获取对应视频评论的api：actionGetVideoDetail($id)
 * 
 * 2.Coding by Litianyi 2210636
 * 创建了获取视频的api：actionGetMvs()
 * 创建了搜索特定视频的api：actionSearchMvs()
 * 创建了获取视频点赞的api：actionLikeMv()
 * 创建了获取视频评论的apil:actionGetComments($videoId)
 * 创建了获取随机歌单的api：actionGetRandomPlaylistId()
 * 
 * 3.Coding by Liaoyuanjin 2213741
 * 创建了增加歌单评论的api：actionAddComment()
 * 创建了增加视频评论的api：actionAddMvComment()
 */
namespace app\controllers;

use yii\web\Controller;
use yii\web\Response;
use app\models\Users;

class ApiController extends Controller
{
    public $enableCsrfValidation = false; // 禁用 CSRF 验证

    // 用户登录 API
    public function actionLogin()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        $username = \Yii::$app->request->get('username');
        $password = \Yii::$app->request->get('password');

        if ($username !== null && $password !== null) {
            // 查询数据库检查用户名和密码是否匹配
            $user = Users::find()
                ->where(['Username' => $username])
                ->one();

            if ($user !== null && ($password == $user->Password)) {
                // 用户名和密码匹配
                $session = \Yii::$app->session;
                $session->open();

                // 将用户信息存入 Session
                $session['user'] = [
                    'id' => $user->UserID,
                    'username' => $user->Username,
                ];

                return [
                    'status' => 1,
                    'message' => '登录成功',
                    'data' => [
                        'id' => $user->UserID,
                        'username' => $user->Username,
                    ],
                ];
            } else {
                // 用户名和密码不匹配
                return ['status' => 0, 'message' => '用户名或密码错误'];
            }
        }
        return ['status' => -1, 'message' => '参数缺失'];
    }

    // 用户注册 API
    public function actionSignup()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        // 获取 GET 参数
        $username = \Yii::$app->request->get('username');
        $password = \Yii::$app->request->get('password');

        // 检查参数是否存在
        if (!$username || !$password) {
            return ['status' => -1, 'message' => '参数缺失'];
        }

        // 检查用户是否已存在
        $existingUser = Users::find()
            ->where(['Username' => $username])
            ->one();

        if ($existingUser !== null) {
            return ['status' => 0, 'message' => '用户已存在'];
        }

        // 创建新用户
        $user = new Users();
        $user->Username = $username;
        $user->Password = $password; // 注意：这里暂未加密密码，仅为演示目的

        // 尝试保存用户
        if ($user->save()) {
            return ['status' => 1, 'message' => '注册成功'];
        } else {
            // 返回保存失败的错误信息
            Yii::error('User save failed: ' . json_encode($user->errors), __METHOD__);
            return ['status' => -1, 'message' => '保存失败', 'errors' => $user->errors];
        }
    }
    public function actionGetUserInfo()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        $session = \Yii::$app->session;
        if (!$session->isActive) {
            $session->open();
        }

        // 检查 Session 中是否有登录用户的信息
        if ($session->has('user')) {
            $user = $session->get('user');
            $userId = $user['id'];
        
            $user = Users::findOne($userId);
        
            if ($user) {
                return [
                    'status' => 1,
                    'user' => [
                        'UserID' => $user->UserID,
                        'Username' => $user->Username,
                    ],
                ];
            }
        }

        return ['status' => 0, 'message' => '用户未登录'];
    }
    public function actionGetUserComments()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        $session = \Yii::$app->session;

        if ($session->has('user')) {
            $user = $session->get('user'); // 获取当前登录用户的 Session 信息
            $userId = $user['id'];

            // 查询用户的歌单评论
            $playlistComments = (new \yii\db\Query())
                ->select(['CommentID', 'PlaylistID', 'CommentText', 'CommentDate'])
                ->from('playlistcomments')
                ->where(['UserID' => $userId])
                ->all();

            // 查询用户的 MV 评论
            $mvComments = (new \yii\db\Query())
                ->select(['CommentID', 'MVID', 'CommentText', 'CommentDate'])
                ->from('mvcomments')
                ->where(['UserID' => $userId])
                ->all();
            // 查询歌曲评论
            $songComments = (new \yii\db\Query())
                ->select(['CommentID', 'SongID', 'CommentText', 'CommentDate']) // 选择需要的字段
                ->from('songcomments') // 数据表名称
                ->where(['UserID' => $userId]) // 条件
                ->all();

            return [
                'status' => 1,
                'data' => [
                    'mvComments' => $mvComments,
                    'playlistComments' => $playlistComments,
                    'songComments' => $songComments,
                ],
            ];
        }

        return [
            'status' => 0,
            'message' => '用户未登录',
        ];
    }

    public function actionGetPlaylists()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        try {
            $playlists = (new \yii\db\Query())
                ->select(['PlaylistID', 'Title', 'Description', 'CoverImage'])
                ->from('playlists')
                ->all();

            foreach ($playlists as &$playlist) {
                if (empty($playlist['CoverImage'])) {
                    $playlist['CoverImage'] = '/music-project/assets/images/loading.gif'; // 默认图片
                }
            }

            return [
                'status' => 1,
                'data' => [
                    'playlists' => $playlists,
                ],
            ];
        } catch (\Exception $e) {
            return [
                'status' => 0,
                'message' => $e->getMessage(),
            ];
        }
    }

    public function actionGetSongs($id)
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        try {
            // 查询歌单信息
            $playlist = (new \yii\db\Query())
                ->select(['PlaylistID', 'Title', 'Description', 'CoverImage'])
                ->from('playlists')
                ->where(['PlaylistID' => $id])
                ->one();

            if (!$playlist) {
                return [
                    'status' => 0,
                    'message' => '歌单不存在',
                ];
            }

            // 查询歌单的歌曲信息
            $songs = (new \yii\db\Query())
                ->select([
                    'songs.SongID',
                    'songs.Title',
                    'songs.ArtistID', // 歌手 ID
                    'artists.Name AS ArtistName', // 歌手名字
                    'songs.FilePath',
                    'songs.CoverImage',
                ])
                ->from('playlist_songs')
                ->innerJoin('songs', 'playlist_songs.SongID = songs.SongID')
                ->innerJoin('artists', 'songs.ArtistID = artists.ArtistID') // 联结 artists 表
                ->where(['playlist_songs.PlaylistID' => $id])
                ->orderBy(['playlist_songs.OrderIndex' => SORT_ASC])
                ->all();

            // 查询歌单的评论信息
            $comments = (new \yii\db\Query())
                ->select([
                    'playlistcomments.CommentID',
                    'playlistcomments.UserID',
                    'playlistcomments.CommentText',
                    'playlistcomments.CommentDate',
                ])
                ->from('playlistcomments')
                ->where(['playlistcomments.PlaylistID' => $id])
                ->orderBy(['playlistcomments.CommentDate' => SORT_DESC]) // 按评论时间倒序排列
                ->all();

            return [
                'status' => 1,
                'data' => [
                    'playlist' => $playlist,
                    'songs' => $songs,
                    'comments' => $comments,
                ],
            ];
        } catch (\Exception $e) {
            return [
                'status' => 0,
                'message' => $e->getMessage(),
            ];
        }
    }

    public function actionGetVideoDetail($id)
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        try {
            // 查询视频详情，包括艺术家名称
            $video = (new \yii\db\Query())
                ->select([
                    'musicvideos.MVID',
                    'musicvideos.Title',
                    'musicvideos.ArtistID',
                    'artists.Name AS ArtistName', // 获取艺术家名称
                    'musicvideos.VideoPath',
                    'IFNULL(mvlikes.LikeCount, 0) AS LikeCount',
                ])
                ->from('musicvideos')
                ->leftJoin('artists', 'musicvideos.ArtistID = artists.ArtistID') // 连接 artists 表
                ->leftJoin('mvlikes', 'musicvideos.MVID = mvlikes.MVID')
                ->where(['musicvideos.MVID' => $id])
                ->one();

            if ($video) {
                return [
                    'status' => 1,
                    'data' => ['video' => $video],
                ];
            } else {
                return [
                    'status' => 0,
                    'message' => '视频不存在',
                ];
            }
        } catch (\Exception $e) {
            return [
                'status' => 0,
                'message' => $e->getMessage(),
            ];
        }
    }

    public function actionGetMvs()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        try {
            $mvs = (new \yii\db\Query())
                ->select([
                    'musicvideos.MVID',
                    'musicvideos.Title',
                    'musicvideos.CoverImage',
                    'IFNULL(mvlikes.LikeCount, 0) AS LikeCount',
                ])
                ->from('musicvideos')
                ->leftJoin('mvlikes', 'musicvideos.MVID = mvlikes.MVID')
                ->all();

            return [
                'status' => 1,
                'data' => [
                    'mvs' => $mvs,
                ],
            ];
        } catch (\Exception $e) {
            return [
                'status' => 0,
                'message' => $e->getMessage(),
            ];
        }
    }

    public function actionSearchMvs()
    {
    \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

    try {
        $query = \Yii::$app->request->get('query'); // 获取查询参数

        if (empty($query)) {
            throw new \Exception("查询关键词不能为空");
        }

        // 在数据库中搜索相关 MV
        $mvs = (new \yii\db\Query())
            ->select(['MVID', 'Title', 'CoverImage', 'IFNULL(LikeCount, 0) AS LikeCount'])
            ->from('musicvideos')
            ->leftJoin('mvlikes', 'musicvideos.MVID = mvlikes.MVID')
            ->where(['like', 'Title', $query]) // 使用 `like` 关键字模糊匹配
            ->all();

        return [
            'status' => 1,
            'data' => [
                'mvs' => $mvs,
            ],
        ];
    } catch (\Exception $e) {
        return [
            'status' => 0,
            'message' => $e->getMessage(),
        ];
    }
    }

    public function actionLikeMv()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        try {
            $request = \Yii::$app->request;
            $MVID = $request->post('MVID');

            if (!$MVID) {
                throw new \Exception("参数 MVID 缺失");
            }

            // 更新点赞数
            $mvLike = (new \yii\db\Query())
                ->select('*')
                ->from('mvlikes')
                ->where(['MVID' => $MVID])
                ->one();

            if ($mvLike) {
                // 如果记录存在，更新点赞数
                \Yii::$app->db->createCommand()
                    ->update('mvlikes', ['LikeCount' => $mvLike['LikeCount'] + 1], ['MVID' => $MVID])
                    ->execute();
            } else {
                // 如果记录不存在，插入新记录
                \Yii::$app->db->createCommand()
                    ->insert('mvlikes', ['MVID' => $MVID, 'LikeCount' => 1])
                    ->execute();
            }

            return [
                'status' => 1,
                'message' => '点赞成功',
            ];
        } catch (\Exception $e) {
            return [
                'status' => 0,
                'message' => $e->getMessage(),
            ];
        }
    }
    
    public function actionGetComments($videoId)
    {
    \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

    try {
        // 查询与视频关联的评论
        $comments = (new \yii\db\Query())
            ->select([
                'mvcomments.UserID',
                'mvcomments.CommentText',
                'mvcomments.CommentDate',
                'users.Username AS UserName', // 获取用户名
            ])
            ->from('mvcomments')
            ->leftJoin('users', 'mvcomments.UserID = users.UserID') // 连接用户表
            ->where(['mvcomments.MVID' => $videoId])
            ->orderBy(['mvcomments.CommentDate' => SORT_DESC])
            ->all();

        return [
            'status' => 1,
            'data' => ['comments' => $comments],
        ];
    } catch (\Exception $e) {
        return [
            'status' => 0,
            'message' => $e->getMessage(),
        ];
    }
    }


    public function actionAddComment()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        try {
            $request = \Yii::$app->request;
            $session = \Yii::$app->session;

            // 检查用户是否登录
            if (!$session->has('user')) {
                throw new \Exception("用户未登录");
            }

            $user = $session->get('user');
            $userID = $user['id']; // 获取当前登录用户的 ID

            // 获取请求参数
            $playlistID = $request->post('PlaylistID');
            $commentText = $request->post('CommentText');
            // 调试日志
            error_log("Received PlaylistID: " . json_encode($playlistID));
            error_log("Received CommentText: " . json_encode($commentText));
            // 参数校验
            if (empty($playlistID) || empty($commentText)) {
                throw new \Exception("参数不完整，请提供 PlaylistID 和 CommentText");
            }

            // 插入评论到数据库
            $result = \Yii::$app->db->createCommand()->insert('playlistcomments', [
                'PlaylistID' => $playlistID,
                'UserID' => $userID,
                'CommentText' => $commentText,
                'CommentDate' => date('Y-m-d H:i:s')
            ])->execute();

            if ($result) {
                $commentID = \Yii::$app->db->getLastInsertID(); // 获取插入的评论 ID

                return [
                    'status' => 1,
                    'message' => '评论添加成功',
                    'data' => [
                        'CommentID' => $commentID,
                        'UserID' => $userID,
                        'PlaylistID' => $playlistID,
                        'CommentText' => $commentText,
                        'CommentDate' => date('Y-m-d H:i:s')
                    ]
                ];
            } else {
                throw new \Exception("数据库插入失败");
            }
        } catch (\Exception $e) {
            return [
                'status' => 0,
                'message' => $e->getMessage()
            ];
        }
    }

    public function actionAddMvComment()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        try {
            $request = \Yii::$app->request;
            $session = \Yii::$app->session;

            // 检查用户是否登录
            if (!$session->has('user')) {
                throw new \Exception("用户未登录");
            }

            $user = $session->get('user');
            $userID = $user['id']; // 获取当前登录用户的 ID

            // 获取请求参数
            $MVID = $request->post('MVID'); // 获取 MV 的 ID
            $commentText = $request->post('CommentText'); // 获取评论文本

            // 调试日志
            error_log("Received MVID: " . json_encode($MVID));
            error_log("Received CommentText: " . json_encode($commentText));

            // 参数校验
            if (empty($MVID) || empty($commentText)) {
                throw new \Exception("参数不完整，请提供 MVID 和 CommentText");
            }

            // 插入评论到数据库
            $result = \Yii::$app->db->createCommand()->insert('mvcomments', [
                'MVID' => $MVID,
                'UserID' => $userID,
                'CommentText' => $commentText,
                'CommentDate' => date('Y-m-d H:i:s')
            ])->execute();

            if ($result) {
                $commentID = \Yii::$app->db->getLastInsertID(); // 获取插入的评论 ID

                return [
                    'status' => 1,
                    'message' => '评论添加成功',
                    'data' => [
                        'CommentID' => $commentID,
                        'UserID' => $userID,
                        'MVID' => $MVID,
                        'CommentText' => $commentText,
                        'CommentDate' => date('Y-m-d H:i:s')
                    ]
                ];
            } else {
                throw new \Exception("数据库插入失败");
            }
        } catch (\Exception $e) {
            return [
                'status' => 0,
                'message' => $e->getMessage()
            ];
        }
    }

    public function behaviors()
    {
        return [
            'corsFilter' => [
                'class' => \yii\filters\Cors::class,
                'cors' => [
                    'Origin' => ['http://localhost:8081'], // 前端地址
                    'Access-Control-Request-Method' => ['GET', 'POST', 'OPTIONS'],
                    // 允许的自定义 Headers
                    'Access-Control-Request-Headers' => ['*'],
                    // 是否允许带有 Cookies
                    'Access-Control-Allow-Credentials' => true,
                    // 缓存 CORS 预检请求的秒数
                    'Access-Control-Max-Age' => 3600,
                ],
            ],
        ];
    }

    public function actionGetRandomPlaylistId()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        try {
            // 从数据库中随机获取一个 playlistID
            $randomPlaylist = (new \yii\db\Query())
                ->select(['PlaylistID'])
                ->from('playlists')
                ->orderBy(new \yii\db\Expression('RAND()')) // 使用 RAND() 随机排序
                ->limit(1) // 只取一条记录
                ->one();

            if ($randomPlaylist) {
                return [
                    'status' => 1,
                    'data' => $randomPlaylist,
                ];
            } else {
                return [
                    'status' => 0,
                    'message' => '没有找到歌单',
                ];
            }
        } catch (\Exception $e) {
            return [
                'status' => 0,
                'message' => $e->getMessage(),
            ];
        }
    }


}
