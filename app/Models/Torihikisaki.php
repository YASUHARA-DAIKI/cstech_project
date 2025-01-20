<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Torihikisaki extends Model
{
    use HasFactory;

    // モデルに関連付けるテーブル名を指定
    protected $table = 'cstech.torihikisaki';
    // 主キーのカラム名を指定
    protected $primaryKey = 'torihiki_cd';
    // 主キーがインクリメントされるかどうかを指定
    public $incrementing = false;
    // 編集可能な属性を指定
    protected $fillable = [
        'torihiki_cd', //取引先コード
        'client_name', //取引先名
        'client_name_kana', //取引先名（カナ）
        'department_name',//部署名
        'postal_cd', //郵便番号
        'address1', //住所1
        'address2', //住所2
        'main_phone_number'//電話番号
    ];
    // タイムスタンプの自動管理を無効化
    public $timestamps = false;
}
