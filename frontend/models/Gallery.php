<?php

namespace app\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "gallery".
 *
 * @property integer $gallery_id
 * @property string $img_name
 * @property string $img_Discription
 * @property integer $city_id
 *
 * @property City $city
 */
class Gallery extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'gallery';
    }

    /**
     * @inheritdoc
     */
    /*public function rules()
    {
        return [
             [['img_name', 'img_description', 'city_id'], 'required','except' =>'update'],
            [['img_description'],'required','on'=>'update'],
            [['img_description'], 'string', 'max' => 100],
            [['city_id'], 'exist', 'skipOnError' => true, 'targetClass' => City::className(), 'targetAttribute' => ['city_id' => 'city_id']],
        ];
        
    }
    
    public function scenarios() {
        $scenarios=parent::scenarios();
        $scenarios['update']=['img_description'];
        return $scenarios;
    }
*/
 const SCENARIO_UPDATE = 'update';
  public function rules()
    {
        return [
             [['img_name', 'img_description', 'city_id'], 'required','except' =>'update'],
            [['img_description'],'required','on'=>'update'],
            [['img_name'],'file','extensions'=>['jpg','jpeg','gif','png'],'on'=>'update'],
            [['city_id'],'string','on'=>'update'],
            [['img_description'], 'string', 'max' => 100],
            [['city_id'], 'exist', 'skipOnError' => true, 'targetClass' => City::className(), 'targetAttribute' => ['city_id' => 'city_id']],
        ];
        
    }
    
    
    public function scenarios()
    {
        $scenarios = parent::scenarios();   
        $scenarios[self::SCENARIO_UPDATE] = ['img_name','img_description','city_id'];
        //$scenarios[self::SCENARIO_UPDATE]=['img_name'];
        //$scenarios[self::SCENARIO_UPDATE]=['city_id'];
        return $scenarios;
    }

    /*public function upload()
    {
        /*if ($this->validate()) { 
            foreach ($this->img_name as $file) {
                $file->img_nam->saveAs('uploads/' . $file->baseName . '.' . $file->extension);
            }
            return true;
        } else {
            return false;
        }
        if ($model->file = UploadedFile::getInstance($model,'user_avatar')) {
    $model->file->saveAs( '/uploads/'.$img_name.'.'.$model->file->extension );
    //save the path in DB..
    $model->user_avatar = 'uploads/'.$img_name.'.'.$model->file->extension;
    $model->save();
}
    }*/

public function upload()
    {
    //var_dump($this->validate());        die();
        if($this->validate())
        {
            
            //$img->saveAs('uploads/'.$model->img_name);
           // $this->img_name->saveAs('uploads/'.$this->img_name->baseName.'.'.$this->img_name->extension);
            $this->img_name->saveAs('uploads/'.$this->img_name);
            print_r($this); exit;
            
            return true;
            
        }
        else
        {
            return false;
        }
       
    }
    
    
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'gallery_id' => 'Gallery ID',
            'img_name' => 'Image',
            'img_description' => 'Image  Description',
            'city_id' => 'City',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCity()
    {
        return $this->hasOne(City::className(), ['city_id' => 'city_id']);
    }
}
