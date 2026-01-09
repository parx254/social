<?php
require_once 'functions.php';

$postID = (int)($argv[1] ?? 0);
if (!$postID) exit;

$video = getVideoByPostID($postID);
if (!$video) exit;

$success = runFFmpeg($video);

if ($success) {
    markVideoReady($postID);
} else {
    markVideoFailed($postID, 'FFmpeg failed');
}
