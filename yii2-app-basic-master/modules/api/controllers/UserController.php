<?php

namespace app\modules\api\controllers;

use app\models\Game;
use app\models\RecordForm;
use app\models\User;
use Yii;
use yii\rest\ActiveController;
use yii\rest\Controller;

class UserController extends BaseController
{
    public function verbs()
    {
        return [
            'record' => ['POST', 'OPTIONS'],
            'view' => ['GET', 'OPTIONS'],
        ];
    }

    /**
     * Создание записи пользователя в бд
     * @return RecordForm
     */
    public function actionRecord()
    {
        $model = new RecordForm();
        $model->load(Yii::$app->request->getBodyParams(), '');
        //$model->load(\Yii::$app->request->post(), '');
        if ($model->validate()) {
            $model->record();
        }

        return ['status'=>'success'];
    }

    /**
     * Получение пользователя по id
     * @param $id
     * @return User|null
     */
    public function actionView($id)
    {
        $user = User::findOne($id);
        return $user;
    }
}