<?php


namespace App\System\External\Parser\Models\Tags;


use App\System\External\Parser\Models\Tags\PseudoClasses\Normal;

class Base extends Tag
{
    /**
     * @var string
     */
    protected $name = 'base';

    /**
     * @var array
     */
    protected $initialPseudoClasses = [
        Normal::class
    ];
}