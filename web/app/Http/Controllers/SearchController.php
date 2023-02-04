<?php

namespace App\Http\Controllers;

use App\Game;
use App\GameTag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class SearchController extends Controller
{

    public function search(Request $request) {

	$g = new Game();
	$gt = new GameTag();
	$kw = $request->input('search_data');

	$gt_all = $gt->getArrayTagRichInfo();
        $gt_by_id = $gt_all[0];
        $arr_tags = $gt_all[1];

        $g_search = $g->getGamesBySearch($kw);

        if (sizeof($g_search) > 0) {
            return view('search.search', [
                    'kw' => $kw,
                    'g' => $g_search, // all games by kw
                    'gt_by_id' => $gt_by_id, // array all cat by id: (id => (name, slug)),...
                    'arr_tags' => array_unique($arr_tags)
            ]);
        }
            
        $g_randomcat = $g->getGamesByCatID(28, 60); // Puzzle
        return view('search.search', [
                'kw' => $kw,
                'g_randomcat' => $g_randomcat,
                'gt_by_id' => $gt_by_id, // array all cat by id: (id => (name, slug)),...
                'arr_tags' => array_unique($arr_tags)
        ]);
        
	}

}
