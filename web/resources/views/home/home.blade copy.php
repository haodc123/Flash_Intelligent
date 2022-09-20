@component('components.header', ['gtitle' => ''])
@endcomponent
    
			
				<section id="banner" data-video="images/banner">
					<div class="inner">
						<header>
							<h3 class="pc">{{ trans('message.title.1') }} <strong id="b_t">/  {{ Config::get('constants.general.site_name_upper_1') }}  /</strong></h3>
							<h4 class="mobile">{{ trans('message.title.1') }}</h4>
							<h3 class="mobile"><strong id="b_t">/ {{ Config::get('constants.general.site_name_upper_1') }}  /</strong></h3>
						</header>

						<div class="flex flex-3 slideshow-container">
						@php
							$g_special_num = sizeof($g_hot) < 8 ? sizeof($g_hot) : 8
						@endphp
						@for ($i = 0; $i < $g_special_num; $i++)
							@if ($i%4 == 0)
							<div class="mySlides fade">
								<div class="video col">
									<div class="image fit">
										<img src="../images/thumb/{{ getPathThumb($g_hot[$i]->g_site, $g_hot[$i]->g_thumb) }}" onerror="this.onerror=null;this.src='../images/thumb/thumb_def.png';" alt="Game online {{ $gc_by_id[$g_hot[$i]->g_cat_1][0] }}" />
									</div>
									<p class="caption">
										<span class="title">{{ $g_hot[$i]->g_title }} </span>
										<span class="small"><br />By: {{ $g_hot[$i]->g_author }}</span>
										<span class="small"><br />⯈ <a href="cat/{{ $gc_by_id[$g_hot[$i]->g_cat_1][1] }}">{{ $gc_by_id[$g_hot[$i]->g_cat_1][0] }}</a></span>
									</p>
									<a href="game/{{ $g_hot[$i]->g_title_slug }}" class="link"><span>{{ $g_hot[$i]->g_title }}</span></a>
								</div>
							@elseif (($i+1)%4 == 0)
								<div class="video col">
									<div class="image fit">
										<img src="../images/thumb/{{ getPathThumb($g_hot[$i]->g_site, $g_hot[$i]->g_thumb) }}" onerror="this.onerror=null;this.src='../images/thumb/thumb_def.png';" alt="Game online {{ $gc_by_id[$g_hot[$i]->g_cat_1][0] }}" />
									</div>
									<p class="caption">
										<span class="title">{{ $g_hot[$i]->g_title }} </span>
										<span class="small"><br />By: {{ $g_hot[$i]->g_author }}</span>
										<span class="small"><br />⯈ <a href="cat/{{ $gc_by_id[$g_hot[$i]->g_cat_1][1] }}">{{ $gc_by_id[$g_hot[$i]->g_cat_1][0] }}</a></span>
									</p>
									<a href="game/{{ $g_hot[$i]->g_title_slug }}" class="link"><span>{{ $g_hot[$i]->g_title }}</span></a>
								</div>
							</div>
							@else
								<div class="video col">
									<div class="image fit">
										<img src="../images/thumb/{{ getPathThumb($g_hot[$i]->g_site, $g_hot[$i]->g_thumb) }}" onerror="this.onerror=null;this.src='../images/thumb/thumb_def.png';" alt="Game online {{ $gc_by_id[$g_hot[$i]->g_cat_1][0] }}" />
									</div>
									<p class="caption">
										<span class="title">{{ $g_hot[$i]->g_title }}</span>
										<span class="small"><br />By: {{ $g_hot[$i]->g_author }}</span>
										<span class="small"><br />⯈ <a href="cat/{{ $gc_by_id[$g_hot[$i]->g_cat_1][1] }}">{{ $gc_by_id[$g_hot[$i]->g_cat_1][0] }}</a></span>
									</p>
									<a href="game/{{ $g_hot[$i]->g_title_slug }}" class="link"><span>{{ $g_hot[$i]->g_title }}</span></a>
								</div>
							@endif
						@endfor
							<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
  							<a class="next" onclick="plusSlides(1)">&#10095;</a>
						</div>
					</div>

				</section>
			
			<!-- Main -->
			<div id="main">
					<section id="hot" class="wrapper ">
					<div class="inner">
						<div class="wrap_search">
							<form method="post" action="{{ route('search')}}">
								{{csrf_field()}}
								<ul>
									<li><input placeholder="{{ trans('message.search.placeholder') }}" type="text" name="search_data" /></li>
									<li><button type="submit" name="search_btn">{{ trans('message.search.button') }}</button></li>
								</ul>
							</form>
						</div>
						<header id="hot" class="align-center">
							<h3>{{ trans('message.home.header_hot') }}</h3>
							<p>{{ trans('message.home.subheader_hot') }}</p>
						</header>
						
						<div class="slideshow-container flex flex-3">
							<div class="mySlides3 fade">
							@for ($i = 8; $i < sizeof($g_hot); $i++)
								<div class="mySlides2 flex flex-3">
									@component('components.box', [
											'gc_by_id' => $gc_by_id, 
											'gi' => $g_hot[$i],
											'role' => 0
										])
									@endcomponent
								</div>
							@endfor
							</div>
						</div>
						
					</div>
					<div class="clear"></div>
				</section>

				<section id="cloud-cat" class="wrapper">
				<div class="cloud-cat inner">
						<ul class="tab-list">
						@foreach ($gc_by_id as $gc_by_id_i)
							@if ($gc_by_id_i[2] == 1 || $gc_by_id_i[2] == 11)
								<li><a href="../cat/{{ $gc_by_id_i[1] }}" data-tab="tab-1">{{ $gc_by_id_i[0] }}</a></li>
							@endif
						@endforeach
						</ul>
				</div>
				</section>

				<section id="new" class="wrapper ">
					<div class="inner">
						<header class="align-center">
							<h3>{{ trans('message.home.header_new') }}</h3>
							<p>{{ trans('message.home.subheader_new') }}</p>
						</header>

						<div class="flex flex-3 slideshow-container">
							<div class="mySlides3 fade">
							@for ($i = 0; $i < sizeof($g_new); $i++)
								<div class="mySlides2 flex flex-3">
									@component('components.box', [
											'gc_by_id' => $gc_by_id, 
											'gi' => $g_new[$i],
											'role' => 0
										])
									@endcomponent
								</div>
							@endfor
							</div>
							
						</div>
					</div>
					<div class="clear"></div>
				</section>

				<section id="g-by-cat-1" class="wrapper style2">
					<div class="inner">
						<header>
							<h3>{{ trans('message.home.header_under4') }}</h3>
							<p>{{ trans('message.home.subheader_under4') }}</p>
						</header>
						<!-- Tabbed Video Section -->
							<div class="flex flex-tabs">
								<ul class="tab-list">
								@foreach ($gc_by_id as $key=>$gc_by_id_i)
									@if ($gc_by_id_i[2] == 11)
										<li class="home"><a href="#" data-id="{{ $key }}" data-tab="tab-{{ $key }}">{{ $gc_by_id_i[0] }}</a></li>
									@endif
								@endforeach
									<li class="more"><a href="cat/">>>&nbsp; {{ trans('message.all_cat') }}</a></li>
								</ul>
								<div class="tabs">

									<!-- Tab 1 -->
										<div class="g-b-cat tab tab-1 flex flex-3 active">
									@if (sizeof($gbc_1) > 0)
										@for ($i = 0; $i < sizeof($gbc_1); $i++)
											<div class="video col">
												<div class="image fit">
													<img src="../images/thumb/{{ getPathThumb($gbc_1[$i]->g_site, $gbc_1[$i]->g_thumb) }}" onerror="this.onerror=null;this.src='../images/thumb/thumb_def.png';" alt="Game online {{ $gc_by_id[$gbc_1[$i]->g_cat_1][0] }}" />
												</div>
												<p class="caption">
													<span class="title">{{ $gbc_1[$i]->g_title }}</span>
												</p>
												<a href="game/{{ $gbc_1[$i]->g_title_slug }}" class="link"><span>{{ $gbc_1[$i]->g_title }}</span></a>
											</div>
										@endfor
										<a href="cat/{{ $gc_by_id[$gbc_1[0]->g_cat_1][1] }}" class="link-more">See more</a>
									@endif
										</div>

									@foreach ($gc_by_id as $key=>$gc_by_id_i)
										@if ($gc_by_id_i[2] == 11)
											<div class="g-b-cat tab tab-{{ $key }} flex flex-3"></div>
										@endif
									@endforeach

								</div>
							</div>
					</div>
				</section>


				<section id="g-by-cat-2" class="wrapper style2">
					<div class="inner">
						<header>
							<h3>{{ trans('message.home.header_above4') }}</h3>
							<p>{{ trans('message.home.subheader_above4') }}</p>
						</header>
						<!-- Tabbed Video Section -->
							<div class="flex flex-tabs">
								
								<div class="tabs">
									<!-- Tab 1 -->
										<div class="g-b-cat tab tab-1 flex flex-3 active">
									@if (sizeof($gbc_2) > 0)
										@for ($i = 0; $i < sizeof($gbc_2); $i++)
											<div class="video col">
												<div class="image fit">
													<img src="../images/thumb/{{ getPathThumb($gbc_2[$i]->g_site, $gbc_2[$i]->g_thumb) }}" onerror="this.onerror=null;this.src='../images/thumb/thumb_def.png';" alt="Game online {{ $gc_by_id[$gbc_2[$i]->g_cat_1][0] }}" />
												</div>
												<p class="caption">
													<span class="title">{{ $gbc_2[$i]->g_title }}</span>
												</p>
												<a href="game/{{ $gbc_2[$i]->g_title_slug }}" class="link"><span>{{ $gbc_2[$i]->g_title }}</span></a>
											</div>
										@endfor
										<a href="cat/{{ $gc_by_id[$gbc_2[0]->g_cat_1][1] }}" class="link-more">See more</a>
									@endif
										</div>

								@foreach ($gc_by_id as $key=>$gc_by_id_i)
									@if ($gc_by_id_i[2] == 22)
										<div class="g-b-cat tab tab-{{ $key }} flex flex-3"></div>
									@endif
								@endforeach

								</div>

								<ul class="tab-list">
								@foreach ($gc_by_id as $key=>$gc_by_id_i)
									@if ($gc_by_id_i[2] == 22)
										<li class="home"><a href="#" data-id="{{ $key }}" data-tab="tab-{{ $key }}">{{ $gc_by_id_i[0] }}</a></li>
									@endif
								@endforeach
									<li class="more"><a href="cat/">>>&nbsp; {{ trans('message.all_cat') }}</a></li>
								</ul>
							</div>
					</div>
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

@component('components.footer', ['gc_by_id' => $gc_by_id, 'arr_tags' => $arr_tags])

@endcomponent