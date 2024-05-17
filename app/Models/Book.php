<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Book extends Model
{
    
    use HasFactory;
    protected $fillable = [
        'title', 'author_id', 'genre_id', 'description', 'cover_image', 'published_date'];
//     public function store()
// {
//     // Your validation and other necessary logic before insertion

//     // Inserting a record into the books table
//     DB::table('books')->insert([
//         'title' => 'Sample Title',
//         'created_at' => now(),
//         'updated_at' => now(),
//     ]);
// }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
    
}
