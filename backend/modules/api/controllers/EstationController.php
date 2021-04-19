<?php

namespace backend\modules\api\controllers;

use Yii;
use yii\web\Response;
use backend\modules\api\models\EStations;
use \yii\filters\ContentNegotiator;
use \yii\rest\ActiveController;

class EstationController extends ActiveController
{

    public $modelClass = Estations::class;

    public function behaviors() {
        return [
            'contentNegotiator' => [
                'class' => ContentNegotiator::class,
                'formatParam' => '_format',
                'formats' => [

                    'application/json' => Response::FORMAT_JSON,
                    'application/xml' => Response::FORMAT_XML,
                ],
            ],
        ];
    }

    public function actionCreateStation()
    {

        $estation = new EStations();
        $estation->scenario = EStations::SCENARIO_CREATE;
        $estation->attributes = Yii::$app->request->post();

        if ($estation->validate() && $estation->save()){
            return ['status'=>true, 'data'=>'E-station created'];
        } else {
            return ['status'=>false, 'data'=>$estation->getErrors()];
        }
    }

    public function actionUpdateStation($id){

        $stationUpdate = EStations::findOne($id);
        $stationUpdate->scenario = EStations::SCENARIO_UPDATE;
        $stationUpdate->attributes = Yii::$app->request->post();

        if ($stationUpdate->validate() && $stationUpdate->save()){
            return ['status'=>true, 'data'=>'E-station updated'];
        } else {
            return ['status'=>false, 'data'=>$stationUpdate->getErrors()];
        }

    }

    public function actionCity($city)
    {
       return EStations::find()->where("city = '$city'")->all();
    }

    public function actionOpen($city, $status){

        return EStations::find()->where("city = '$city'")->andWhere("status_open = '$status'")->all();

    }

    public function actionDelete($id) {

        if (EStations::findOne($id)->delete()){
            return ['status' => 'station was deleted'];
        }
    }
}
