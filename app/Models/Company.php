<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = ['company_name','address','phone_no','summery','email','logo','file'];

    public function file(){

        return $this->hasMany(File::class, 'company_id','id');
    }
    
}
