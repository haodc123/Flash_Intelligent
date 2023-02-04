@component('components.header', ['gtitle' => ''])
@endcomponent
			
		<section id="banner" data-video="images/banner">
			<div class="inner">
				<header>
					<h3 class="pc">{{ trans('message.title.1') }} <strong id="b_t">/  {{ Config::get('constants.general.site_name_upper_1') }}  /</strong></h3>
					<h4 class="mobile">{{ trans('message.title.1') }}</h4>
					<h3 class="mobile"><strong id="b_t"> {{ Config::get('constants.general.site_name_upper_1') }}  </strong></h3>
				</header>
				<div class="illus">
					<ul>
					</ul>
				</div>
				
			</div>

		</section>
	
	<!-- Main -->
	<div id="main">

	<section id="g-by-cat-2" class="wrapper style2">
		<div class="inner">
			<div class="wrap_search">
				<form method="post" action="{{ route('search')}}">
					{{csrf_field()}}
					<ul>
						<li><input id="search_input" placeholder="{{ trans('message.search.placeholder') }}" type="text" name="search_data" /></li>
						<li><button type="submit" name="search_btn">{{ trans('message.search.button') }}</button></li>
					</ul>
				</form>
			</div>

			<header>
				<h3>{{ trans('message.home.header_aboveA') }}{{ Config::get('constants.general.step_year_old_A') }}</h3>
				<p>{{ trans('message.home.subheader_aboveA') }}{{ Config::get('constants.general.step_year_old_A') }}</p>
			</header>
			<!-- Tabbed Video Section -->
				<div class="flex flex-tabs">
					
					<div class="tabs">
						<!-- Tab 1 -->
							<div class="g-b-cat tab tab-1 flex flex-3 active">
						@if (sizeof($gbc_aA) > 0)
							@for ($i = 0; $i < sizeof($gbc_aA); $i++)
								<div class="video col">
									<div class="image fit">
										<img src="../images/thumb/{{ getPathThumb($gbc_aA[$i]->g_site, $gbc_aA[$i]->g_thumb) }}" onerror="this.onerror=null;this.src='../images/thumb/thumb_def.png';" alt="{{ showAlt($gt_by_id, $gbc_aA[$i]->g_cat_1, $gbc_aA[$i]->g_tag) }}" />
									</div>
									<p class="caption">
										<span class="title">{{ shortenStr($gbc_aA[$i]->g_title) }}</span>
									</p>
									<a href="game/{{ $gbc_aA[$i]->g_title_slug }}" class="link"><span>{{ $gbc_aA[$i]->g_title }}</span></a>
								</div>
							@endfor
							<a href="cat/{{ $gbc_aA[0]->g_cat_2 ? $gt_by_id[$gbc_aA[0]->g_cat_2][1] : $gt_by_id[$gbc_aA[0]->g_cat_1][1] }}" class="link-more">See more</a>
						@endif
							</div>

					@foreach ($gt_by_id as $key=>$gt_by_id_i)
						@if ($gt_by_id_i[2] == 22 || $gt_by_id_i[2] == 11)
							<div class="g-b-cat tab tab-{{ $key }} flex flex-3"></div>
						@endif
					@endforeach

					</div>

					<ul class="tab-list">
					@php //dump($gt_by_id) @endphp
					@foreach ($gt_by_id as $key=>$gt_by_id_i)
						@if ($gt_by_id_i[2] == 22 || $gt_by_id_i[2] == 11)
							<li class="home"><a href="#" data-id="{{ $key }}" data-tag-name="{{ $gt_by_id_i[0] }}" data-tab="tab-{{ $key }}">{{ $gt_by_id_i[0] }}</a></li>
						@endif
					@endforeach
						<li class="more"><a href="cat/">>>&nbsp; {{ trans('message.all_cat') }}</a></li>
					</ul>
				</div>
			</div>
		</section>

	<section id="g-by-cat-1" class="wrapper style2">
		<div class="inner">
			<header>
				<h3>{{ trans('message.home.header_underA') }}{{ Config::get('constants.general.step_year_old_A') }}</h3>
				<p>{{ trans('message.home.subheader_underA') }}{{ Config::get('constants.general.step_year_old_A') }}</p>
			</header>
			<!-- Tabbed Video Section -->
				<div class="flex flex-tabs">
					<ul class="tab-list">
					@foreach ($gt_by_id as $key=>$gt_by_id_i)
						@if ($gt_by_id_i[2] == 22 || $gt_by_id_i[2] == 11)
							<li class="home"><a href="#" data-id="{{ $key }}" data-tag-name="{{ $gt_by_id_i[0] }}" data-tab="tab-{{ $key }}">{{ $gt_by_id_i[0] }}</a></li>
						@endif
					@endforeach
						<li class="more"><a href="cat/">>>&nbsp; {{ trans('message.all_cat') }}</a></li>
					</ul>
					<div class="tabs">

						<!-- Tab 1 -->
							<div class="g-b-cat tab tab-1 flex flex-3 active">
						@if (sizeof($gbc_uA) > 0)
							@for ($i = 0; $i < sizeof($gbc_uA); $i++)
								<div class="video col">
									<div class="image fit">
										<img src="../images/thumb/{{ getPathThumb($gbc_uA[$i]->g_site, $gbc_uA[$i]->g_thumb) }}" onerror="this.onerror=null;this.src='../images/thumb/thumb_def.png';" alt="{{ showAlt($gt_by_id, $gbc_uA[$i]->g_cat_1, $gbc_uA[$i]->g_tag) }}" />
									</div>
									<p class="caption">
										<span class="title">{{ shortenStr($gbc_uA[$i]->g_title) }}</span>
									</p>
									<a href="game/{{ $gbc_uA[$i]->g_title_slug }}" class="link"><span>{{ $gbc_uA[$i]->g_title }}</span></a>
								</div>
							@endfor
							<a href="cat/{{ $gbc_uA[0]->g_cat_2 ? $gt_by_id[$gbc_uA[0]->g_cat_2][1] : $gt_by_id[$gbc_uA[0]->g_cat_1][1] }}" class="link-more">See more</a>
						@endif
							</div>

						@foreach ($gt_by_id as $key=>$gt_by_id_i)
							@if ($gt_by_id_i[2] == 22 || $gt_by_id_i[2] == 11)
								<div class="g-b-cat tab tab-{{ $key }} flex flex-3"></div>
							@endif
						@endforeach

					</div>
				</div>
			</div>
		</section>

		<section id="hot" class="wrapper ">
			<div class="inner">
				
				<header id="hot" class="align-center">
					<h3>{{ trans('message.home.header_hot') }}</h3>
					<p>{{ trans('message.home.subheader_hot') }}</p>
				</header>
				
				<div class="slideshow-container flex flex-3">
					
					<div class="g-b-cat tab tab-1 flex flex-3 active">
						@for ($i = 8; $i < sizeof($g_hot); $i++)
							@component('components.box', [
									'gt_by_id' => $gt_by_id, 
									'gi' => $g_hot[$i],
									'role' => 0
								])
							@endcomponent
						@endfor
					</div>

				</div>
				
			</div>
			<div class="clear"></div>
		</section>

		<!-- <section id="cloud-cat" class="wrapper">
		<div class="cloud-cat inner">
				<ul class="tab-list">
				@foreach ($gt_by_id as $gt_by_id_i)
					@if ($gt_by_id_i[2] == 1 || $gt_by_id_i[2] == 11)
						<li><a href="../cat/{{ $gt_by_id_i[1] }}" data-tab="tab-1">{{ $gt_by_id_i[0] }}</a></li>
					@endif
				@endforeach
				</ul>
		</div>
		</section> -->

		<section id="new" class="wrapper ">
			<div class="inner">
				<header class="align-center">
					<h3>{{ trans('message.home.header_new') }}</h3>
					<p>{{ trans('message.home.subheader_new') }}</p>
				</header>

				<div class="slideshow-container flex flex-3">
					<div class="g-b-cat tab tab-1 flex flex-3 active">
					@for ($i = 0; $i < sizeof($g_new); $i++)
							@component('components.box', [
									'gt_by_id' => $gt_by_id, 
									'gi' => $g_new[$i],
									'role' => 0
								])
							@endcomponent
					@endfor
					</div>
				</div>

			</div>
			<div class="clear"></div>
		</section>

				

			</div>

<!-- <script type="text/javascript">
	(function() {

	var img = document.getElementByClassName('fit').firstChild;
	img.onload = function() {
		if(img.height > img.width) {
			img.height = '100%';
			img.width = 'auto';
		}
	};

	}());
</script> -->
<script>
	// Blink
	window.addEventListener("load", function() {
		var b = document.getElementById('b_t');
		var timesRun = 0;
		var interval = setInterval(function() {
			timesRun += 1;
			if(timesRun == 8){
				clearInterval(interval);
			}
			b.style.visibility = (b.style.visibility == 'hidden' ? 'visible' : 'hidden');
		}, 80);

	}, false);
  </script>

@component('components.footer', ['gt_by_id' => $gt_by_id])

@endcomponent