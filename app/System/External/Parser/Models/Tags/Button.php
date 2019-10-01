<?php


namespace App\System\External\Parser\Models\Tags;

use App\System\External\Parser\Models\Tags\PseudoClasses\Button\Hover;
use App\System\External\Parser\Models\Tags\PseudoClasses\Button\Normal;

class Button extends Tag
{
    /**
     * @var string
     */
    protected $realName = 'button';

    /**
     * @var string
     */
    protected $name = 'button';

    /**
     * @var array
     */
    protected $initialPseudoClasses = [
        Normal::class, Hover::class
    ];
}
