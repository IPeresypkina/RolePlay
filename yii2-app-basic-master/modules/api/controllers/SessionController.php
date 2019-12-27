<?php


namespace app\modules\api\controllers;

use app\models\Session;

class SessionController extends BaseController
{
    public function actionSessions($plotId)
    {
        return Session::findAll(['plotsId' => $plotId]);
    }
}