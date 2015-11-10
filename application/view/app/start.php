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
        <ul style="min-width: 100%; list-style: outside none none; padding-left: 20px; padding-right: 10px;">
            <li>
                <button class="image-button">
                    Delete Application
                    <span class="icon mif-bin"></span>
                </button>
            </li>
            <li>
                <button class="image-button">
                    Enable Application
                    <span class="icon mif-power"></span>
                </button>
            </li>
            <li>
                <button class="image-button">
                    Disable Application
                    <span class="icon mif-switch"></span>
                </button>
            </li>
            <li>
                <button class="image-button">
                    Add Application
                    <span class="icon mif-plus"></span>
                </button>
            </li>
            <li>
                <button class="image-button">
                    Edit Application
                    <span class="icon mif-tools"></span>
                </button>
            </li>
        </ul>

    </div>

    <div class="tile-area tile-area-scheme-dark fg-white" style="height: 100%; max-height: 100% !important;">
        <h1 class="tile-area-title">Start</h1>
        <div class="tile-area-controls">
            <a href="<?php echo Config::get('URL')?>profile/showprofile/<?php echo Session::get('user_id')?>" class="image-button icon-right bg-transparent fg-white bg-hover-dark no-border"><span class="sub-header no-margin text-light"><?php echo Session::get('user_name')?></span> <span class="icon mif-user"></span></a>
            <button class="square-button bg-transparent fg-white bg-hover-dark no-border" onclick="showCharms('#charmSearch')"><span class="mif-search"></span></button>
            <button class="square-button bg-transparent fg-white bg-hover-dark no-border" onclick="showCharms('#charmSettings')"><span class="mif-cog"></span></button>
            <a href="<?php echo Config::get('URL')?>login/logout" class="square-button bg-transparent fg-white bg-hover-dark no-border"><span class="mif-exit"></span></a>
        </div>

        <div class="tile-group double">
            <span class="tile-group-title">General</span>

            <div class="tile-container">
                <?php
                    $apps = $this->apps;
                foreach ($apps as $key => $value) {?>

                <a href="<?php echo $value['base_url']?>" class="<?php echo $value['size']?> bg-<?php echo $value['colour_bg']?> fg-<?php echo $value['colour_fg']?>" data-role="tile">
                    <div class="tile-content iconic">
                        <span class="icon mif-<?php echo $value['icon']?>"></span>
                    </div>
                    <span class="tile-label"><?php echo $value['name']?></span>
                </a>
                <?php

                }
                ?>
            </div>
        </div>
    </div>

</body>
</html>