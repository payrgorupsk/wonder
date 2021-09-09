<?php 
if ($f == 'load_videos') {
    $load = sanitize_output(Wo_LoadPage('videos/load_videos'));
    echo $load;
    exit();
}
