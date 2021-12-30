<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;
    protected $fillable = ['company_id','file_attachment'];
    
    public function company(){

        return $this->belongsTo(Company::class, 'company_id','id');
    }
}
