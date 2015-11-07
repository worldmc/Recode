<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="description" content="Metro, a sleek, intuitive, and powerful framework for faster and easier web development for Windows Metro Style.">
    <meta name="keywords" content="HTML, CSS, JS, JavaScript, framework, metro, front-end, frontend, web development">
    <meta name="author" content="Sergey Pimenov and Metro UI CSS contributors">

    <link rel='shortcut icon' type='image/x-icon' href='<?php echo Config::get('URL')?>favicon.ico' />
    <title>Tiles examples :: Start Screen :: Metro UI CSS - The front-end framework for developing projects on the web in Windows Metro Style</title>

    <link href="<?php echo Config::get('URL')?>css/metro.css" rel="stylesheet">
    <link href="<?php echo Config::get('URL')?>css/metro-icons.css" rel="stylesheet">
    <!--<link href="../css/metro-responsive.css" rel="stylesheet">-->

    <script src="<?php echo Config::get('URL')?>js/jquery-2.1.3.min.js"></script>
    <script src="<?php echo Config::get('URL')?>js/metro.js"></script>
    <script src="//maps.googleapis.com/maps/api/js?sensor=false"></script>

    <style>
        .tile-area-controls {
            position: fixed;
            right: 40px;
            top: 40px;
        }

        .tile-group {
            left: 100px;
        }

        .tile, .tile-small, .tile-sqaure, .tile-wide, .tile-large, .tile-big, .tile-super {
            opacity: 0;
            -webkit-transform: scale(.8);
            transform: scale(.8);
        }

        #charmSettings .button {
            margin: 5px;
        }

        .schemeButtons {
            /*width: 300px;*/
        }

        @media screen and (max-width: 640px) {
            .tile-area {
                overflow-y: scroll;
            }
            .tile-area-controls {
                display: none;
            }
        }

        @media screen and (max-width: 320px) {
            .tile-area {
                overflow-y: scroll;
            }

            .tile-area-controls {
                display: none;
            }

        }
    </style>

    <script>
        (function($) {
            $.StartScreen = function(){
                var plugin = this;
                var width = (window.innerWidth > 0) ? window.innerWidth : screen.width;

                plugin.init = function(){
                    setTilesAreaSize();
                    if (width > 640) addMouseWheel();
                };

                var setTilesAreaSize = function(){
                    var groups = $(".tile-group");
                    var tileAreaWidth = 80;
                    $.each(groups, function(i, t){
                        if (width <= 640) {
                            tileAreaWidth = width;
                        } else {
                            tileAreaWidth += $(t).outerWidth() + 80;
                        }
                    });
                    $(".tile-area").css({
                        width: tileAreaWidth
                    });
                };

                var addMouseWheel = function (){
                    $("body").mousewheel(function(event, delta, deltaX, deltaY){
                        var page = $(document);
                        var scroll_value = delta * 50;
                        page.scrollLeft(page.scrollLeft() - scroll_value);
                        return false;
                    });
                };

                plugin.init();
            }
        })(jQuery);

        $(function(){
            $.StartScreen();

            var tiles = $(".tile, .tile-small, .tile-sqaure, .tile-wide, .tile-large, .tile-big, .tile-super");

            $.each(tiles, function(){
                var tile = $(this);
                setTimeout(function(){
                    tile.css({
                        opacity: 1,
                        "-webkit-transform": "scale(1)",
                        "transform": "scale(1)",
                        "-webkit-transition": ".3s",
                        "transition": ".3s"
                    });
                }, Math.floor(Math.random()*500));
            });

            $(".tile-group").animate({
                left: 0
            });
        });

        function showCharms(id){
            var  charm = $(id).data("charm");
            if (charm.element.data("opened") === true) {
                charm.close();
            } else {
                charm.open();
            }
        }

        function setSearchPlace(el){
            var a = $(el);
            var text = a.text();
            var toggle = a.parents('label').children('.dropdown-toggle');

            toggle.text(text);
        }



    </script>

</head>
<body style="overflow-y: hidden;">
    <div data-role="charm" id="charmSearch">
        <h1 class="text-light">Search</h1>
        <hr class="thin"/>
        <br />
        <div class="input-control text full-size">
            <label>
                <span class="dropdown-toggle drop-marker-light">Anywhere</span>
                <ul class="d-menu" data-role="dropdown">
                    <li><a onclick="setSearchPlace(this)">Anywhere</a></li>
                    <li><a onclick="setSearchPlace(this)">Options</a></li>
                    <li><a onclick="setSearchPlace(this)">Files</a></li>
                    <li><a onclick="setSearchPlace(this)">Internet</a></li>
                </ul>
            </label>
            <input type="text">
            <button class="button"><span class="mif-search"></span></button>
        </div>
    </div>

    <div data-role="charm" id="charmSettings" >
        <h1 class="text-light">Settings</h1>
        <hr class="thin"/>
        <br />
        <div class="schemeButtons">
        </div>
    </div>

    <div class="tile-area tile-area-scheme-dark fg-white" style="height: 100%; max-height: 100% !important;">
        <h1 class="tile-area-title">Start</h1>
        <div class="tile-area-controls">
            <button class="image-button icon-right bg-transparent fg-white bg-hover-dark no-border"><span class="sub-header no-margin text-light">$user Name</span> <span class="icon mif-user"></span></button>
            <button class="square-button bg-transparent fg-white bg-hover-dark no-border" onclick="showCharms('#charmSearch')"><span class="mif-search"></span></button>
            <button class="square-button bg-transparent fg-white bg-hover-dark no-border" onclick="showCharms('#charmSettings')"><span class="mif-cog"></span></button>
            <a href="<?php echo Config::get('URL')?>login/logout" class="square-button bg-transparent fg-white bg-hover-dark no-border"><span class="mif-switch"></span></a>
        </div>

        <div class="tile-group double">
            <span class="tile-group-title">General</span>

            <div class="tile-container">

                <a href="http://calendar.google.com" class="tile bg-indigo fg-white" data-role="tile">
                    <div class="tile-content iconic">
                        <span class="icon mif-calendar"></span>
                    </div>
                    <span class="tile-label">Calendar</span>
                </a>

                <div class="tile bg-darkBlue fg-white" data-role="tile" onclick="document.location.href='http://gmail.com'">
                    <div class="tile-content iconic">
                        <span class="icon mif-envelop"></span>
                    </div>
                    <span class="tile-label">Inbox</span>
                </div>

                <div class="tile-large bg-steel fg-white" data-role="tile" data-on-click="document.location.href='http://forecast.io'">
                    <div class="tile-content" id="weather_bg" style="background: top left no-repeat; background-size: cover">
                        <div class="padding10">
                            <h1 id="weather_icon" style="font-size: 6em;position: absolute; top: 10px; right: 10px;"></h1>
                            <h1 id="city_temp"></h1>
                            <h2 id="city_name" class="text-light"></h2>
                            <h4 id="city_weather"></h4>
                            <p id="city_weather_daily"></p>

                            <p class="no-margin text-shadow">Pressure: <span class="text-bold" id="pressure"></span> mm</p>
                            <p class="no-margin text-shadow">Ozone: <span class="text-bold" id="ozone"></span></p>
                            <p class="no-margin text-shadow">Wind bearing: <span class="text-bold" id="wind_bearing"></span></p>
                            <p class="no-margin text-shadow">Wind speed: <span class="text-bold" id="wind_speed">0</span> m/s</p>
                        </div>
                    </div>
                    <span class="tile-label">Weather</span>
                </div>
            </div>
        </div>

        <div class="tile-group double">
            <span class="tile-group-title">Images</span>
            <div class="tile-container">
                <div class="tile-wide" data-role="tile" data-effect="slideLeft">
                    <div class="tile-content">
                        <a href="http://google.com/search?q=bear" class="live-slide"><img src="<?php echo Config::get('URL')?>images/1.jpg" data-role="fitImage" data-format="fill"></a>
                        <a href="http://google.com/search?q=cat" class="live-slide"><img src="<?php echo Config::get('URL')?>images/2.jpg" data-role="fitImage" data-format="fill"></a>
                        <a href="http://google.com/search?q=dog" class="live-slide"><img src="<?php echo Config::get('URL')?>images/3.jpg" data-role="fitImage" data-format="fill"></a>
                        <a href="http://google.com/search?q=eagle" class="live-slide"><img src="<?php echo Config::get('URL')?>images/4.jpg" data-role="fitImage" data-format="fill"></a>
                        <a href="http://google.com/search?q=fox" class="live-slide"><img src="<?php echo Config::get('URL')?>images/5.jpg" data-role="fitImage" data-format="fill"></a>
                    </div>
                    <div class="tile-label">Gallery</div>
                </div>
                <div class="tile" data-role="tile" data-role="tile" data-effect="slideUpDown">
                    <div class="tile-content">
                        <div class="live-slide"><img src="<?php echo Config::get('URL')?>images/me.jpg" data-role="fitImage" data-format="fill"></div>
                        <div class="live-slide"><img src="<?php echo Config::get('URL')?>images/spface.jpg" data-role="fitImage" data-format="fill"></div>
                    </div>
                    <div class="tile-label">Photos</div>
                </div>
                <div class="tile-small bg-amber fg-white" data-role="tile">
                    <div class="tile-content iconic">
                        <span class="icon mif-video-camera"></span>
                    </div>
                </div>
                <div class="tile-small bg-green fg-white" data-role="tile">
                    <div class="tile-content iconic">
                        <span class="icon mif-gamepad"></span>
                    </div>
                </div>
                <div class="tile-small bg-pink fg-white" data-role="tile">
                    <div class="tile-content iconic">
                        <span class="icon mif-headphones"></span>
                    </div>
                </div>
                <div class="tile-small bg-yellow fg-white" data-role="tile">
                    <div class="tile-content iconic">
                        <span class="icon mif-lock"></span>
                    </div>
                </div>

                <div class="tile-wide bg-orange fg-white" data-role="tile">
                    <div class="tile-content image-set">
                        <img src="<?php echo Config::get('URL')?>images/jeki_chan.jpg">
                        <img src="<?php echo Config::get('URL')?>images/shvarcenegger.jpg">
                        <img src="<?php echo Config::get('URL')?>images/vin_d.jpg">
                        <img src="<?php echo Config::get('URL')?>images/jolie.jpg">
                        <img src="<?php echo Config::get('URL')?>images/jek_vorobey.jpg">
                    </div>
                </div>

            </div>
        </div>

        <div class="tile-group one">
            <span class="tile-group-title">Office</span>

            <div class="tile-small bg-blue" data-role="tile">
                <div class="tile-content iconic">
                    <img src="<?php echo Config::get('URL')?>images/outlook.png" class="icon">
                </div>
            </div>
            <div class="tile-small bg-darkBlue" data-role="tile">
                <div class="tile-content iconic">
                    <img src="<?php echo Config::get('URL')?>images/word.png" class="icon">
                </div>
            </div>
            <div class="tile-small bg-green" data-role="tile">
                <div class="tile-content iconic">
                    <img src="<?php echo Config::get('URL')?>images/excel.png" class="icon">
                </div>
            </div>
            <div class="tile-small bg-red" data-role="tile">
                <div class="tile-content iconic">
                    <img src="<?php echo Config::get('URL')?>images/access.png" class="icon">
                </div>
            </div>
            <div class="tile-small bg-orange" data-role="tile">
                <div class="tile-content iconic">
                    <img src="<?php echo Config::get('URL')?>images/powerpoint.png" class="icon">
                </div>
            </div>
        </div>

        <div class="tile-group double">
            <span class="tile-group-title">Games</span>
            <div class="tile-container">
                <div class="tile" data-role="tile">
                    <div class="tile-content">
                        <img src="<?php echo Config::get('URL')?>images/grid2.jpg" data-role="fitImage" data-format="square">
                    </div>
                </div>
                <div class="tile-small" data-role="tile">
                    <div class="tile-content">
                        <img src="<?php echo Config::get('URL')?>images/Battlefield_4_Icon.png" data-role="fitImage" data-format="square">
                    </div>
                </div>
                <div class="tile-small" data-role="tile">
                    <div class="tile-content">
                        <img src="<?php echo Config::get('URL')?>images/Crysis-2-icon.png" data-role="fitImage" data-format="square" data-frame-color="bg-steel">
                    </div>
                </div>
                <div class="tile-small" data-role="tile">
                    <div class="tile-content">
                        <img src="<?php echo Config::get('URL')?>images/WorldofTanks.png" data-role="fitImage" data-format="square" data-frame-color="bg-dark">
                    </div>
                </div>
                <div class="tile-small" data-role="tile">
                    <div class="tile-content">
                        <img src="<?php echo Config::get('URL')?>images/halo.jpg" data-role="fitImage" data-format="square">
                    </div>
                </div>
                <div class="tile-wide bg-green fg-white" data-role="tile">
                    <div class="tile-content iconic">
                        <img src="<?php echo Config::get('URL')?>images/x-box.png" class="icon">
                    </div>
                    <div class="tile-label">X-Box Live</div>
                </div>
            </div>
        </div>

        <div class="tile-group double">
            <span class="tile-group-title">Other</span>
            <div class="tile-container">
                <div class="tile bg-teal fg-white" data-role="tile">
                    <div class="tile-content iconic">
                        <span class="icon mif-pencil"></span>
                    </div>
                    <span class="tile-label">Editor</span>
                </div>
                <div class="tile bg-darkGreen fg-white" data-role="tile">
                    <div class="tile-content iconic">
                        <span class="icon mif-shopping-basket"></span>
                    </div>
                    <span class="tile-label">Store</span>
                </div>
                <div class="tile bg-cyan fg-white" data-role="tile">
                    <div class="tile-content iconic">
                        <span class="icon mif-skype"></span>
                    </div>
                    <div class="tile-label">Skype</div>
                </div>
                <div class="tile bg-darkBlue fg-white" data-role="tile">
                    <div class="tile-content iconic">
                        <span class="icon mif-cloud"></span>
                    </div>
                    <span class="tile-label">OneDrive</span>
                </div>
            </div>
        </div>
    </div>

</body>
</html>