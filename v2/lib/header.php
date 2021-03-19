<?php
// フッターメニューを定義する。
$header_menu = [
    'jyouban.php' => '常磐支部',
    'matsuyama.php' => '松山支部',
    'kenren.php' => '高知県連盟行事',
    'kanto.php' => '関東の行事'
];

// 呼び出し元のファイル名を取得する。
$filename = basename(debug_backtrace()[0]["file"]);
?>

<header class="container-fluid bg-info">
    <div class="container text-center">
        <h1>土佐直伝英信流</h1>
    </div>
</header>

<nav class="navbar navbar-inverse navbar-square">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menuId">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">ホーム</a>
        </div>
        <div class="collapse navbar-collapse" id="menuId">
            <ul class="nav navbar-nav">
                <?php
                foreach ($header_menu as $key => $value) {
                    $active = '';
                    if ($key === $filename) {
                        $key .= '#';
                        $active = 'class="active"';
                    }
                    echo '<li ' . $active . '><a href="/' . $key . '">' . $value . '</a></li>';
                }
                ?>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">リンク
                        <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="http://www.iai-zenkoku.net/">全国居合道連盟</a></li>
                        <li><a href="http://shoshinaz.org/">正心流@アリゾナ</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<style>
    .navbar-square {
        border-radius: 0px;
    }
</style>
