<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TacGia extends Model
{
    use HasFactory;

    protected $table = 'tac_gia';
    
    protected $fillable = ['tenTacGia', 'ngaySinh', 'ngayMat', 'moTa', 'created_at', 'updated_at'];

    public $timestamps = false;
}