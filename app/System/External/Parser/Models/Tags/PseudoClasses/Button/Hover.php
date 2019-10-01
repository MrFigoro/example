<?php


namespace App\System\External\Parser\Models\Tags\PseudoClasses\Button;

use App\System\External\Parser\Models\CssTags\BackgroundColor;
use App\System\External\Parser\Models\CssTags\Border;
use App\System\External\Parser\Models\CssTags\Color;
use App\System\External\Parser\Models\Tags\PseudoClasses\PseudoClass;

class Hover extends PseudoClass
{
    /**
     * @var string
     */
    protected $name = 'hover';

    /**
     * @var string
     */
    protected $realName = 'hover';

    /**
     * @var array
     */
    protected $initialCssTags = [
        BackgroundColor::class, Border::class, Color::class
    ];
}