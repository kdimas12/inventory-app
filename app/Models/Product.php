<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'code',
        'name',
        'description',
        'unit',
        'buy_price',
        'sell_price'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function inventories()
    {
        return $this->hasMany(Inventory::class);
    }

    public function purchaseDetails()
    {
        return $this->hasMany(PurchaseDetail::class);
    }

    public function saleDetails()
    {
        return $this->hasMany(SaleDetail::class);
    }

    public static function generateItemCode()
    {
        // Get last item code
        $lastItem = self::where('code', 'like', 'PRD%')
            ->orderBy('code', 'desc')
            ->first();

        // Generate new sequential number
        if ($lastItem) {
            $lastNumber = intval(substr($lastItem->code, 3));
            $newNumber = $lastNumber + 1;
        } else {
            $newNumber = 1;
        }

        // Format new code with leading zeros
        return 'PRD' . str_pad((string)$newNumber, 4, '0', STR_PAD_LEFT);
    }
}
