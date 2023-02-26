<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Blog extends Model
{
    use HasFactory;

    protected $table = 'articles';


     /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */

    //  $fillable - les champs qu'on autorise pour la création ou la modification
    protected $fillable = [
        'title',
        'content',
        'title_fr',
        'content_fr',
        'user_id',

    ];


    /**
     * Permet d'aller chercher le nom du user selon le user_id d'un article
     */
    public function blogHasUser(){    
        return $this->hasOne('App\Models\User', 'id', 'user_id'); 
    }

    
    /**
     * Permet d'aller chercher les infos de tous les articles selon la langue choisie par user
     */
    public function selectBlogs(){
        $lang = session()->get('localeDB');

        $query = $this::select('id', DB::raw("(case when title$lang is null then title else title$lang end) as title"), DB::raw("(case when content$lang is null then content else content$lang end) as content"), 'user_id', 'created_at')
                ->orderBy('id', 'desc')
                ->paginate(5);
        return $query;
    }

    /**
     * Permet d'aller chercher les infos d'un article selon la langue choisie par user
     */
    public function selectBlog($id){
        $lang = session()->get('localeDB');

        $query = $this::select('id', DB::raw("(case when title$lang is null then title else title$lang end) as title"), DB::raw("(case when content$lang is null then content else content$lang end) as content"), 'user_id')
            ->where('id', $id)
            ->get();
        return $query;
    }
}