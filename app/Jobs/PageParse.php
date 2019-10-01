<?php

namespace App\Jobs;

use App\System\Models\Page;
use App\System\External\Parser\Parser;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class PageParse implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Page for parsing
     *
     * @var Page $page
     */
    protected $page;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Page $page)
    {
        $this->page = $page;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->parser = new Parser($this->page->url);
        $this->parser->parse();
        $this->page->setParsed($this->parser->getTags());
        $this->page->save();
    }
}
