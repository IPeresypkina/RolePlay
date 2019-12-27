<?php


namespace app\modules\api\controllers;

use app\models\Plot;

class PlotController extends BaseController
{
    public function actionPlots($gameId)
    {
        return Plot::findAll(['gamesId' => $gameId]);
    }
}