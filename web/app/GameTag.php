<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GameTag extends Model
{

    protected $table = 'game_tag';
    public $timestamps = false;

    // below is no need because default
    // protected $primaryKey = 'id';
    // public $incrementing = true;
    // const CREATED_AT = 'created_at';
    // const UPDATED_AT = 'updated_at';

    public function getAllGameTag() {
        if (app()->getLocale() != 'en') {
            return self::join('game_tag_lang', 'game_tag.id', '=', 'game_tag_lang.g_tag_id')
                    ->where('lang', app()->getLocale())
                    ->get();
        }
        return self::all();
    }

    public function del($id) {
        return self::where('id', $id)->delete();
    }

    public function getTagBySlug($slug) {
        if (app()->getLocale() != 'en') {
            return self::join('game_tag_lang', 'game_tag.id', '=', 'game_tag_lang.g_tag_id')
                    ->where('lang', app()->getLocale())
                    ->where('game_tag_lang.g_tag_slug', $slug)
                    ->get();
        }
        return self::where('g_tag_slug', $slug)->get();
    }
    public function getTagSlugByID($id) {
        $lang = app()->getLocale();
        if ($lang != 'en') {
            return DB::select(DB::raw("SELECT g_tag_slug FROM game_tag_lang WHERE g_tag_id = ".$id." AND lang = '".$lang."'"));
        }
        return self::select('g_tag_slug')->where('id', $id)->get();
    }
	public function getTagIDBySlug($slug) {
        $lang = app()->getLocale();
        if ($lang != 'en') {
            $_slug = htmlspecialchars($slug, ENT_QUOTES);
            return DB::select(DB::raw("SELECT g_tag_id as id FROM game_tag_lang WHERE g_tag_slug = '".$slug."' AND lang = '".$lang."'"));
        }
		return self::select('id')->where('g_tag_slug', $slug)->get();
    }
    
    public function getAllTag() {
        $lang = app()->getLocale();
        if ($lang != 'en') {
            return DB::select(DB::raw("SELECT g_tag_name, g_tag_slug FROM game_tag_lang where lang = '".$lang."'"));
        }
        return DB::select(DB::raw("SELECT g_tag_name, g_tag_slug FROM game_tag"));
    }

    public function getArrayTagRichInfo() {
        $gt_all = self::getAllGameTag();
        $arr_tags = array();
        $gt_by_id = array();
        for ($i=0; $i<sizeof($gt_all); $i++) {
            $gt_by_id[$gt_all[$i]->id] = array(
                $gt_all[$i]->g_tag_name,
                $gt_all[$i]->g_tag_slug,
                $gt_all[$i]->g_tag_order
            );
            // $arr_t = explode(',', $gt_all[$i]->g_tag_slug);
            // for ($t=0; $t<sizeof($arr_t); $t++) {
            //     if ($arr_t[$t] != '')
            //         array_push($arr_tags, $arr_t[$t]);
            // }
        }
        return array($gt_by_id, $arr_tags);
    }            

    public function getTagNameByID($id) {
        $lang = app()->getLocale();
        if ($lang != 'en') {
            return DB::select(DB::raw("SELECT g_tag_name FROM game_tag_lang WHERE g_tag_id = ".$id." AND lang = '".$lang."'"));
        }
        return self::select('g_tag_name')->where('id', $id)->get();
    }
}
