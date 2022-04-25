<?php

namespace console\controllers;

use common\models\User;
use Yii;
use yii\base\Exception;
use yii\console\Controller;

class AdminController extends Controller
{
    /**
     * @throws Exception
     */
    public function actionCreateAdmin()
    {
        $user = new User();
        $user->username = readline("Admin Name : ");
        $user->email = readline("Email Address : ");
        $password = readline("Password : ");
        $user->password = Yii::$app->security->generatePasswordHash($password);
        $user->status = User::STATUS_ACTIVE;
        $user->created_at = date('Y-m-d H:i:s');
        $user->auth_key = Yii::$app->security->generateRandomString();
        if (!$user->save()) {
            var_dump($user->errors);
            return false;
        }
        echo "Admin Saved Successfully.. \n";
        return true;
    }
}