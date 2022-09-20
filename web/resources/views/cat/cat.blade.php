@component('components.header', ['gtitle' => $gc_by_id[$id][0]])
@endcomponent
			


			<section id="g-by-cat-1" class="wrapper style2">
					<div class="inner">
						<header class="cat">
							<h3 class="pc">GAME {{ $gc_by_id[$id][0] }} {{ trans('message.cat.title.2') }} <strong>/  {{ Config::get('constants.general.site_name_upper_1') }}  /</strong></h3>
							<h4 class="mobile">GAME {{ $gc_by_id[$id][0] }} {{ trans('message.cat.title.2') }} </h4>
								<h3 class="mobile"><strong>/  {{ Config::get('constants.general.site_name_upper_1') }}  /</strong></h3>
						</header>
							<div class="flex flex-tabs">
								
								<div class="tabs">
										<div class="g-b-cat tab tab-1 flex flex-3 active">
										@for ($i = 0; $i < 8; $i++)
											@if (isset($g[$i]))
												@component('components.box', [
														'gc_by_id' => $gc_by_id, 
														'gi' => $g[$i],
														'role' => $role,
														'cat' => 1
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
										@for ($i = 8; $i < sizeof($g); $i++)
											@component('components.box', [
													'gc_by_id' => $gc_by_id, 
													'gi' => $g[$i],
													'role' => $role,
													'cat' => 1
												])
											@endcomponent
										@endfor
										</div>
								</div>
								<ul class="tab-list">
									<li class="cat"><a href="#" data-id="{{ $id }}" data-tab="tab-1" class="active">{{ $gc_by_id[$id][0] }}</a></li>
									@foreach ($gc_by_id as $gc_by_id_i)
										@if ($gc_by_id_i[1] != $slug && ($gc_by_id_i[2] == 11 || $gc_by_id_i[2] == 22))
											<li class="cat"><a href="../cat/{{ $gc_by_id_i[1] }}" data-tab="tab-1">{{ $gc_by_id_i[0] }}</a></li>
										@endif
									@endforeach
								</ul>
							</div>
					</div>
				</section>

			</div>

		


@component('components.footer', ['gc_by_id' => $gc_by_id, 'arr_tags' => $arr_tags])

@endcomponent