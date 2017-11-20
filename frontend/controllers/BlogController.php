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
use frontend\models\Articles;
use frontend\models\CreateArticleForm;

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
        $model = new SinginForm();
        if($model->load(\Yii::$app->request->post())){
            if($model->validate()){
                if($model->singin() >=1){
                        $cr_model = new CreateArticleForm();
                    //return $this->render('general');
                    return $this->render('general',[ 
                        'user_id' => $model->singin(),
                        'model' => $cr_model
                        ]);
                }elseif($model->singin() == 0){
                    return $this->render('enter', ['err'=>0]);
                }/*else{ 
                    return $this->render('enter', ['err'=>2]);
                }*/
            }
        }else{
            return $this->render('enter', ['model'=>$model]);
        }
    }

    public function actionSuccess(){
        $model = new SinginForm();
        if($model->load(\Yii::$app->request->post())){
            if($model->validate()){
                if($model->singin() ==1){
                    return $this->render('general');
                }elseif($model->singin() == 0){
                    return $this->render('success', ['err'=>0]);
                }else{ 
                    return $this->render('success', ['err'=>2]);
                }
            }
        }else{
            return $this->render('success', ['model'=>$model]);
        }
    }

    public function actionGeneral(){
        $articles = Articles::find()->all();
        $model = new CreateArticleForm();
        $create = 0;
        $cookies = Yii::$app->request->cookies;
        $user_id = $cookies->getValue('user_id');
        if($model->load(\Yii::$app->request->post())){
            if ($model->validate()){print 'sadfasdf'; die();
                if($model->create()){
                    $create =1;
                }
            }else{
                $error = $model->errors;
            }
        }    
        return $this->render('general',[
                'articles'=>$articles, 
                'model' => $model,
                'create' => $create,
                'user_id' => $user_id,
                'error' => $error
                ]);
    }

}

