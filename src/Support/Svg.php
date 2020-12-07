<?php

namespace TallKit\Icons\Support;

use Illuminate\Contracts\Support\Htmlable;

/**
 * Class Svg
 * @package TallKit\Icons\Support
 */
class Svg implements Htmlable
{
    /**
     * @var string
     */
    private $svg;

    /**
     * @var array
     */
    private $attributes;

    /**
     * Svg constructor.
     * @param string $svg
     * @param array $attributes
     */
    public function __construct(string $svg, array $attributes = [])
    {
        $this->svg = file_exists($svg) ? file_get_contents($svg) : $svg;
        $this->attributes = $attributes;
    }

    /**
     * @param string $svg
     * @param array $attributes
     * @return Svg
     */
    public static function make(string $svg, array $attributes): Svg
    {
        return new Svg($svg, $attributes);
    }

    /**
     * @return string
     */
    public function toHtml(): string
    {
        $this->removeSpaceBetweenTags();
        $this->addAttributes();
        return $this->svg;
    }

    /**
     * @return void
     */
    private function removeSpaceBetweenTags(): void
    {
        $this->svg = preg_replace( '/>(\s)+</m', '><', $this->svg);
    }

    private function addAttributes()
    {

    }
}
