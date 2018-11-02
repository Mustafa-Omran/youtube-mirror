<?php

Route::group([
    'prefix' => 'youtube',
        ], function () {
    Route::get('list', 'YoutubeController@getPopularVideosInEgypt');
    Route::post('search', 'YoutubeController@search');
});
