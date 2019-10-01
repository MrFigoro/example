<?php


namespace App\Http\Resources\Client;

use App\System\Models\Page;
use Illuminate\Http\Resources\Json\Resource;
use Illuminate\Http\Request;

class PageResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request) : array
    {
        /** @var Page $page */
        $page = $this->resource;
        $result = [
            'status' => $page->status,
            'result' => $page->getResults(),
        ];
        if ($page->status == 'error') {
            $result['error'] = 'Something went wrong. Could you write us about it?';
        }
        return $result;
    }
}