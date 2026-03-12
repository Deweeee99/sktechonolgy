<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = ['slug', 'title', 'content'];
    // Tambahkan fungsi ini di dalam class Page
    public function galleries()
    {
        return $this->hasMany(PageGallery::class);
    }
}