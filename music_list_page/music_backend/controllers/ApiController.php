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
                return ['status' => 1];
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
