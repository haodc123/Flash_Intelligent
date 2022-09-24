<div class="video col">
	<div class="image fit">
		<img src="../images/thumb/{{ getPathThumb($gi->g_site, $gi->g_thumb) }}" onerror="this.onerror=null;this.src='../images/thumb/thumb_def.png';" alt="Game online {{ $gi->g_cat_2 ? $gc_by_id[$gi->g_cat_2][0] : $gc_by_id[$gi->g_cat_1][0] }}" />
	</div>
	@if ($gi->g_vote_time > 0 || $gi->g_play_time > 0)
		{!! showVoteStar2($gi->g_vote, $gi->g_vote_time, $gi->g_play_time) !!}
	@endif
	<p class="caption">
		<span class="title">{{ shortenStr($gi->g_title) }}</span>
	
	@if (!isset($cat))
		<span class="small"><br />⯈ {!! showCat($gi->g_cat_1, $gi->g_cat_t) !!}</span>
	@endif
	</p>
	
	@if ($role == 1)
	<a style="height: 30%" href="../game/{{ $gi->g_title_slug }}" class="link"><span>{{ $gi->g_title }}</span></a>
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
			<li><input type="hidden" value="{{ $gi->g_title_slug }}" name="m_slug" /></li>
			<li><button type="submit" name="m_btn">Submit</button></li>
		</ul>
		<div class="clear"></div>
	</form>
	@else
	<a href="../game/{{ $gi->g_title_slug }}" class="link"><span>{{ $gi->g_title }}</span></a>
	@endif
</div>
