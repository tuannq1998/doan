<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Category_Product extends Model
{
    protected $table = 'category_products';
    protected $fillable = ['name','descripsion','status'];
    const STATUS_SHOWS = 1;
    const  STATUS_HIDE = 0;
    protected $c_status = [
        1 =>[
            'name' => 'Shows',
            'class'=>'label-primary'
        ],
        0 =>[
            'name'=>'Hide',
            'class'=>'label-default'
        ]
    ];
    public function getStatus()
    {
        return Arr::get($this->c_status,$this->status, '[N\A]');
    }
}