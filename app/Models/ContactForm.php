<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactForm extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'title',
        'email',
        'url',
        'gender',
        'age',
        'contact',
        
    ];

    public function scopeSearch($query, $serch)
    {
        if($serch !== null){
            $serch_split = mb_convert_kana($serch, 's'); //全角スペースを半角
            $serch_split2 = preg_split('/[\s]+/', $serch_split); //空白を区切る
            foreach( $serch_split2 as $value ){
                $query->where('name', 'like', '%' .$value. '%');
            } 
        }

        return $query;
    }
}
