<?php


namespace App\Console\Commands;

use App\System\External\Parser\Parser;
use App\System\Models\Page;
use Illuminate\Console\Command;


class PageCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'page:parse {id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test parser';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    protected $parser;

    public function handle()
    {
        $page = Page::findOrFail($this->argument('id'));
        $this->parser = new Parser($page->url);
        $this->parser->parse();
        $page->setParsed($this->parser->getTags());
        $page->save();
        $this->info("\nResults:\n\n".$page->results."\n\n");
    }
}