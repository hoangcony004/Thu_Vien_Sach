<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NhaXuatBan extends Model
{
    use HasFactory;

    // Tên bảng trong cơ sở dữ liệu
    protected $table = 'nha_xuat_ban';

    // Các thuộc tính có thể được gán
    protected $fillable = [
        'tenNhaXuatBan',
        'soDienthoai',
        'email',
        'diaChi',
    ];

    public $timestamps = false;
}