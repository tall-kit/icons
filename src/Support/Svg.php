<?php

namespace TallKit\Icons\Support;

use Illuminate\Contracts\Support\Htmlable;
use Illuminate\View\ComponentAttributeBag;

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
     * @var ComponentAttributeBag|null
     */
    private $attributes;

    /**
     * Svg constructor.
     * @param string $svg
     * @param ComponentAttributeBag|null $attributes
     */
    public function __construct(string $svg, ComponentAttributeBag $attributes = null)
    {
        $this->svg = file_exists($svg) ? file_get_contents($svg) : $svg;
        $this->attributes = $attributes;
    }

    /**
     * @param string $svg
     * @param ComponentAttributeBag $attributes
     * @return Svg
     */
    public static function make(string $svg, ComponentAttributeBag $attributes): Svg
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
        // Remove whitespace
        $pattern = ['/>(\s)+</m'];
        $replacement = ['><'];
        if($this->attributes) {
            foreach($this->attributes->getIterator()->getArrayCopy() as $key => $value) {
                $pattern[] = '/\s(' . $key . ')="([^\'"]*)"/';
                $replacement[] = '';
            }
        }
        $this->svg = preg_replace( $pattern, $replacement, $this->svg);
    }

    /**
     * @return void
     */
    private function addAttributes(): void
    {
        if(!$this->attributes) {
            return;
        }
        $this->svg = str_replace('<svg', "<svg {$this->attributes}", $this->svg);
    }
}
