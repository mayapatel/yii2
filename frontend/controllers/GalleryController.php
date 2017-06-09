<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use app\models\Gallery;
use yii\web\UploadedFile;
use yii\data\ActiveDataProvider;

class GalleryController extends Controller
{
    public function actionIndex()
    {
        //$model=new Gallery();
        //return $this->render('index',['model'=>$model,]);
        
        $model=new Gallery();
        
        if($model->load(Yii::$app->request->post()))
        {
           $img= UploadedFile::getInstance($model,'img_name');
           
           $model->img_name=$img->baseName.'.'.$img->extension;
           //echo "You posted ".$imgName; die();
           if($model->save())
           {
               $img->saveAs('uploads/'.$model->img_name);
               
               $dataProvider = new ActiveDataProvider([
            'query' => Gallery::find(),
        ]);
               
               return $this->render('album', [
            'dataProvider' => $dataProvider,
        ]);               
           }
           
        }
        else
        {
            return $this->render('index',['model'=>$model]);
        }
    }

    public function actionAlbum()
    {
        
       $dataProvider = new ActiveDataProvider([
            'query' => Gallery::find(),
        ]);
       
        return $this->render('album', [
            'dataProvider' => $dataProvider,
        ]);
    }
    
    public function actionUpdate($id)
    {
        error_reporting(E_ALL);
        ini_set('display_errors', 1);
        
       //$model=new Gallery();
        $model = $this->findModel($id);
        $model->scenario='update';
         //print_r($model); exit;
        if($model->load(Yii::$app->request->post())&& $model->save())
        {
           //print_r(Yii::$app->request->post()); exit;
           $model->img_name=  UploadedFile::getInstance($model,'img_name');
            if($model->upload())
            {
                
                return $this->redirect(['album', 'id' => $model->gallery_id]);
            }
          /*  else
            {
                print_r($model->getErrors()); exit;
            }*/
            
        }
        
        //print_r('hello');exit;
        return $this->render('update', [
                'model' => $model,
            ]);
    }
    
     public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['album']);
    }
    
    protected function findModel($id)
    {
        if (($model = Gallery::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
