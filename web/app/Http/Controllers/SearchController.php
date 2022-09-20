<?php

namespace App\Http\Controllers;

use App\Game;
use App\GameCats;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class SearchController extends Controller
{

    public function search(Request $request) {

	$g = new Game();
	$gc = new GameCats();
	$kw = $request->input('search_data');

	$gc_all = $gc->getArrayCatRichInfo();
        $gc_by_id = $gc_all[0];
        $arr_tags = $gc_all[1];

        $g_search = $g->getGamesBySearch($kw);

        if (sizeof($g_search) > 0) {
            return view('search.search', [
                    'kw' => $kw,
                    'g' => $g_search, // all games by kw
                    'gc_by_id' => $gc_by_id, // array all cat by id: (id => (name, slug)),...
                    'arr_tags' => array_unique($arr_tags)
            ]);
        }
            
        $g_randomcat = $g->getGamesByCatID(6); // Shooting
        return view('search.search', [
                'kw' => $kw,
                'g_randomcat' => $g_randomcat,
                'gc_by_id' => $gc_by_id, // array all cat by id: (id => (name, slug)),...
                'arr_tags' => array_unique($arr_tags)
        ]);
        
	}

}
