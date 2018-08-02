<?php
namespace fatcms\settings\controllers;

use yii\web\Controller;
use yii\filters\AccessControl;
use yii\web\NotFoundHttpException;
use fatcms\settings\models\Setting;

class SettingController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }


    public function actionIndex()
    {

    }


    public function actionCreate()
    {
        
    }
    

    public function actionUpdate()
    {

    }


    public function actionDelete()
    {

    }


    public function actionView()
    {

    }


    /**
     * @param $id
     * @return null|static
     * @throws NotFoundHttpException | mixed
     */
    protected function findModel($id)
    {
        $model = Setting::findOne($id);
        if (! $model) {
            throw new NotFoundHttpException("未查询到数据");
        }

        return $model;
    }

}