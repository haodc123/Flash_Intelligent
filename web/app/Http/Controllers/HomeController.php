<?php

namespace App\Http\Controllers;

use App\Game;
use App\GameCats;
use App\GameTag;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index(Request $request) {

        $g = new Game();
        $gt = new GameTag();
        $gt = new GameTag();
        $g_new = $g->getNewGames(\Config::get('constants.general.number_game_in_block'));
        $g_hot = $g->getHotnSpecialGames(\Config::get('constants.general.number_game_in_block')); 

        // $gt_all = $gt->getArrayTagRichInfo();
        // $gt_by_id = $gt_all[0];
        $gt_all = $gt->getArrayTagRichInfo();
        $gt_by_id = $gt_all[0];

        $gbc_uA = $g->getGamesByCatYO(\Config::get('constants.general.step_year_old_A'), '<', 20); // Under A
        $gbc_aA = $g->getGamesByCatYO(\Config::get('constants.general.step_year_old_A'), '>=', 20); // Above A

        // dd($gt_all);
        // dd($gt_by_id);
        return view('home.home', [
            'g_new' => $g_new,
            'g_hot' => $g_hot,
            'gbc_uA' => $gbc_uA,
            'gbc_aA' => $gbc_aA,
            // 'gt_by_id' => $gt_by_id,
            'gt_by_id' => $gt_by_id,
        ]);
    }

    public function changeLanguage($language)
    {
        \Session::put('website_language', $language);

        return redirect()->back();
    }
}
