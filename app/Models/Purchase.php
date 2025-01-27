<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;

    protected $fillable = [
        'supplier_id',
        'user_id',
        'invoice_number',
        'purchase_date',
        'total_amount',
        'payment_status',
        'payment_method'
    ];

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function purchaseDetails()
    {
        return $this->hasMany(PurchaseDetail::class);
    }

    public static function generateInvoiceNumber()
    {
        $date = now()->format('Ymd'); // Tanggal dengan format YYYYMMDD
        $lastInvoice = self::whereDate('created_at', now()->toDateString())
            ->orderBy('id', 'desc')
            ->first();

        $nextNumber = $lastInvoice ? ((int) substr($lastInvoice->invoice_number, -4)) + 1 : 1;
        $formattedNumber = str_pad($nextNumber, 4, '0', STR_PAD_LEFT);

        return "INV/PURCHASE/{$date}/{$formattedNumber}";
    }
}
