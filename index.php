<?php

// OAuthライブラリの読み込み
require "twitteroauth/autoload.php";
use Abraham\TwitterOAuth\TwitterOAuth;

require_once 'key/consumer.php';

date_default_timezone_set('Asia/Tokyo');

//認証情報４つ
$consumerKey = $ck;
$consumerSecret = $cs;
$accessToken = $at;
$accessTokenSecret = $ats;

//接続
$connection = new TwitterOAuth($consumerKey, $consumerSecret, $accessToken, $accessTokenSecret);

include 'views/tweet_view.php';