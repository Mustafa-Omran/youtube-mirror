<?php

namespace App\Services;

use Youtube;

/**
 * YoutubeService 
 * 
 * @author Mustafa Omran <promustafaomran@hotmail.com>
 */
class YoutubeService {

    public function getPopularVideos() {
        return Youtube::getPopularVideos('eg');
    }
    
    public function search(string $keywords){
        return Youtube::search($keywords);
    }

}
