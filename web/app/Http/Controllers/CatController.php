<?php

namespace App\Http\Controllers;

use App\Game;
use App\GameCats;
use App\GameTag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class CatController extends Controller
{

    public function gamesbycat($slug) {

        $g = new Game();
        $gc = new GameCats();
		$gt = new GameTag();
		
		$gt_all = $gt->getArrayTagRichInfo();
        $gt_by_id = $gt_all[0];
        $arr_tags = $gt_all[1];

        $cat_id = $gc->getCatIDBySlug($slug);

        $user = \Auth::user();
        $role = -1; // no user logged in
        if (isset($user))
            $role = $user->role;

        if (isset($cat_id)) {
            $g_by_cat = $g->getGamesByCatID($cat_id, 200);
            if ($g_by_cat) {
                return view('cat.cat', [
                    'role' => $role,
                    'id' => $cat_id,
                    'g' => $g_by_cat, // all games by cat
                    'gt_by_id' => $gt_by_id, // array all tag by id: (id => (name, slug)),...
                    'arr_tags' => array_unique($arr_tags)
                ]);
            }
        }
            
        $g_randomcat = $g->getGamesByCatID(6, 200); // Shooting
        return view('cat.cat', [
                'role' => $role,
                'id' => $id[0]->id ?? 6,
                'slug' => $slug,
                'g' => $g_randomcat,
                'gt_by_id' => $gt_by_id, // array all cat by id: (id => (name, slug)),...
                'arr_tags' => array_unique($arr_tags)
        ]);
        
	}

	public function allcat() {

		$g = new Game();
		$gt = new GameTag();
		$g_randomcat = $g->getGamesByCatID(11, 200); // Driving
		
		$gt_all = $gt->getArrayTagRichInfo();
        $gt_by_id = $gt_all[0];
        $arr_tags = $gt_all[1];
            
        return view('cat.all', [
			'g_randomcat' => $g_randomcat, // all games by cat
			'gt_by_id' => $gt_by_id, // array all cat by id: (id => (name, slug)),...
            'arr_tags' => array_unique($arr_tags)
        ]);
	}
	

}
