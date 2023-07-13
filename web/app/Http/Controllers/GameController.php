<?php

namespace App\Http\Controllers;

use App\Game;
use App\GameTag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class GameController extends Controller
{

    public function game($slug) {

		$g = new Game();
        $gt = new GameTag();
        
        // $gt_all = $gt->getArrayTagRichInfo();
        // $gc_by_id = $gt_all[0];
        // $arr_tags = $gt_all[1];
        $gt_all = $gt->getArrayTagRichInfo();
        $gt_by_id = $gt_all[0];
        $arr_tags = $gt_all[1];

		$game = $g->getGameBySlug($slug);

        $user = \Auth::user();
        $role = -1; // no user logged in
        if (isset($user))
            $role = $user->role;
		
        if ($game) {
            $g_similar = $g->getGamesByCatID($game->g_cat_1, 32);
            $g->increasePlayTime($slug);
			
            return view('game.game', [
                'g' => $game,
                'role' => $role,
                'g_similar' => $g_similar,
                'gt_by_id' => $gt_by_id, // array all cat by id: (id => (name, slug)),...
                'arr_tags' => array_unique($arr_tags)
            ]);
        } else {

            $g_randomcat = $g->getGamesByCatID(28); // Puzzle

            return view('game.game', [
                'role' => $role,
                'g_randomcat' => $g_randomcat,
                'gt_by_id' => $gt_by_id, 
                'arr_tags' => array_unique($arr_tags)
            ]);
        }
	}

    public function game_m($slug) {

		$g = new Game();
        
		$game = $g->getGameBySlug($slug);

        if ($game) {
            $g->increasePlayTime($slug);
			
            return view('game.game_m', [
                'g' => $game,
            ]);
        } else {

            return 'No game found!';
        }
    }

    public function manage_game(Request $request) {
        $g = new Game();
        $vote = $request->input('m_vote');
        $vote_time = $request->input('m_vote_time');
        $play_time = $request->input('m_play_time');
        $hot = $request->input('m_hot');
        $cat1 = $request->input('m_cat1');
        $cat_yo = $request->input('m_cat_yo');
        $tag_name = $request->input('m_tag_name');
        $desc = $request->input('m_desc');
        $guide = $request->input('m_guide');
        $not_mobi = $request->input('m_not_mobi');
        $orentation = $request->input('m_orentation');
        $del = $request->input('m_delete');
        $slug = $request->input('m_slug');

        $g->updateGameInfo($vote, $vote_time, $play_time, $hot, $cat1, $cat_yo, $tag_name, $desc, $guide, $not_mobi, $orentation, $del, $slug);

        return redirect()->back();
    }

    public function api_vote_game(Request $request) {
        $g = new Game();
        // $json = json_decode($request, true);
        // $id = $json['id'];
        // $vote_type = $json['vote_type'];
        $id = $request->input('id');
        $vote_type = $request->input('vote_type');

        $status = $g->updateGameVote($vote_type, $id);

        return Response::json(
			array(
				'id'=>$id,
				'vote_type'=>$vote_type,
				'status'=>$status
			)
		);
    }
	
}
