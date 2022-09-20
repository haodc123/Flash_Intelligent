<?php

namespace App\Http\Controllers;

use App\Game;
use App\GameCats;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class TagsController extends Controller
{

    public function gamesbytags($slug) {

		$g = new Game();
		$gc = new GameCats();
		$g_by_tags = $g->getGamesByTags($slug);
        
        $gc_all = $gc->getArrayCatRichInfo();
        $gc_by_id = $gc_all[0];
        $arr_tags = $gc_all[1];
		
        return view('tags.tags', [
			'slug' => $slug,
			'g' => $g_by_tags, // all games by tags
			'gc_by_id' => $gc_by_id, // array all cat by id: (id => (name, slug)),...
            'arr_tags' => array_unique($arr_tags)
        ]);
	}
	

}
