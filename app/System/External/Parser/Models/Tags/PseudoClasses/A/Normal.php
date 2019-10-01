<?php


namespace App\System\External\Parser\Models\Tags\PseudoClasses\A;

use App\System\External\Parser\Models\CssTags\BackgroundColor;
use App\System\External\Parser\Models\CssTags\Border;
use App\System\External\Parser\Models\CssTags\Color;
use App\System\External\Parser\Models\CssTags\FontFamily;
use App\System\External\Parser\Models\CssTags\FontSize;
use App\System\External\Parser\Models\CssTags\FontWeight;
use App\System\External\Parser\Models\Tags\PseudoClasses\Normal as ParentNormal;

class Normal extends ParentNormal
{
    /**
     * @var array
     */
    protected $initialCssTags = [
        BackgroundColor::class, Border::class, Color::class, FontFamily::class, FontSize::class, FontWeight::class
    ];
}