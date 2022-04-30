<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $phone;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            [['username', 'password', 'email'], 'required', 'message' => "لا يمكن ترك {attribute} فارغًا"],
            ['username', 'string', 'min' => 2, 'max' => 255,
                'message' => '{attribute} يجب أن يتكون نصّـًًا',
                'tooShort' => '2 يجب أن يكون عدد حروف {attribute} على الأقل',
                'tooLong' => '255 يجب أن يكون عدد حروف {attribute} كحد أعلى ',
            ],

            ['email', 'trim'],
            ['email', 'email', 'message' => 'يجب إدخال {attribute} صالـح!'],
            ['email', 'string', 'max' => 255,
                'message' => '{attribute} يجب أن يتكون نصّـًًا',
                'tooLong' => '255 يجب أن يكون عدد حروف {attribute} كحد أعلى ',
            ],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => "{attribute} محجوز من مستخدم اخر"],

            ['password', 'string', 'min' => Yii::$app->params['user.passwordMinLength'],
                'message' => '{attribute} يجب أن يتكون نصّـًًا',
                'tooShort' => Yii::$app->params['user.passwordMinLength'] . ' يجب أن يكون عدد حروف {attribute} على الأقل',
            ],
        ];
    }

    /**
     * Signs user up.
     *
     * @return bool whether the creating new account was successful and email was sent
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }

        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->generateEmailVerificationToken();

        return $user->save() && $this->sendEmail($user);
    }

    public function attributeLabels()
    {
        return [
            'username' => 'اسم المستخدم',
            'email' => 'البريد الإلكتروني',
            'password' => 'كلمة السر',
            'phone' => 'رقــم الهاتف',
        ];
    }

    /**
     * Sends confirmation email to user
     * @param User $user user model to with email should be send
     * @return bool whether the email was sent
     */
    protected function sendEmail($user)
    {
        return Yii::$app
            ->mailer
            ->compose(
                ['html' => 'emailVerify-html', 'text' => 'emailVerify-text'],
                ['user' => $user]
            )
            ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name . ' robot'])
            ->setTo($this->email)
            ->setSubject('Account registration at ' . Yii::$app->name)
            ->send();
    }
}
