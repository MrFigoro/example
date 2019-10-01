<?php


namespace App\System\External\Parser\Models\Tags;

use App\System\External\Parser\Models\Tags\PseudoClasses\Div\Normal;

class Div extends Tag
{
    /**
     * @var string
     */
    protected $realName = 'div';

    /**
     * @var string
     */
    protected $name = 'block';

    /**
     * @var array
     */
    protected $initialPseudoClasses = [
        Normal::class
    ];
}
