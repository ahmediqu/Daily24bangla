<?php

namespace App\Models;

use App\Scopes\TenantScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'account_id', 'transactions_type', 'transactions', 'transactions_note', 'tenant_id'
    ];

    public function account() {
        return $this->belongsTo(Account::class, 'account_id');
    }

    protected static function booted()
    {
        static::addGlobalScope(new TenantScope());
        static::creating(function($model){
            if(session()->has('tenant_id')) {
                $model->tenant_id = session()->get('tenant_id');
            }
        });
    }
}
