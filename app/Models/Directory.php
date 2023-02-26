<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Directory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'name_fr',
        'path_file',
        'user_id',
    ];

     /**
     * Permet d'aller chercher le nom du user selon le user_id d'un fichier
     */
    public function dirHasUser(){    
        return $this->hasOne('App\Models\User', 'id', 'user_id'); 
    }


     /**
     * Permet d'aller chercher les infos de tous les fichiers selon la langue choisie par user
     */
     public function selectLangFiles(){
        $lang = session()->get('localeDB');

        $query = $this::select('id', DB::raw("(case when name$lang is null then name else name$lang end) as name"),'user_id', 'created_at')
                ->orderBy('id', 'desc')
                ->paginate(5);
        return $query;
    }
}

