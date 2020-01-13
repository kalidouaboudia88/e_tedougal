<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    //protected $fillable = ['name','on_menu'];
    protected $guarded = [];


    public function products(){
        return $this->hasMany("App\Product");
    }

    public function badgeOnMenu(){
        return $this->attributes['on_menu'] ? '<span class="badge badge-primary">Affiché sur menu</span>':'' ;
    }

    public function checkSlug($slug){
        while(!Category::select('slug')->where('slug','like',$slug.'%')->get()->isEmpty()){
            $slug = Str::slug($slug, '_');
        }
        return $slug;
    }

    public static function boot(){
        parent::boot();
        static::saving(function($model){
            $model->slug = Str::slug($model->name);
        });
    }
}
