<?php

namespace App\Models;

use App\Scopes\TenantScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;
    protected $table = 'accounts';

    protected $fillable = [
        'account_name', 'address', 'balance', 'account_author', 'account_author_number', 'account_author_email', 'account_author_address', 'note', 'tenant_id'
    ];

    public function transactions() {
        return $this->hasMany(Transaction::class);
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
