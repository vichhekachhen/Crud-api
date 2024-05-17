<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['name', 'age', 'province','score','phone_number'];

    public function getStatusAttribute(){
        if ($this->score < 50){
            return "Failed!!";
        }else {
            return "Passed!!";
        };
    }

    public static function list()
    {
        $data = self::all();
        return $data;
    }

    public static function store($request,$id=null)
    {
        $data = $request->only('name', 'age', 'province','score','phone_number');
        $data = self::updateOrCreate(['id'=>$id],$data);
        return $data;
    }
}
 