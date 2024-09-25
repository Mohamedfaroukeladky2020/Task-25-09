<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    // One category has many questions
    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    // One category has many products
    public function products()
    {
        return $this->hasMany(Product::class);
    }


}

?>
