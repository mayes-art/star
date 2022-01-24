<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Constants\ItemConst;

class Item extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'items';

    protected $dates = ['deleted_at'];

    protected $fillable = ['name', 'category_id', 'board_id', 'description', 'price', 'stock', 'status', 'on_shelf', 'off_shelf'];

    public function category()
    {
        return $this->belongsTo(ItemCategory::class);
    }

    public function storage()
    {
        // TODO: 待儲位管理
        // return $this->belongsTo(Storage::class);
    }

    public function setStatusAttribute($value)
    {
        if ($value == ItemConst::ON_SHELF) {
            $this->attributes['on_shelf'] = date('Y-m-d H:i:s');
        }

        if ($value == ItemConst::OFF_SHELF) {
            $this->attributes['off_shelf'] = date('Y-m-d H:i:s');
        }
    }

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->toDateTimeString();
    }

    public function getUpdatedAtAttribute($value)
    {
        return Carbon::parse($value)->toDateTimeString();
    }
}
