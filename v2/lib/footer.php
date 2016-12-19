<?php
// フッターメニューを定義する。
$footer_menu = [
    'use.php' => 'サイト利用条件',
    'privacy.php' => '個人情報の取り扱いについて'
];

// 呼び出し元のファイル名を取得する。
$filename = basename(debug_backtrace()[0]["file"]);
?>

<footer class="container-fluid bg-info text-center">
    <div class="container">
        <ul class="nav nav-pills nav-justified nav-padding">
            <?php
            foreach ($footer_menu as $key => $value) {
                $active = '';
                if ($key === $filename) {
                    $key .= '#';
                    $active = 'class="active"';
                }
                echo '<li role="presentation" ' . $active . '><a href="/' . $key . '">' . $value . '</a></li>';
            }
            ?>
        </ul>
        <p>土佐直伝英信流 @ 全国居合道連盟・高知県連盟・常磐支部</p>
    </div>
</footer>