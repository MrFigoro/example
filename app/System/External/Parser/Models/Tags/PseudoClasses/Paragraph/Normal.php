<?php


namespace App\System\External\Parser\Models\Tags\PseudoClasses\Paragraph;

use App\System\External\Parser\Models\CssTags\Color;
use App\System\External\Parser\Models\CssTags\FontFamily;
use App\System\External\Parser\Models\CssTags\FontSize;
use App\System\External\Parser\Models\Tags\PseudoClasses\Normal as ParentNormal;

class Normal extends ParentNormal
{
    /**
     * @var array
     */
    protected $initialCssTags = [
        Color::class, FontFamily::class, FontSize::class
    ];
}