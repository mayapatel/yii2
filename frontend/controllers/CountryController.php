<?php

namespace frontend\controllers;

use Yii;
use app\models\Country;
use yii\web\Controller;
use yii\data\ActiveDataProvider;

class CountryController extends Controller
{
        
    public function actionIndex()
    {
        $model=new Country();
        //if ($model->load(Yii::$app->request->post()) && $model->save())
        if ($model->load(Yii::$app->request->post())&& $model->save())
        {
            return $this->redirect(['view', 'id' => $model->country_id]);
        }
        else
        {
            return $this->render('index',['model'=>$model]);
        }
    }
 
    public function actionUpdate($id)
    {
        $model=  $this->findModel($id);
        if($model->load(Yii::$app->request->post())&& $model->save())
        {
            return $this->redirect(['view','id'=>$model->country_id]);
        }
        else
        {
            return $this->render('update',['model'=>$model,]);
        }
    }

    public function actionView()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Country::find(),
        ]);
       
        return $this->render('view', [
            'dataProvider' => $dataProvider,
        ]);
        /*, [
            'model' => $this->findModel($id),
        ]);*/
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['view']);
    }
    
    protected function findModel($id)
    {
        if (($model = Country::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
