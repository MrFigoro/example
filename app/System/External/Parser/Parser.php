<?php


namespace App\System\External\Parser;

use App\System\External\Parser\Client\Client;
use App\System\External\Parser\Models\Tags\A;
use App\System\External\Parser\Models\Tags\Base;
use App\System\External\Parser\Models\Tags\Div;
use App\System\External\Parser\Models\Tags\Button;
use App\System\External\Parser\Models\Tags\Header;
use App\System\External\Parser\Models\Tags\Paragraph;
use App\System\External\Parser\Models\Tags\PseudoClasses\PseudoClass;
use App\System\External\Parser\Models\Tags\Tag;
use Symfony\Component\DomCrawler\Crawler;

class Parser
{
    /**
     * @var string
     */
    protected $url;

    /**
     * @var array
     */
    protected $tags;

    /**
     * Parser constructor.
     * @param string $url
     */
    public function __construct(string $url = 'https://natatnik.by/event/')
    {
        $this->url = $url;
        $this->tags = [
            new Header(),
            new Paragraph(),
            new Button(),
            new Div(),
            new A(),
            new Base(),
        ];
    }

    public function parse()
    {
        $client = new Client();
        $page = new Crawler($client->get($this->url));
        $cssFiles = $page->filterXPath('//head/link[@rel="stylesheet"]')->each(function ($element) use($client) {
            return $client->get($element->attr('href'));
        });

        foreach ($this->tags as $tag) {
            /**
             * @var Tag $tag
             */
            $find = $tag->determineClasses($page);
            $pseudoClasses = [];
            foreach ($tag->getPseudoClasses() as $pseudoClass) {
                $findAblePlaces = [];
                if ($find) {
                    foreach ($cssFiles as $content) { //all classes on page
                        $findAblePlaces = array_merge(
                            $findAblePlaces,
                            $this->findPlaces($content, $tag, $pseudoClass)
                        );
                    }
                } else {
                    $findAblePlaces = $cssFiles;
                }
                $cssTags = $pseudoClass->getCssTags();
                $cssTags->each(function ($tag) use ($findAblePlaces) {
                    foreach ($findAblePlaces as $place) {
                        $tag->determineValues($place);
                    }
                    $tag->sort();
                    $tag->cut();
                });
                $pseudoClass->setCssTags($cssTags);
                $pseudoClasses[] = $pseudoClass;
            }
            $tag->setPseudoClasses($pseudoClasses);
        }
    }

    public function findPlaces(string $content, Tag $tag, PseudoClass $pseudoClass) : array
    {
        $places = [];
        foreach ($tag->getClasses() as $class) {
            $prefix = $pseudoClass->getPrefix($class);
            preg_match_all("/$prefix([^{]*)([^}]*)[\}]{1}/s", $content, $output_array);
            if (array_key_exists(0, $output_array) && !empty($output_array[0])) {
                foreach ($output_array[0] as $place) {
                    preg_match_all("/[^,{]*/s", $place, $matches);
                    if (array_key_exists(0, $matches) && !empty($matches[0])) {
                        foreach ($matches[0] as $match) {
                            if (preg_match("/{$prefix}[\\n \n]*\z/s", trim($match)) == 1) {
                                array_push($places, $place);
                                break;
                            }
                        }
                    }
                }
            }
        }
        return $places;
    }

    /**
     * @return array
     */
    public function getTags() : array
    {
        return $this->tags;
    }
}