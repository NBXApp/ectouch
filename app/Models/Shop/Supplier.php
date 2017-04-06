<?php

namespace App\Models\Shop;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Supplier
 */
class Supplier extends Model
{
    protected $table = 'suppliers';

    protected $primaryKey = 'suppliers_id';

    public $timestamps = false;

    protected $fillable = [
        'suppliers_name',
        'suppliers_desc',
        'is_check'
    ];

    protected $guarded = [];

        
}