<?php


namespace app\modules\api\controllers;

use app\models\Game;
use yii\rest\ActiveController;
use yii\rest\Controller;

class GameController extends BaseActiveController
{
    public $modelClass = 'app\models\Game';
}