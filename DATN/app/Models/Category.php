<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Category extends Model
{
    protected $table = 'categories';
    protected $fillable = ['name','description','status'];
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
