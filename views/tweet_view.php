<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="stylesheet.css">
        <title>twitter取得</title>
    </head>
    <body>
        <h1>twitter表示のテストです</h1>
        <hr>
        <div class="tweet_view">
            <?php $statuses = $connection->get("statuses/home_timeline", ["count" => 50]); ?>
                <?php if(isset($statuses->errors)) :?>
                    <?php //エラー発生 ?>
                    <?php echo "some error occurred."; ?>
                    <?php echo "error message: " . $statuses->errors[0]->message; ?>
                <?php else :?>
                    <?php //ツイートの取得に成功 ?>
                    <ul>
                    <?php for ($i=0; $i < 49; $i++) : ?>
                        <li>
                            <img src="<?php echo $statuses[$i]->user->profile_image_url; ?>">
                            <a href="<?php echo 'https://twitter.com/'. $statuses[$i]->user->screen_name ?>">
                                <?php echo htmlspecialchars($statuses[$i]->user->name, ENT_QUOTES, 'UTF-8'); ?>
                            </a>
                            <?php echo htmlspecialchars("@" . $statuses[$i]->user->screen_name, ENT_QUOTES, 'UTF-8'); ?><br>
                            <?php echo htmlspecialchars($statuses[$i]->text, ENT_QUOTES, 'UTF-8'); ?><br>
                            <?php $date = new DateTime($statuses[$i]->created_at); ?>
                            <?php $date->setTimezone(new DateTimeZone('Asia/Tokyo')); ?>
                            <?php echo "投稿日時: " . $date->format('Y年 m月d日 H時i分'); ?>
                            <?php echo "via: " . $statuses[$i]->source; ?>
                            <?php echo $statuses[$i]->retweet_count . " rt"; ?>
                            <?php echo $statuses[$i]->favorite_count . " fav"; ?>
                            <?php if($statuses[$i]->user->protected) : {echo "非公開";} ?>
                                <?php echo "-------------------------------"; ?>
                            <?php endif ?>
                            <hr>
                        </li>
                    <?php endfor ?>
                    </ul>
                <?php endif ?>
            
        </div>
    </body>
</html>
