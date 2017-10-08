<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\models\Articles;

class ArticlesController extends Controller
{
    public function actionArticles(){
        $articles = Articles::find();

        return $this->render('articles',[
            'articles'=>$articles
        ]);
    }

    public function actionArticle(){

    }
}
?>