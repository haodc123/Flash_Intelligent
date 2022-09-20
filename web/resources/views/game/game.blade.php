@if (!isset($g))
	@component('components.header', ['gtitle' => ''])
	@endcomponent
@else
	@component('components.header', ['gtitle' => $g->g_title])
	@endcomponent
@endif


<section id="g-by-cat-1" class="wrapper style2">
@if (!isset($g))
	<div class="inner">
		<header class="cat">
			<h3>{{ trans('message.game.not_exist') }}</h3>
		</header>
	</div>
@else
	<div class="inner">
		<header class="cat">
			<h3 class="pc">{{ $g->g_title }} {{ trans('message.cat.title.2') }} <strong>/  {{ Config::get('constants.general.site_name_upper_1') }}  /</strong></h3>
			<h4 class="mobile">{{ $g->g_title }} {{ trans('message.cat.title.2') }} </h4>
				<h3 class="mobile"><strong>/  {{ Config::get('constants.general.site_name_upper_1') }}  /</strong></h3>
		</header>
			<div class="game-player">
				<div class="g-b-cat tab tab-1 flex flex-3 active">	
				<!-- <iframe id="game-element" allowfullscreen="true" allow="autoplay; fullscreen; camera; focus-without-user-activation *; monetization; gamepad; keyboard-map *; xr-spatial-tracking; clipboard-write" name="gameFrame" scrolling="no" sandbox="allow-forms allow-modals allow-orientation-lock allow-pointer-lock allow-popups allow-popups-to-escape-sandbox allow-presentation allow-scripts allow-same-origin allow-downloads" src="https://games.poki.com/458768/e2c6282e-13db-47a4-99c8-3297118978c1?tag=pg-v3.12.0&amp;site_id=3&amp;categories=3,76,77,93,144,253,1120,1140,1141,1143,1147,1164&amp;iso_lang=en&amp;country=VN&amp;poki_url=https://poki.com/en/g/narrow-one" title="Game"></iframe> -->
				<!-- <iframe id="iplayer" style="display: block;border: none;height: 100vh; width: 100vw;" src='https://minesweeperonline.com/' border='0' width='620' height='465' scrolling='no' marginheight='0' marginwidth='0' frameborder='0' style='float:left; margin-left:0px' allowfullscreen='true' webkitallowfullscreen='true' mozallowfullscreen='true'></iframe> -->
				<iframe id="ifr_play_game" seamless="true" webkitallowfullscreen="true" mozallowfullscreen="true" allowfullscreen="true" webkit-playsinline="true" frameborder="0" scrolling="no" src="{{ $g->g_link }}"></iframe>
				</div>
				<img src="../images/icons/ic-player.png" id="btn_play_game" onclick="openFullscreen('{{ getOrientationMode($g->g_dimension) }}');" />
				<div class="game-intro">
					@if ($role == 1)
					<form method="post" action="{{ route('manage_game')}}">
						{{csrf_field()}}
						<ul class="manage_game">
							<li><input placeholder="Vote" type="text" name="m_vote" /></li>
							<li><input placeholder="Vote_time" type="text" name="m_vote_time" /></li>
							<li><input placeholder="Play_time" type="text" name="m_play_time" /></li>
							<li><input placeholder="Hot" type="text" name="m_hot" /></li>
							<li><input placeholder="Cat 1" type="text" name="m_cat1" /></li>
							<li><input placeholder="Cat 2" type="text" name="m_cat2" /></li>
							<li><input placeholder="Desc" type="text" name="m_desc" /></li>
							<li><input placeholder="Guide" type="text" name="m_guide" /></li>
							<li><input placeholder="Not mobi" type="text" name="m_not_mobi" /></li>
							<li><input placeholder="Orentation" type="text" name="m_orentation" /></li>
							<li><input placeholder="Delete" type="text" name="m_delete" /></li>
							<li><input type="hidden" value="{{ $g->g_title_slug }}" name="m_slug" /></li>
							<li><button type="submit" name="m_btn">Submit</button></li>
						</ul>
						<div class="clear"></div>
					</form>
					@endif

					@if ($g->g_vote_time > 0 || $g->g_play_time > 0)
						{!! showVoteStar2($g->g_vote, $g->g_vote_time, $g->g_play_time) !!}
					@endif
					<ul class="vote-action">
						<li><a data-id="{{ $g->id }}" data-vote="1" href=""><img src="../images/icons/ic-vote-up.png" /></a></li>
						<li><a data-id="{{ $g->id }}" data-vote="-1" href=""><img src="../images/icons/ic-vote-down.png" /></a></li>
					</ul>
					
					<div class="fb-share-button" data-href="{{url()->current()}}" data-layout="button" data-size="small"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Share now</a></div>

					<!-- <span class="ann"></span> -->
					<br />
					
					<span><strong>{{ trans('message.game.author') }}:</strong>&nbsp; {{ $g->g_author }}</span><br />
					<span><strong>{{ trans('message.game.cat') }}:</strong>&nbsp; ⯈ <a href="../cat/{{ $gc_by_id[$g->g_cat_1][1] }}">{{ $gc_by_id[$g->g_cat_1][0] }}</a></span><br />
					<span><strong>{{ trans('message.game.desc') }}:</strong>&nbsp; {{ $g->g_desc }}</span><br />
					<span><strong>{{ trans('message.game.guide') }}:</strong>&nbsp; {{ $g->g_guide }}</span>
				</div>
			</div>
	</div>

@endif
	</section>

	
<!-- Main -->
<div id="main">

	<section id="g-by-cat-2" class="wrapper style2">
		<div class="inner">
				<div class="flex flex-tabs">
					@if (!isset($g_similar))
					<div class="tabs">
							<div class="g-b-cat tab tab-1 flex flex-3 active">
							@for ($i = 8; $i < sizeof($g_randomcat); $i++)
								@component('components.box', [
										'gc_by_id' => $gc_by_id, 
										'gi' => $g_randomcat[$i],
										'role' => 0
									])
								@endcomponent
							@endfor
							</div>
					</div>
					@else
					<div class="tabs">
							<div class="g-b-cat tab tab-1 flex flex-3 active">
							@for ($i = 8; $i < sizeof($g_similar); $i++)
								@component('components.box', [
										'gc_by_id' => $gc_by_id, 
										'gi' => $g_similar[$i],
										'role' => 0
									])
								@endcomponent
							@endfor
							</div>
					</div>
					@endif
					<ul class="tab-list">
						<li class="home"><a href="#" data-tab="tab-1" class="active">{{ trans('message.game.similar') }}</a></li>
						@foreach ($gc_by_id as $gc_by_id_i)
							@if ($gc_by_id_i[2] == 11 || $gc_by_id_i[2] == 22)
								<li class="tags"><a href="../cat/{{ $gc_by_id_i[1] }}" data-tab="tab-1">{{ $gc_by_id_i[0] }}</a></li>
							@endif
						@endforeach
					</ul>
				</div>
		</div>
	</section>

</div>

<script>
	var elem = document.getElementById("ifr_play_game");
	function openFullscreen(mode) {
		if (elem.requestFullscreen) {
			elem.requestFullscreen();
		} else if (elem.webkitRequestFullscreen) { /* Safari */
			elem.webkitRequestFullscreen();
		} else if (elem.msRequestFullscreen) { /* IE11 */
			elem.msRequestFullscreen();
		}
		screen.orientation.lock(mode+"-primary");
	}
</script>



@component('components.footer', ['gc_by_id' => $gc_by_id, 'arr_tags' => $arr_tags])

@endcomponent