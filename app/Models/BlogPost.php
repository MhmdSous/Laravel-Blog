<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    use HasFactory;
    protected $fillable = ['title_ar', 'title_en', 'body_ar', 'body_en', 'user_id', 'image'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    //    function that handle language if it is arabic return title_ar and body_ar if not return title_en and body_en
    public function getBlogPostAttribute($lang)
    {
        // i want to pass lang in header then check if lang=ar return title_ar and body_ar if not return title_en and body_en
        if ($lang == 'ar') {
            return [
                'id' => $this->id,
                'title' => $this->title_ar,
                'body' => $this->body_ar,
                'image' => $this->image,
                'user_id'=>$this->user_id,

            ];
        } else {
            return [
                'title' => $this->title_en,
                'body' => $this->body_en,
                'image' => $this->image,
                'user_id'=>$this->user_id,
                'id' => $this->id,

            ];
        }

    }
}
