<?php

namespace TallKit\Icons\Components;

use Closure;
use Illuminate\Support\Str;
use Illuminate\View;
use Illuminate\Support\Facades\Config;
use TallKit\Icons\Support\Svg;

/**
 * Class Icon
 * @package TallKit\Icons\Components
 */
class Icon extends View\Component
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var Config
     */
    private $config;

    /**
     * Icon constructor.
     * @param Config $config
     * @param string $name
     */
    public function __construct(Config $config, string $name)
    {
        $this->name = $name;
        $this->config = $config;
    }

    /**
     * @return Closure
     */
    public function render()
    {
        $nameParts = Str::of($this->name)->explode('.');
        $iconName = $nameParts->pop();
        $iconSet = $nameParts->implode('.');

        $filePath = $this->config::get("tall-icons.sets.{$iconSet}.path");
        $filePath .= "/{$iconName}.svg";

        return function (array $data) use ($filePath) {
            return Svg::make($filePath, $data['attributes'])->toHtml();
        };
    }
}