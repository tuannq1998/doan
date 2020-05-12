<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = ['name','slug','title','contents','price','image','description','category_id','brand_id','hot','view','status'];
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
    public function category(){
        return $this->belongsTo(Category::class,'category_id');
    }
    public function brand(){
        return $this->belongsTo(Brand::class,'brand_id');
    }
}
