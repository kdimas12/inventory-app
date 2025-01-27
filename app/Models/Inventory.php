<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'batch_number',
        'quantity',
        'expired_date',
        'entry_date',
        'status'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function stockMutations()
    {
        return $this->hasMany(StockMutation::class);
    }

    public function saleDetails()
    {
        return $this->hasMany(SaleDetail::class);
    }

    public static function generateBatchNumber()
    {
        $prefix = 'BATCH';
        $date = now()->format('Ymd');
        $sequence = str_pad(rand(1, 9999), 4, '0', STR_PAD_LEFT);

        return "{$prefix}/{$date}/{$sequence}";
    }
}
