<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "real_estate_request".
 *
 * @property int $id
 * @property int $member_id
 * @property string $customer_name
 * @property string $email
 * @property string $phone
 * @property string $message
 * @property int|null $status
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class RealEstateRequest extends BaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'real_estate_request';
    }

    public function loadDefaultValues($skipIfSet = true)
    {
        $this->customer_name = Yii::$app->member->identity->username;
        $this->phone = Yii::$app->member->identity->phone;
        $this->email = Yii::$app->member->identity->email;
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['member_id'], 'default', 'value' => Yii::$app->member->id],
            [['customer_name', 'email', 'phone', 'message'], 'required',
                'message' => 'لا يمكن ترك حقل {attribute} فارغًـا'
            ],
            ['customer_name', 'trim'],
            ['email', 'email', 'message' => 'يجب إدخال {attribute} صالـح!'],
            [['member_id'], 'integer',
                'message' => 'يجب أن تكون قيمة {attribute} رقمـًا'
            ],
            [['message', 'customer_name'], 'string', 'max' => 255, 'min' => 6,
                'message' => 'يجب أن تكون قيمة {attribute} نصـًا',
                'tooLong' => 'يجب أن يحتوي {attribute} على 255 حرفـًا كـ حد أقصى',
                'tooShort' => 'يجب أن يحتوي {attribute} على 6 أحرف كـ حد أدنى'
            ],
            ['phone', 'validatePhone']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'customer_name' => 'الاســم',
            'email' => 'البريــد الإلكتـروني',
            'phone' => 'رقـم الهاتــف',
            'message' => 'نص الرســالة'
        ];
    }
}
