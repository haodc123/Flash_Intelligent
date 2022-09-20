<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GameCatT extends Model
{

    protected $table = 'game_cat_t';
    public $timestamps = false;

    // below is no need because default
    // protected $primaryKey = 'id';
    // public $incrementing = true;
    // const CREATED_AT = 'created_at';
    // const UPDATED_AT = 'updated_at';

    public function getAllGameCatT() {
        if (app()->getLocale() != 'en') {
            return self::join('game_cat_t_lang', 'game_cat_t.id', '=', 'game_cat_t_lang.g_cat_t_id')
                    ->where('lang', app()->getLocale())
                    ->get();
        }
        return self::all();
    }

    public function del($id) {
        return self::where('id', $id)->delete();
    }

    public function getCatTBySlug($slug) {
        if (app()->getLocale() != 'en') {
            return self::join('game_cat_t_lang', 'game_cat_t.id', '=', 'game_cat_t_lang.g_cat_t_id')
                    ->where('lang', app()->getLocale())
                    ->where('game_cat_t_lang.g_cat_t_slug', $slug)
                    ->get();
        }
        return self::where('g_cat_t_slug', $slug)->get();
    }
    public function getCatTSlugByID($id) {
        $lang = app()->getLocale();
        if ($lang != 'en') {
            return DB::select(DB::raw("SELECT g_cat_t_slug FROM game_cat_t_lang WHERE g_cat_t_id = ".$id." AND lang = '".$lang."'"));
        }
        return self::select('g_cat_t_slug')->where('id', $id)->get();
    }
	public function getCatTIDBySlug($slug) {
        $lang = app()->getLocale();
        if ($lang != 'en') {
            $_slug = htmlspecialchars($slug, ENT_QUOTES);
            return DB::select(DB::raw("SELECT g_cat_t_id as id FROM game_cat_t_lang WHERE g_cat_t_slug = '".$slug."' AND lang = '".$lang."'"));
        }
		return self::select('id')->where('g_cat_t_slug', $slug)->get();
    }
    
    public function getAllCatT() {
        $lang = app()->getLocale();
        if ($lang != 'en') {
            return DB::select(DB::raw("SELECT g_cat_t_name, g_cat_t_slug FROM game_cat_t_lang where lang = '".$lang."'"));
        }
        return DB::select(DB::raw("SELECT g_cat_t_name, g_cat_t_slug FROM game_cat_t"));
    }

    public function getArrayCatTRichInfo() {
        $gc_all = self::getAllGameCatT();
        $arr_tags = array();
        $gc_by_id = array();
        for ($i=0; $i<sizeof($gc_all); $i++) {
            $gc_by_id[$gc_all[$i]->id] = array(
                $gc_all[$i]->g_cat_name,
                $gc_all[$i]->g_cat_slug,
                $gc_all[$i]->g_cat_order
            );
            $arr_t = explode(',', $gc_all[$i]->g_cat_tags_slug);
            for ($t=0; $t<sizeof($arr_t); $t++) {
                if ($arr_t[$t] != '')
                    array_push($arr_tags, $arr_t[$t]);
            }
        }
        return array($gc_by_id, $arr_tags);
    }            
}
