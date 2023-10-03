<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Category;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'category_id',
        'name',
        'amount',
        'note',
        'add_by',
        'edit_by',
        'created_at',
        'updated_at',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function addby()
    {
        return $this->belongsTo(User::class, 'add_by', 'id');
    }

    public function editby()
    {
        if (!empty($this->edit_by)){
            return $this->belongsTo(User::class, 'edit_by', 'id');
        }
        
        return $this->belongsTo(User::class, 'add_by', 'id');
    }

    public static function search($search)
    {
        return empty($search)
        ? static::query()
        : static::query()->where('id', 'like', '%' . $search . '%')
            ->orWhereHas('category', function($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%');
            })
            ->orWhere('name', 'like', '%' . $search . '%')
            ->orWhere('amount', 'like', '%' . $search . '%')
            ->orWhereHas('addby', function($q) use ($search) {
                $q->where('username', 'like', '%' . $search . '%');
            });
    }
}
