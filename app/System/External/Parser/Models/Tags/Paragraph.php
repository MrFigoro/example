<?php


namespace App\System\External\Parser\Models\Tags;

use App\System\External\Parser\Models\Tags\PseudoClasses\Paragraph\Normal;

class Paragraph extends Tag
{
    /**
     * @var string
     */
    protected $realName = 'p';

    /**
     * @var string
     */
    protected $name = 'paragraph';

    /**
     * @var array
     */
    protected $initialPseudoClasses = [
        Normal::class
    ];
}