<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employee extends Model
{
    use HasFactory;
    protected $table ='employees';

    protected $fillable =['user_id','university','major','graduation_year','birthday','adress','status','phone_num','personal_photo','college_degree','cv'];


    public function getStatuseAttribute()
{
    if($this->status == 'available'){

    return 'Available';}

else{
    return 'Not Available';
}

} }




