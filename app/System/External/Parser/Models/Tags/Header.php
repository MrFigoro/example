<?php


namespace App\System\External\Parser\Models\Tags;

use App\System\External\Parser\Models\Tags\PseudoClasses\Header\Normal;

class Header extends Tag
{
    /**
     * @var string
     */
    protected $realName = 'h1';
    /**
     * @var string
     */
    protected $name = 'header';
    /**
     * @var array
     */
    protected $initialPseudoClasses = [
        Normal::class
    ];
}