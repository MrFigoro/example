<?php


namespace App\System\External\Parser\Models\Tags\PseudoClasses\Div;

use App\System\External\Parser\Models\CssTags\BackgroundColor;
use App\System\External\Parser\Models\CssTags\Border;
use App\System\External\Parser\Models\CssTags\BorderRadius;
use App\System\External\Parser\Models\Tags\PseudoClasses\Normal as ParentNormal;

class Normal extends ParentNormal
{
    /**
     * @var array
     */
    protected $initialCssTags = [
        BackgroundColor::class, Border::class, BorderRadius::class
    ];
}