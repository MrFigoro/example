<?php


namespace App\System\External\Parser\Models\Tags;

use App\System\External\Parser\Models\Tags\PseudoClasses\A\Hover;
use App\System\External\Parser\Models\Tags\PseudoClasses\A\Normal;

class A extends Tag
{
    /**
     * @var string
     */
    protected $realName = 'a';

    /**
     * @var string
     */
    protected $name = 'a';

    /**
     * @var array
     */
    protected $initialPseudoClasses = [
        Normal::class, Hover::class
    ];
}
