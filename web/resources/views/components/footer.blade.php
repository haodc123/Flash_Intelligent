<!-- Footer -->

        <section id="cloud-cat" class="wrapper">
					<div class="cloud-cat inner">
						<ul class="tab-list">
						@foreach ($gc_by_id as $gc_by_id_i)
							@if ($gc_by_id_i[2] == 2 || $gc_by_id_i[2] == 22)
								<li><a href="../cat/{{ $gc_by_id_i[1] }}" data-tab="tab-1">{{ $gc_by_id_i[0] }}</a></li>
							@endif
						@endforeach
						</ul>
					</div>
                    <span class="kw">{{ trans('message.kw.common') }}</span>
					<div class="cloud-tags inner">
						<ul class="tab-list">
                        @foreach ($arr_tags as $tags)
							<li><a href="../tags/{{ $tags->g_cat_t_slug }}" data-tab="tab-1">{{ $tags->g_cat_t_name }}</a></li>
						@endforeach
						</ul>
					</div>
				</section>
            <footer id="footer">
            
                <div class="copyright">
                    <ul class="icons">
                        <li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
                        <li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
                        <li><a href="#" class="icon fa-snapchat"><span class="label">Snapchat</span></a></li>
                    </ul>
                    &copy; &nbsp; <a href="https://templated.co">{{ Config::get('constants.general.site_name_upper_2') }}</a>&nbsp; 2022
                </div>
            </footer>

        <!-- Scripts -->
            <script src="../js/jquery.min.js"></script>
            <script src="../js/jquery.scrolly.min.js"></script>
            <script src="../js/skel.min.js"></script>
            <script src="../js/util.js"></script>
            <script src="../js/main.js"></script>
            
    </body>
</html>