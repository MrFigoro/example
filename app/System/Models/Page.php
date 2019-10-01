<?php


namespace App\System\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Page extends Model
{
    /**
     * Parsed tags
     * @var array
     */
    protected $tags = [];

    /**
     * @var array
     */
    protected $fillable = [
        'url', 'parsed_at', 'user_id', 'results', 'status'
    ];

    /**
     * default attributes
     * @var array
     */
    protected $attributes = [
        'status' => 'wait'
    ];

    /*
     * get user
     */
    public function user()
    {
        return $this->belongsTo('App\System\Models\User');
    }

    public function setParsed(array $tags)
    {
        $this->tags = $tags;
        $results = [];
        foreach ($tags as $tag) {
            $results[$tag->getName()] = $tag->toArray();
        }
        $this->results = json_encode($results);
        $this->parsed_at = Carbon::now();
        $this->status = 'success';
    }

    public function getResults()
    {
        if (empty($this->results)) {
            return [];
        } else {
            return json_decode($this->results);
        }
    }
}