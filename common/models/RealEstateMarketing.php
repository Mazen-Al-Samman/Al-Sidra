<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "real_estate_marketing".
 *
 * @property int $id
 * @property int $member_id
 * @property string $customer_name
 * @property string $email
 * @property string $phone
 * @property string $real_estate_location
 * @property string $real_estate_type
 * @property string $report_img
 * @property string $real_estate_img
 * @property int|null $status
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class RealEstateMarketing extends BaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'real_estate_marketing';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['member_id'], 'default', 'value' => Yii::$app->member->id],
            [['customer_name', 'email', 'phone', 'real_estate_location', 'real_estate_type'], 'required',
                'message' => 'لا يمكن ترك حقل {attribute} فارغًـا'
            ],
            [['real_estate_type'], 'in', 'range' => RealEstateTypes::getAllNames(),
                'message' => 'قيمة {attribute} غير صحيحة'
            ],
            [['member_id', 'status'], 'integer', 'message' => 'يجب أن تكون قيمة {attribute} رقمـًا'],
            [['created_at', 'updated_at'], 'safe'],
            [['customer_name', 'email', 'real_estate_location', 'real_estate_type'], 'string', 'max' => 255,
                'message' => 'يجب أن تكون قيمة {attribute} نصـًا',
                'tooLong' => 'يجب أن يحتوي {attribute} على 255 حرفـًا كـ حد أقصى'
            ],
            ['email', 'email', 'message' => 'يجب إدخال {attribute} صالـح!'],
            [['real_estate_img', 'report_img'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg'],
            [['phone'], 'validatePhone'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'member_id' => 'Member ID',
            'customer_name' => 'الاسـم',
            'email' => 'البـريـد الإلكتروني',
            'phone' => 'رقـم الجـوال',
            'real_estate_location' => 'مـوقـع العقـار',
            'real_estate_type' => 'نـوع العقـار',
            'report_img' => 'صـورة الصـك',
            'real_estate_img' => 'صـورة العقـار',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
