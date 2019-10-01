<?php

namespace App\System\External\Parser\Models\CssTags;


class BackgroundColor extends Tag
{
    /**
     * @var string
     */
    protected $realName = 'background-color';

    /**
     * @var string
     */
    protected $name = 'backgroundColor';

    /**
     * @var array
     */
    protected $exceptValues = ['transparent', 'inherit'];
}