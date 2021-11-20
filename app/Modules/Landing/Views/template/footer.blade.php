<!-- Footer Section Start -->
<div id="footer">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="social">
                    <a href="">
                        <li class="fa fa-instagram"></li>
                    </a>
                    <a href="">
                        <li class="fa fa-twitter"></li>
                    </a>
                    <a href="">
                        <li class="fa fa-facebook-f"></li>
                    </a>
                </div>
            </div>
            <div class="col-12 bottom-menu">
                <ul>
                    @foreach ($menu as $nav)
                        <li>
                            <a
                                href="{{ strpos($nav['url'], '#') !== false ? (isset($menu_link) ? base_url('/') : '') : '' }}{{ $nav['url'] }}">
                                {{ $nav['title'] }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="col-12">
                <p>Copyright &#169; <a href="https://erdevapp.com" target="_blank">ErdevApp</a> All Rights Reserved.</p>
            </div>
        </div>
    </div>
</div>
<!-- Footer Section End -->
