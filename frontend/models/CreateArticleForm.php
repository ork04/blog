<?php
    namespace frontend\models;


    use Yii;
    use yii\base\Model;
    use yii\db\ActiveRecord;
    use common\models\Articles;

    class CreateArticleForm extends Model
    {
        public $title;
        public $descr;
        public $user_id;
        public $create_date;

        public function rules(){
            return [
                [['title','descr','user_id'], 'required'],
            ];
        }

        function createArticle(){
            $article = new Articles();
            $article->title = $this->title;
            $article->article = $this->descr;
            $article->user_id =$this->user_id;
            $article->create_date = date('Y-m-d H:i:s');

            return $article->save();            
        }
    }
?>