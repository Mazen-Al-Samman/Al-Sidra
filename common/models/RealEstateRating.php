<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "real_estate_rating".
 *
 * @property int $id
 * @property int $member_id
 * @property string $customer_name
 * @property string $phone
 * @property string $reporter_name
 * @property string $reason
 * @property int|null $status
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property string $real_estate_type
 * @property string $real_estate_location
 */
class RealEstateRating extends BaseModel
{
    public $type = 'نموذج تقييم عقـاري';
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'real_estate_rating';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['member_id'], 'default', 'value' => Yii::$app->member->id],
            [['customer_name', 'phone', 'real_estate_type', 'reporter_name', 'real_estate_location', 'reason'], 'required',
                'message' => 'لا يمكن ترك حقل {attribute} فارغًـا'
            ],
            [['real_estate_type'], 'in', 'range' => RealEstateTypes::getAllNames(),
                'message' => 'قيمة {attribute} غير صحيحة'
            ],
            ['customer_name', 'trim'],
            [['member_id', 'status'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['customer_name', 'reporter_name', 'real_estate_location'], 'string', 'max' => 255, 'min' => 6,
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
            'customer_name' => 'اســم العميـل',
            'phone' => 'رقــم الجـوال',
            'real_estate_type' => 'نـوع العقــار',
            'reporter_name' => 'اسم طـالب التقـرير',
            'real_estate_location' => 'مـوقــع العقــار',
            'reason' => 'الغـرض من التقيــيم',
            'status' => 'حالـة الطلب',
            'created_at' => 'تاريخ تقديم الطلب',
        ];
    }

    public function fields()
    {
        return [
            'customer_name',
            'phone',
            'real_estate_type',
            'reporter_name',
            'real_estate_location',
            'reason',
            'status',
            'created_at',
        ];
    }
}
