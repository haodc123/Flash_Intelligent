@component('components.header')
@endcomponent
			
			<section id="g-by-cat-1" class="wrapper style2">
					<div class="inner">
						<header class="cat">
							<h3 class="pc">{{ trans('message.title.1') }} <strong>/  {{ Config::get('constants.general.site_name_upper_1') }}  /</strong></h3>
							<h4 class="mobile">{{ trans('message.title.1') }}</h4>
							<h3 class="mobile"><strong>/  {{ Config::get('constants.general.site_name_upper_1') }}  /</strong></h3>
						</header>
							<div class="flex flex-tabs">
								
								<div class="tabs">
										<div class="g-b-cat tab tab-1 flex flex-3 active">
										@for ($i = 0; $i < 8; $i++)
											@if (isset($g_randomcat[$i]))
												@component('components.box', [
														'gt_by_id' => $gt_by_id, 
														'gi' => $g_randomcat[$i],
														'role' => 0
													])
												@endcomponent
											@endif
										@endfor
										</div>
								</div>
							</div>
					</div>
				</section>


			<!-- Main -->
			<div id="main">

				<section id="g-by-cat-2" class="wrapper style2">
					<div class="inner">
							<div class="flex flex-tabs">
								
								<div class="tabs">
										<div class="g-b-cat tab tab-1 flex flex-3 active">
										@for ($i = 8; $i < sizeof($g_randomcat); $i++)
											@component('components.box', [
													'gt_by_id' => $gt_by_id, 
													'gi' => $g_randomcat[$i],
													'role' => 0
												])
											@endcomponent
										@endfor
										</div>
								</div>
								<ul class="tab-list">
									@foreach ($gt_by_id as $gt_by_id_i)
										<li class="tags"><a href="../cat/{{ $gt_by_id_i[1] }}" data-tab="tab-1">{{ $gt_by_id_i[0] }}</a></li>
										
									@endforeach
								</ul>
							</div>
					</div>
				</section>

			</div>

		


@component('components.footer', ['gt_by_id' => $gt_by_id, 'arr_tags' => $arr_tags])

@endcomponent