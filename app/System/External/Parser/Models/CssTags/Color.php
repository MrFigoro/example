<?php

namespace App\System\External\Parser\Models\CssTags;

class Color extends Tag
{
    /**
     * @var string
     */
    protected $realName = 'color';

    /**
     * @var string
     */
    protected $name = 'color';

    /**
     * @var array
     */
    protected $exceptValues = ['transparent', 'inherit'];
}