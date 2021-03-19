<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <meta name="keywords" content="予定,居合,土佐直伝英信流,関東">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"
        integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu"
        crossorigin="anonymous">
  <link rel="stylesheet" href="/mybootstrap.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"
          integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
          crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"
          integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd"
          crossorigin="anonymous"></script>
</head>

<body>
<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/lib/header.php'); ?>

<div class="container text-center">

    <?php
    if (isset($_GET['year'])) {
        $year = $_GET['year'];
    } else {
        $year = date('Y');
    }
    $lastYear = $year - 1;
    $nextYear = $year + 1;
    ?>
  <div class="row">
    <div class="col-xs-6 text-left">
      <h2>関東の行事</h2>
    </div>
    <div class="col-xs-6 text-right">
      <h2>
        <small>
          <a href="kanto.php?year=<?= $lastYear ?>"><span class="glyphicon glyphicon-chevron-left"></span></a>
            <?= $year ?>年度
          <a href="kanto.php?year=<?= $nextYear ?>"><span
              class="glyphicon glyphicon-chevron-right"></span></a>
        </small>
      </h2>
    </div>
  </div>

  <table class="table table-bordered table-striped">
    <thead>
    <tr>
      <th class="col-xs-2 text-center">日付</th>
      <th class="col-xs-4 text-center">内容</th>
      <th class="col-xs-2 text-center">状況</th>
      <th class="col-xs-4 text-center">場所</th>
    </tr>
    </thead>
    <tbody>
    <?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '/lib/google_calendar.php';
    $calendarId = '0mf31rhtrl435d1asl3nj7lpqk@group.calendar.google.com';
    foreach (get_events($calendarId, $year)->items as $item) {
        $row = get_array($item);
        echo '<tr>';
        // $from
        echo "<td>$row[0]</td>";
        // $summary, $url
        if ($row[2] == null) {
            echo "<td>$row[1]</td>";
        } else {
            echo "<td>$row[1] <a href=\"$row[2]\"><span class=\"glyphicon glyphicon-file\" aria-hidden=\"true\"></span></a></td>";
        }
        // $description
        echo "<td>$row[3]</td>";
        // $location
        echo "<td>$row[4]</td>";
        echo '</tr>';
    }
    echo "\n";
    ?>
    </tbody>
  </table>

  <p>この予定表はGoogleカレンダーから作成しています。<a
      href="https://calendar.google.com/calendar/embed?src=0mf31rhtrl435d1asl3nj7lpqk%40group.calendar.google.com&ctz=Asia/Tokyo"><span
        class="glyphicon glyphicon-calendar" aria-hidden="true"></span></a></p>

</div>

<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/lib/footer.php'); ?>
</body>

</html>
