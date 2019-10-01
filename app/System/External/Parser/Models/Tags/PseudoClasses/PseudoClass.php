<?php

namespace App\System\External\Parser\Models\Tags\PseudoClasses;

use App\System\External\Parser\Models\CssTags\BackgroundColor;
use App\System\External\Parser\Models\CssTags\Border;
use App\System\External\Parser\Models\CssTags\BorderRadius;
use App\System\External\Parser\Models\CssTags\Color;
use App\System\External\Parser\Models\CssTags\FontFamily;
use App\System\External\Parser\Models\CssTags\FontSize;
use App\System\External\Parser\Models\CssTags\FontWeight;
use App\System\External\Parser\Models\CssTags\LineHeight;
use App\System\External\Parser\Models\CssTags\Padding;
use App\System\External\Parser\Models\CssTags\TextAlign;
use App\System\External\Parser\Models\CssTags\TextDecoration;
use Illuminate\Support\Collection;

class PseudoClass
{
    /**
     * @var string
     */
    const DEFAULT = 'normal';

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
    protected $cssTags = [];

    /**
     * @var array
     */
    protected $initialCssTags = [
        BackgroundColor::class, Border::class, BorderRadius::class, Color::class, FontFamily::class, FontSize::class,
        FontWeight::class, LineHeight::class, Padding::class, TextAlign::class, TextDecoration::class
    ];

    public function __construct()
    {
        if (empty($this->name)) {
            $this->name = static::DEFAULT;
        }
        $this->initCssTags();
    }

    protected function initCssTags()
    {
        $this->cssTags = new Collection();
        foreach ($this->initialCssTags as $tag) {
            $this->cssTags->push(new $tag());
        }
    }

    public function getRealName() : string
    {
        return $this->realName;
    }

    public function getName() : string
    {
        return $this->name;
    }

    public function getCssTags() : Collection
    {
        return $this->cssTags;
    }

    public function setCssTags(Collection $cssTags)
    {
        $this->cssTags = $cssTags;
    }
    public function getPrefix(string $class) : string
    {
        return "{$class}[ ]*:[ ]*{$this->realName}";
    }

    public function toArray() : array
    {
        $results = [];
        foreach ($this->cssTags->all() as $cssTag) {
            $results[$cssTag->getName()] = $cssTag->toArray();
        }
        return $results;
    }
}