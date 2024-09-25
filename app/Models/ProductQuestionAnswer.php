<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductQuestionAnswer extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'question_id', 'answer'];

    // An answer belongs to a product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // An answer belongs to a question
    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}


?>
