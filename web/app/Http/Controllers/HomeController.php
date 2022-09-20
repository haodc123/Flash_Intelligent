<?php

namespace App\Http\Controllers;

use App\Game;
use App\GameCats;
use App\GameCatT;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index(Request $request) {

        $g = new Game();
        $gc = new GameCats();
        $gt = new GameCatT();
        $g_new = $g->getNewGames(\Config::get('constants.general.number_game_in_block'));
        $g_hot = $g->getHotnSpecialGames(\Config::get('constants.general.number_game_in_block')); 

        $gt_all = $gt->getArrayCatTRichInfo();
        $gc_by_id = $gt_all[0];
        $arr_tags = $gt->getAllCatT();

        $gbc_uA = $g->getGamesByCatYO(\Config::get('constants.general.step_year_old_A'), '<', 20); // Under A
        $gbc_aA = $g->getGamesByCatYO(\Config::get('constants.general.step_year_old_A'), '>=', 20); // Above A

        // print_r($gc_by_id);
        return view('home.home', [
            'g_new' => $g_new,
            'g_hot' => $g_hot,
            'gbc_uA' => $gbc_uA,
            'gbc_aA' => $gbc_aA,
            'gc_by_id' => $gc_by_id,
            'arr_tags' => $arr_tags
        ]);
    }

    public function changeLanguage($language)
    {
        \Session::put('website_language', $language);

        return redirect()->back();
    }
}
