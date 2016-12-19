<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="keywords" content="予定,居合,土佐直伝英信流,関東">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"
          integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" href="/mybootstrap.css">
    <script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"
            integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS"
            crossorigin="anonymous"></script>
</head>

<body>
<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/lib/header.php'); ?>

<div class="container">
    <div class="jumbotron">
        <h1 class="text-center">居合道・稽古へのお誘い　
            <small>常磐支部</small>
        </h1>
        <div class="row">
            <div class="col-lg-4">
                <?php
                $images = ['master-yamasaki2.jpg', 'master-yamasaki3.jpg'];
                $image = $images[mt_rand(0, count($images) - 1)];
                ?>
                <img src="/image/<?= $image ?>" class="img-responsive img-rounded">
            </div>
            <div class="col-lg-8 padding-10">
                <ul>
                    <li class="lead">第二十代 竹嶋壽雄先生から道統を継承された、第二十一代 村永秀邦御宗家（高知市在住）門下の道場です。</li>
                    <li class="lead">全国居合道高知県連盟に所属し、土佐藩のお留流（門外不出）居合であった 「土佐の英信流」を稽古しております。</li>
                    <li class="lead">原則16歳以上を募集しております。初心者や中高年の方の参加も歓迎いたします。</li>
                    <li class="lead">昇段審査は、初段から5段までは高知県連盟本部（高知県）で受審。6段以上は全国居合道連盟全国大会（京都で開催）時に受審。</li>
                    <li class="lead">入会金 1,000円、月会費 3,500円</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6 text-center">
            <h3>主な稽古場<br>
                <small>見学歓迎です。ご自由にお出でください。不明な場合は、鈴木一平迄ご連絡ください。</small>
            </h3>
            <div class="list-group">
                <?php
                $locations = [
                    '東京武道館第二武道場 (東京都足立区綾瀬3-20-1)' => 'http://www.tef.or.jp/tb/access.jsp',
                    '柏市沼南体育館剣道場 (千葉県柏市藤ケ谷1908-1)' => 'http://www.kashiwasports.jp/facility/1720/'
                ];
                foreach ($locations as $key => $value) {
                    ?>
                    <a class="list-group-item" href="<?= $value ?>"><span
                            class="glyphicon glyphicon-link" aria-hidden="true"></span> <?= $key ?></a>
                    <?php
                }
                ?>
            </div>
            <p><span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span> 変更になる場合がございます、下表で確認ください。</p>
            <br>
        </div>

        <div class="col-lg-6 text-center">
            <h3>入門時に揃えていただく物<br>
                <small>体格によってサイズが変わりますのでご相談ください。</small>
            </h3>
            <table class="w225">
                <?php
                $items = [
                    '居合用稽古着' => '6,000円位～',
                    '稽古袴' => '7,000円位～',
                    '和装の角帯' => '3,000円位～',
                    '刀(模擬刀)' => '30,000円位～',
                    '刀ケース' => '3,000円位～'
                ];
                foreach ($items as $key => $value) {
                    ?>
                    <tr>
                        <td class="text-left"><?= $key ?></td>
                        <td class="text-right"><?= $value ?></td>
                    </tr>
                    <?php
                }
                ?>
            </table>
            <br>

            <h3>連絡先</h3>
            <address>
                <?php
                $address = [
                    '連盟' => '全国居合道高知県連盟',
                    '支部' => '常磐支部',
                    '名前' => '鈴木 一平',
                    'eメール' => 'ippei0605@gmail.com'
                ];
                $icon_envelope = '<span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>';
                ?>
                <p><?= $address['連盟'] ?><br><?= $address['支部'] ?></p>
                <p class="lead"><?= $address['名前'] ?></p>
                <p><a href="mailto:<?= $address['eメール'] ?>"><?= $icon_envelope ?></a><?= $address['eメール'] ?>
                </p>
            </address>
        </div>
    </div>

    <?php
    if (isset($_GET['date'])) {
        $date = $_GET['date'];
    } else {
        $date = date("Y-m-01", time());
    }
    $previousDate = date('Y-m-d', strtotime($date . ' -3 month'));
    $nextDate = date('Y-m-d', strtotime($date . ' +3 month'));
    ?>
    <div class="row" id="scheduleMenuId">
        <div class="col-xs-6 text-left">
            <h3>稽古予定</h3>
        </div>
        <div class="col-xs-6 text-right">
            <h3>
                <small>
                    <a href="jyouban.php?date=<?= $previousDate ?>#scheduleMenuId"><span
                            class="glyphicon glyphicon-chevron-left"></span></a>
                    <?= date('Y年n月', strtotime($date)) ?>
                    <a href="jyouban.php?date=<?= $nextDate ?>#scheduleMenuId"><span
                            class="glyphicon glyphicon-chevron-right"></span></a>
                </small>
            </h3>
        </div>
    </div>

    <div class="row text-center">
        <table class="table table-bordered table-striped">
            <thead>
            <tr>
                <th class="col-xs-2 text-center">日付</th>
                <th class="col-xs-4 text-center">稽古場</th>
            </tr>
            </thead>
            <tbody>
            <?php
            require_once $_SERVER['DOCUMENT_ROOT'] . '/lib/google_calendar.php';
            foreach (get_jyouban_events($date)->items as $item) {
                $row = get_array($item);

                if (preg_match('/東京武道館/', $row[1])) {
                    echo '<tr class="text-primary">';
                } else {
                    echo '<tr>';
                }
                // $from
                echo "<td>$row[0]</td>";
                // $summary, $url
                if ($row[2] == null) {
                    echo "<td>$row[1]</td>";
                } else {
                    echo "<td>$row[1] <a href=\"$row[2]\"><span class=\"glyphicon glyphicon-file\" aria-hidden=\"true\"></span></a></td>";
                }
                echo '</tr>';
            }
            echo "\n";
            ?>
            </tbody>
        </table>

        <p>この予定表はGoogleカレンダーから作成しています。<a
                href="https://calendar.google.com/calendar/embed?src=p31th6lhvgpu5se3karqu1su5o%40group.calendar.google.com&ctz=Asia/Tokyo"><span
                    class="glyphicon glyphicon-calendar" aria-hidden="true"></span></a></p>

        <div class="list-group text-center">
            <a href="#" class="list-group-item toThePageTop"><span class="glyphicon glyphicon-chevron-up"
                                                                   aria-hidden="true"></span></a>
        </div>
    </div>
</div>

<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/lib/footer.php'); ?>
</body>

</html>
