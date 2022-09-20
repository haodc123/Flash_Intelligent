<?php

namespace App\Http\Controllers;

use App\Game;
use App\GameCats;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class CatController extends Controller
{

    public function gamesbycat($slug) {

		$g = new Game();
		$gc = new GameCats();
		
		$gc_all = $gc->getArrayCatRichInfo();
        $gc_by_id = $gc_all[0];
        $arr_tags = $gc_all[1];

        $id = $gc->getCatIDBySlug($slug);

        $user = \Auth::user();
        $role = -1; // no user logged in
        if (isset($user))
            $role = $user->role;

        if (isset($id[0])) {
            $g_by_cat = $g->getGamesByCatID($id[0]->id, 200);
            if ($g_by_cat) {
                return view('cat.cat', [
                    'role' => $role,
                    'id' => $id[0]->id,
                    'slug' => $slug,
                    'g' => $g_by_cat, // all games by cat
                    'gc_by_id' => $gc_by_id, // array all cat by id: (id => (name, slug)),...
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
                'gc_by_id' => $gc_by_id, // array all cat by id: (id => (name, slug)),...
                'arr_tags' => array_unique($arr_tags)
        ]);
        
	}

	public function allcat() {

		$g = new Game();
		$gc = new GameCats();
		$g_randomcat = $g->getGamesByCatID(11, 200); // Driving
		
		$gc_all = $gc->getArrayCatRichInfo();
        $gc_by_id = $gc_all[0];
        $arr_tags = $gc_all[1];
            
        return view('cat.all', [
			'g_randomcat' => $g_randomcat, // all games by cat
			'gc_by_id' => $gc_by_id, // array all cat by id: (id => (name, slug)),...
            'arr_tags' => array_unique($arr_tags)
        ]);
	}
	
	public function api_gamesbycat($id) {

		$g = new Game();
		$gc = new GameCats();
		$slug = $gc->getCatSlugByID($id);
		$g_by_cat = $g->getGamesByCatID($id, 18);

		$gc_all = $gc->getArrayCatRichInfo();
        $gc_by_id = $gc_all[0];
		
        return Response::json(
			array(
				0=>$g_by_cat,
				1=>$slug,
				2=>$gc_by_id
			)
		);
    }

}
