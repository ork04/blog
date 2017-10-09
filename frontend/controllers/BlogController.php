<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use frontend\models\RegistrationForm;
use frontend\models\SinginForm;

/**
 * Site controller
 */
class BlogController extends Controller
{
    public $err;

    public function actionIndex(){
        return $this->render('index');
    }

    public function actionRegistration(){
        $model = new RegistrationForm();
        $model->load(\Yii::$app->request->post());
        if($model->validate()){
            $model->registration();
            return $this->render('success', ['model' => $model]);
        }else{
            return $this->render('registration', ['model' => $model]);
        }
    }

    public function actionEnter(){
        return $this->render('enter');
    }

    /*public function actionSuccess(){
        $model = new SinginForm();
        return $this->render('success', ['model'=>$model]);
    }*/

    public function actionSuccess(){
        //if($model->load(\Yii::$app->request->post())){
            if($model->validate()){
                if($model->singin() ==1){
                    return $this->render('general');
                }elseif($model->singin() == 0){
                    return $this->render('success', ['err'=>0]);
                }else{ 
                    return $this->render('success', ['err'=>2]);
                }
            }
      //  }else{
        //    return $this->render('success');
       // }
    }
}
