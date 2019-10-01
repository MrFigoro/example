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

class Normal extends PseudoClass
{
    public function __construct()
    {
        $this->name = static::DEFAULT;
        parent::__construct();
    }

    /**
     * get regex for looking for findable places
     * @param string $class
     * @return string
     */
    public function getPrefix(string $class) : string
    {
        return $class;
    }
}