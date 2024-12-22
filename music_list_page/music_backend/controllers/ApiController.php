<?php

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

        // \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
    
        // $username = \Yii::$app->request->get('username');
        // $password = \Yii::$app->request->get('password');
    
        // if ($username !== null && $password !== null) {
        //     // 查询数据库检查用户名和密码是否匹配
        //     $user = Users::find()
        //         ->where(['Username' => $username])
        //         ->one();
    
        //     if ($user !== null && ($password == $user->Password)) {
        //         // 用户名和密码匹配
        //         return ['status' => 1];
        //     } else {
        //         // 用户名和密码不匹配
        //         return ['status' => 0, 'message' => '用户名或密码错误'];
        //     }
        // }
        // return ['status' => -1, 'message' => '参数缺失'];
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
}
