<?php
    /* Question posting on forums */
    $quest_post_date = new DateTimeImmutable('2025-06-2');


    function calculatePostInterval(DateTimeImmutable $post_date) {
        $current_date = new DateTimeImmutable('now');
        $post_interval = $current_date->diff($post_date);

        $post_interval_comps = [
            "year" => $post_interval->format('%y'),
            "month" => $post_interval->format('%m'),
            "day" => $post_interval->format('%d'),
            "hour" => $post_interval->format("%h"),
            "minute" => $post_interval->format("%i"),
            "second" => $post_interval->format("%s")
        ];

        foreach ($post_interval_comps as $key => $comp) {
            if (intval($comp) > 0) { return (intval($comp) <= 1) ? [$key, $comp] : ["{$key}s", $comp]; }
        }

        return ["second", 0];
    }

    echo 'This question was posted ' . calculatePostInterval($quest_post_date)[1] . " " . calculatePostInterval($quest_post_date)[0] . ' ago';