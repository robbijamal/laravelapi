<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Menu extends Model
{
    use HasFactory;
    protected $table = 'menu_web_portal';
    public $primaryKey = 'id';
    protected $fillable = [
        'menu','parent_id','foto','deskripsi','url','status','urut'
    ];

    static function getMenu(){
        $query = DB::table('menu_web_portal');
        return $query;
    }
}
