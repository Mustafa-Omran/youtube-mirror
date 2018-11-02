<?php
/**
 * YoutubeController 
 * 
 * @author Mustafa Omran <promustafaomran@hotmail.com>
 */
namespace App\Http\Controllers\APIs;

use Validator;
use Illuminate\Http\Request;
use App\Services\YoutubeService;
use App\Http\Controllers\APIs\BaseController;

class YoutubeController extends BaseController
{

    /**
     *
     * @var \App\Services\YoutubeService 
     */
    private  $youtubeService;

    public function __construct(YoutubeService $youtubeService)
    {
        $this->youtubeService = $youtubeService;
    }

    /**
     * fetch popular videos in Egypt
     * 
     * 
     */
    public function getPopularVideosInEgypt()
    {
        $query = $this->youtubeService->getPopularVideos();
        if ($query)
        {
            return $this->sendResponse($query, 'Success.');
        }
        else
        {
            return $this->sendError('Error try again!');
        }
    }

    /**
     * search using keywords
     * 
     * 
     * @param \App\Http\Controllers\APIs\Request $request
     * @return mixed
     */
    public function search(Request $request)
    {
        $validator = Validator::make($request->all(), [
                    'keywords' => 'required',
        ]);

        if ($validator->fails())
        {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $search = $this->youtubeService->search($request->keywords);

        if ($search)
        {
            return $this->sendResponse($search, 'Success.');
        }
    }

}
