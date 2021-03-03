<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Str;

class Property extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getTransactionTypeAttribute($transactionType)
    {
        $lookupTransactionTable = [
            0 => 'venda',
            1 => 'alugar'
        ];

        return $lookupTransactionTable[$transactionType];
    }

    public function getTypeAttribute($transactionType)
    {
        $lookupTransactionTable = [
            0 => 'casa',
            1 => 'apartamento',
        ];

        return $lookupTransactionTable[$transactionType];
    }

    public function generateCodeUrl()
    {
        $urlCode = collect();
        
        $urlCode->push(Str::slug($this->id));
        $urlCode->push(Str::slug($this->type));
        $urlCode->push(Str::slug($this->city));
        $urlCode->push(Str::slug($this->state));

        return $urlCode->implode('-');
    }
}
