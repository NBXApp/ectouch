<?php

namespace App\Models\Shop;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DeliveryGood
 */
class DeliveryGood extends Model
{
    protected $table = 'delivery_goods';

    protected $primaryKey = 'rec_id';

    public $timestamps = false;

    protected $fillable = [
        'delivery_id',
        'goods_id',
        'product_id',
        'product_sn',
        'goods_name',
        'brand_name',
        'goods_sn',
        'is_real',
        'extension_code',
        'parent_id',
        'send_number',
        'goods_attr'
    ];

    protected $guarded = [];

        
}