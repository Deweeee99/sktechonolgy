<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class PageGallery extends Model
{
    protected $fillable = ['page_id', 'type', 'image'];

    public function page()
    {
        return $this->belongsTo(Page::class);
    }
}