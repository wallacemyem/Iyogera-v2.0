<?php

namespace App;
use App\ExpenseCategory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    public function expense_category()
    {
        return $this->belongsTo(ExpenseCategory::class, 'expense_category_id');
    }
}
