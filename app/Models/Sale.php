<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'customer_name',
        'customer_phone',
        'invoice_number',
        'sale_date',
        'total_amount',
        'payment_status',
        'payment_method'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function saleDetails()
    {
        return $this->hasMany(SaleDetail::class);
    }

    public static function generateInvoiceNumber()
    {
        $date = now()->format('Ymd'); // Tanggal dengan format YYYYMMDD
        $lastInvoice = self::whereDate('created_at', now()->toDateString())
            ->orderBy('id', 'desc')
            ->first();

        $nextNumber = $lastInvoice ? ((int) substr($lastInvoice->invoice_number, -4)) + 1 : 1;
        $formattedNumber = str_pad($nextNumber, 4, '0', STR_PAD_LEFT);

        return "INV/SALE/{$date}/{$formattedNumber}";
    }
}
