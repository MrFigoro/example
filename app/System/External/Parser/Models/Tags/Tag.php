<?php

namespace App\System\External\Parser\Models\Tags;

use Symfony\Component\DomCrawler\Crawler;

class Tag
{
    /**
     * @var string
     */
    protected $realName;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var array
     */
    protected $classes = [];

    /**
     * @var array
     */
    protected $initialPseudoClasses = [];

    /**
     * @var array
     */
    protected $pseudoClasses = [];

    public function __construct()
    {
        $this->initPseudoClasses();
    }

    public function getName() : string
    {
        return $this->name;
    }

    protected function initPseudoClasses()
    {
        foreach ($this->initialPseudoClasses as $class) {
            $this->pseudoClasses[] = new $class();
        }
    }

    /**
     * @param Crawler $page
     * @return bool
     */
    public function determineClasses(Crawler $page):bool //проверяет есть ли у тега классы
    {
        if (!empty($this->realName)) {
            $classes = $page->filterXPath("//$this->realName")->each(function ($element) {
                return $element->attr('class');
            });
            if(!empty($classes)) {
                foreach ($classes as $class) {
                    foreach (explode(" ", $class) as $item) {
                        if(!empty($item) && !in_array('.'.$item, $this->classes)) {
                            array_push($this->classes, '.'.$item);
                        }
                    }
                }
                array_push($this->classes, $this->realName);
            }
            return true;
        }
        return false;
    }

    /**
     * @return array
     */
    public function getClasses() : array
    {
        return $this->classes;
    }

    public function toArray():array
    {
        $results = [];
        if (count($this->pseudoClasses) == 1) {
            $results = current($this->pseudoClasses)->toArray();
        } else {
            foreach ($this->pseudoClasses as $pseudoClass) {
                $results[$pseudoClass->getName()] = $pseudoClass->toArray();
            }
        }
        return $results;
    }

    public function getPseudoClasses() : array
    {
        return $this->pseudoClasses;
    }

    public function setPseudoClasses(array $pseudoClasses)
    {
        $this->pseudoClasses = $pseudoClasses;
    }
}