<?php

namespace common\models;

use Yii;
use yii\base\Exception;
use yii\base\NotSupportedException;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "member".
 *
 * @property int $id
 * @property string $username
 * @property string $email
 * @property int|null $status
 * @property string $phone
 * @property string $password
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property string $auth_key
 */
class Member extends ActiveRecord implements IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'member';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            [['password', 'phone'], 'required', 'message' => "لا يمكن ترك {attribute} فارغًا"],
            ['username', 'string', 'min' => 2, 'max' => 255,
                'message' => '{attribute} يجب أن يتكون نصّـًًا',
                'tooShort' => '2 يجب أن يكون عدد حروف {attribute} على الأقل',
                'tooLong' => '255 يجب أن يكون عدد حروف {attribute} كحد أعلى ',
            ],
            [['email', 'username'], 'required', 'on' => 'signup', 'message' => "لا يمكن ترك {attribute} فارغًا"],
            [['phone'], 'validatePhone', 'on' => 'signup'],
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
                'on' => 'signup'
            ],
            ['password', 'filter', 'filter' => function ($value) {
                return Yii::$app->security->generatePasswordHash($value);
            }],
            ['password', 'validateMember'],
            [['status'], 'integer'],
            [['status'], 'default', 'value' => Constant::STATUS_ACTIVE],
            [['created_at', 'updated_at'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'username' => 'اسم المستخدم',
            'email' => 'البريد الإلكتروني',
            'password' => 'كلمة السر',
            'phone' => 'رقــم الهاتف',
        ];
    }

    public function getMember()
    {
        $model = self::findOne(['phone' => $this->phone]);
        if (!empty($model) && $model->validatePassword($this->password)) return $model;
        return null;
    }

    /**
     * @param string $attribute the attribute currently being validated
     */
    public function validateMember($attribute)
    {
        $member = $this->getMember();
        if (empty($member)) {
            $this->addError($attribute, 'خطأ في اسم المستخدم أو كلمة السر');
        }
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password);
    }

    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id, 'status' => Constant::STATUS_ACTIVE]);
    }

    /**
     * @throws NotSupportedException
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    public function getId()
    {
        return $this->getPrimaryKey();
    }

    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    public function validatePhone($attribute) {
        $pattern = '/^(009665|9665|\+9665|05|5)([503649187])(\d{7})$/';
        if (!preg_match($pattern, $this->{$attribute})) {
            $this->addError($attribute, 'يرجى إدخال رقم سعودي صحيح !');
        }
    }

    /**
     * @throws Exception
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }
}