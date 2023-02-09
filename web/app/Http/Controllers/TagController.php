<?php

namespace App\Http\Controllers;

use App\Game;
use App\GameTag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class TagController extends Controller
{

    public function gamesbytag($slug) {

		$g = new Game();
		$gt = new GameTag();
		$g_by_tags = $g->getGamesByTag($slug);
        
        $gt_all = $gt->getArrayTagRichInfo();
        $gt_by_id = $gt_all[0];
		$arr_tags = $gt_all[1];
		
		$user = \Auth::user();
		$role = -1; // no user logged in
		if (isset($user))
            $role = $user->role;
		
        return view('tags.tags', [
			'role' => $role,
			'slug' => $slug,
			'g' => $g_by_tags, // all games by tags
			'gt_by_id' => $gt_by_id, // array all tag by id: (id => (name, slug)),...
            'arr_tags' => array_unique($arr_tags)
        ]);
	}
	
    public function api_gamesbytag($tag_name) {

		$g = new Game();
		$gt = new GameTag();
        //$tag_name = $gt->getTagNameByID($id);
        // $tag_name = $tag_name->g_tag_name;
		$g_by_tag = $g->getGamesByTagName($tag_name, 18);

		$gt_all = $gt->getArrayTagRichInfo();
        $gt_by_id = $gt_all[0];
		
        return Response::json(
			array(
				0=>$g_by_tag,
				1=>$tag_name,
				2=>$gt_by_id
			)
		);
    }
}
