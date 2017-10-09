<?php
    namespace frontend\models;

    use Yii;
    use yii\base\Model;
    use common\models\Users;

    class SinginForm 
    {
        public $login;
        public $password;

        public function rules(){
            return [
                [['login', 'password'], 'required'],
            ];
        }

        public function singin(){
            $user = new Users();
            $user->login = $this->login;
            $user->password = $this->password;
            $query = $user::find()->where('login=:login',[':login'=>$user->login])->andWhere('password=:password',[':password'=>$user->password])->count();
            if($query) return $query;
        }
    }
?>