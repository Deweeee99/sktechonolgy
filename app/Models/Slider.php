<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $fillable = ['image', 'small_text_top', 'big_text', 'small_text_bottom'];
}