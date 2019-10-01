<?php


namespace App\System\External\Parser\Models\CssTags;


class Tag
{
    /**
     * @var string
     */
    protected $realName;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var array
     */
    protected $values = [];

    /**
     * @var int
     */
    protected $saveValues = 15;

    /**
     * @var array
     */
    protected $exceptValues = [];

    public function __construct()
    {
        $this->saveValues = env('PARSER_SAVE_VALUES', 15);
    }

    public function getRealName()
    {
        return $this->realName;
    }

    public function getName()
    {
        return $this->name;
    }

    public function determineValues(string $text)
    {
        preg_match_all("/{$this->realName}( *: *)([^;}]*)[;}]{1}/", $text, $matches);
        if (array_key_exists(2, $matches) && !empty($matches[2])) {
            foreach($matches[2] as $key) {
                $this->keyIncrement(trim($key));
            }
        }

    }

    protected function keyIncrement(string $key)
    {
        $key = preg_replace('/[ ]*![ ]*important/', '', $key);
        if (!in_array($key, $this->exceptValues)) {
            if (array_key_exists($key, $this->values)) {
                $this->values[$key]++;
            } else {
                $this->values[$key] = 1;
            }
        }
    }

    /**
     * sort values
     *
     * @return bool
     */
    public function sort():bool
    {
        return arsort($this->values);
    }

    public function cut()
    {
        $this->values = array_slice($this->values, 0, $this->saveValues);
    }

    public function toArray() : array
    {
	    return array_keys($this->values);
    }
}