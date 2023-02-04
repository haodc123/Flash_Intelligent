<!DOCTYPE HTML>
<!--
    Broadcast by TEMPLATED
    templated.co @templatedco
    Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
    <head>
        <title>{{ $gtitle }} {{ Config::get('constants.general.site_name_upper_1') }} - {{ trans('message.site_title.2') }}</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="stylesheet" href="../css/main.css" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />
		
		<!-- Google tag (gtagname.js) -->
		<script async src="https://www.googletagmanager.com/gtagname/js?id=G-KK6BKBHN2Z"></script>
		<script>
		  window.dataLayer = window.dataLayer || [];
		  function gtagname(){dataLayer.push(arguments);}
		  gtagname('js', new Date());

		  gtagname('config', 'G-KK6BKBHN2Z');
		</script>
		

    </head>
    <body>

    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v14.0&appId=480589170205728&autoLogAppEvents=1" nonce="TuvhdNWF"></script>

        <!-- Header -->
            <header id="header">
                <ul>
                    <li><a href="/">{{ Config::get('constants.general.site_name_upper_2') }}</a>&nbsp; /</li>
                </ul>
                <a href="#menu">Menu</a>
            </header>

        <!-- Nav -->
            <nav id="menu">
                <ul class="links">
                    <li><a href="/">{{ trans('message.menu.home') }}</a></li>
                    <li><a href="/cat/">{{ trans('message.menu.cats') }}</a></li>

                    <li>
                        <a href="{{ Config::get('constants.link.schema') }}{{ Config::get('constants.link.site_no_lang') }}">EN /</a>
                        <a href="{{ Config::get('constants.link.schema') }}vi.{{ Config::get('constants.link.site_no_lang') }}">VI</a>
                    </li>
                    <li>
                        @if (Auth::check())
                    <li>
                            <a class="nav_corner2" href="#">{{ trans('message.login.hello') }} {{ auth()->user()->user_name }}</a>
                    </li>
                    <li class="nav-item dropdown nav_corner3">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            {{ Auth::user()->name }} <span class="caret"></span>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </div>
                    </li>
                        @else
                                        <a style="color: lightyellow;" href="{!! route('login') !!}">Login</a>
                        @endif
                    </li>
                </ul>
            </nav>