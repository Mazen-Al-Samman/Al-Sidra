<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "real_estate".
 *
 * @property int $id
 * @property int $member_id
 * @property string $contract_type
 * @property string $real_estate_type
 * @property string $address
 * @property string $city
 * @property string $neighborhood
 * @property string $street
 * @property int $num_of_interfaces
 * @property int $num_of_streets
 * @property float $price
 * @property float $area
 * @property string $customer_name
 * @property string $phone
 * @property string $notes
 */
class RealEstate extends BaseModel
{
    public static function tableName()
    {
        return 'real_estate';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['member_id'], 'default', 'value' => Yii::$app->member->id],
            [['contract_type', 'real_estate_type', 'address', 'city', 'neighborhood', 'street', 'num_of_interfaces', 'num_of_streets', 'price', 'area', 'customer_name', 'notes', 'phone'], 'required',
                'message' => 'لا يمكن ترك حقل {attribute} فارغًـا'
            ],
            [['real_estate_type'], 'in', 'range' => RealEstateTypes::getAllNames(),
                'message' => 'قيمة {attribute} غير صحيحة'
            ],
            [['member_id', 'num_of_interfaces', 'num_of_streets'], 'integer',
                'message' => 'يجب أن تكون قيمة {attribute} رقمـًا'
            ],
            [['price', 'area'], 'number',
                'message' => 'يجب أن تكون قيمة {attribute} رقمـًا'
            ],
            [['contract_type', 'real_estate_type', 'address', 'city', 'neighborhood', 'street', 'customer_name', 'phone', 'notes'], 'string', 'max' => 255,
                'message' => 'يجب أن تكون قيمة {attribute} نصـًا',
                'tooLong' => 'يجب أن يحتوي {attribute} على 255 حرفـًا كـ حد أقصى'
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
            'contract_type' => 'نوع العقــد',
            'real_estate_type' => 'نوع العقــار',
            'address' => 'العنـوان',
            'city' => 'المديـنــة',
            'neighborhood' => 'الحــي',
            'street' => 'الشــارع',
            'num_of_interfaces' => 'عدد الواجهـــات',
            'num_of_streets' => 'عدد الشــوارع',
            'price' => 'السعــر بالريال الســعودي',
            'area' => 'المســاحة بالمتر',
            'phone' => 'رقــم الهاتــف',
            'customer_name' => 'اســم صاحـب العقــار',
            'notes' => 'ملاحظـــات',
        ];
    }
}
