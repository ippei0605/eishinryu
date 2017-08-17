<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0"/>
    <title>Bluemix Demo</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          rel="stylesheet"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
          crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"
            integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
            crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
            crossorigin="anonymous"></script>
</head>

<body>

<div class="container">
    <h1>Bluemix Demo</h1>

    <form method="GET" action="/bx">
        <button class="btn btn-default" name="home">
            <span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home
        </button>
        <button class="btn btn-default" name="B20-O970605-line-bot">
            LINE BOT を開始する
        </button>
        <button class="btn btn-default" name="B20-O970605-qa-chatbot">
            Q&A Chatbot を開始する
        </button>
        <button class="btn btn-default" name="Logout">
            <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> Logout
        </button>
    </form>

    <hr>

    <p>Target</p>
    <pre>
        <?php
        // ターゲットを取得する。エラーの場合はログインする。
        $target = `./bx target`;
        if (strpos($target, 'FAILED') !== false) {
            $login = `./bx login -a https://api.eu-gb.bluemix.net --apikey SgHXN3-qOK6qFJtFN3C37vCQFmTg0izsNfnpThZV3ygA -o jiec_rd -s dev`;
            $target = `./bx target`;
        }
        echo $target;
        ?>
    </pre>

    <?php
    // B20-O970605-line-bot ボタンのクリック時に、該当アプリを開始する。
    if (isset($_GET['B20-O970605-line-bot'])) {
        $start = `./bx app start B20-O970605-line-bot`;
        echo "<p>bx app start B20-O970605-line-bot</p>";
        echo "<pre>";
        echo $start;
        echo "</pre>";
    } else if (isset($_GET['B20-O970605-qa-chatbot'])) {
        $start = `./bx app start B20-O970605-qa-chatbot`;
        echo "<p>bx app start B20-O970605-qa-chatbot</p>";
        echo "<pre>";
        echo $start;
        echo "</pre>";
    } else if (isset($_GET['Logout'])) {
        $start = `./bx logout`;
        echo "<p>bx logout</p>";
        echo "<pre>";
        echo $start;
        echo "</pre>";
    }
    ?>

    <p>Apps</p>
    <pre>
        <?php
        // アプリのリストを表示する。
        //$appStart = `./bx app start B20-O970605-line-bot`;
        $apps = `./bx app list`;
        echo $apps;
        ?>
    </pre>

</div>

</body>

</html>
