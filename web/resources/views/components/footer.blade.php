<!-- Footer -->

        <section id="cloud-cat" class="wrapper">
            <div class="cloud-cat inner">
                <ul class="tab-list">
                <li><a href="../cat/Puzzle" data-tab="tab-1">Puzzle</a></li>
                <li><a href="../cat/Board-game" data-tab="tab-1">Board game</a></li>
                @foreach ($gt_by_id as $gt_by_id_i)
                    @if ($gt_by_id_i[2] == 11 || $gt_by_id_i[2] == 22)
                        <li><a href="../tag/{{ $gt_by_id_i[1] }}" data-tab="tab-1">{{ $gt_by_id_i[0] }}</a></li>
                    @endif
                @endforeach
                </ul>
            </div>
            <span class="kw">{{ trans('message.kw.common') }}</span>
            <div class="cloud-tags inner">
                <!-- TODO: hard code popular tag -->
            </div>
        </section>

        <footer id="footer">
            <div class="copyright">
                <ul class="icons">
                    <li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
                    <li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
                    <li><a href="#" class="icon fa-snapchat"><span class="label">Snapchat</span></a></li>
                </ul>
                &copy; &nbsp; <a href="http://flashintelligent.com/">@ {{ Config::get('constants.general.site_name_upper_2') }} 2022</a>&nbsp; <br />
                <span>We deveop game platform support rising up intelligent and skill for kids.</span>
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