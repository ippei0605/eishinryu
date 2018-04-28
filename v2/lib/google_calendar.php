<?php

date_default_timezone_set('Asia/Tokyo');
$week_name = ['日', '月', '火', '水', '木', '金', '土'];
$arrContextOptions = [
    'ssl' => [
        'verify_peer' => false,
        'verify_peer_name' => false,
    ],
];

function get_events_by_url($url)
{
    global $arrContextOptions;

    return json_decode(file_get_contents($url, false, stream_context_create($arrContextOptions)));
}

function get_jyouban_events($date)
{
    $to_date = date('Y-m-d', strtotime($date.' +3 month'));
    $url = 'https://www.googleapis.com/calendar/v3/calendars/p31th6lhvgpu5se3karqu1su5o@group.calendar.google.com/events?key=AIzaSyCGDCL9Cf2wYuTh0Er_KiqYlgasj-BRFds&timeMin='.$date.'T00:00:00Z&timeMax='.$to_date.'T00:00:00Z&orderBy=startTime&singleEvents=true&timeZone=Asia';

    return get_events_by_url($url);
}

function get_events($id, $year)
{
    $url = "https://www.googleapis.com/calendar/v3/calendars/$id/events?key=AIzaSyCGDCL9Cf2wYuTh0Er_KiqYlgasj-BRFds&timeMin=$year-01-01T00:00:00Z&timeMax=$year-12-31T23:59:59Z&orderBy=startTime&singleEvents=true&timeZone=Asia";

    return get_events_by_url($url);
}

function get_datetime($item)
{
    global $week_name;
    if (isset($item->start->date)) {
        $fromTime = strtotime($item->start->date);
        $toTime = strtotime($item->end->date.' -1 day');

        $from = date('n/j (', $fromTime).$week_name[date('w', $fromTime)].')';
        $to = date('n/j (', $toTime).$week_name[date('w', $toTime)].')';

        $date = $from;
        if ($from !== $to) {
            $date .= ' - '.$to;
        }
        $time = '';
    } else {
        $fromTime = strtotime($item->start->dateTime);
        $toTime = strtotime($item->end->dateTime);
        $date = date('n/j (', $fromTime).$week_name[date('w', $fromTime)].')';
        $time = date('H:i', $fromTime).'-'.date('H:i', $toTime);
    }

    return [$date, $time];
}

function get_array($item)
{
    $datetime = get_datetime($item);

    $summary = $item->summary;
    if ($datetime[1] !== '') {
        $summary .= " ($datetime[1])";
    }

    $url = null;
    if ($item->attachments != null) {
        $url = $item->attachments[0]->fileUrl;
    }

    $description = $item->description;
    $location = $item->location;

    return [$datetime[0], $summary, $url, $description, $location];
}
