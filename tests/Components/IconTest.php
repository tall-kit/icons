<?php

namespace Tests\Components;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\View;
use Tests\TestCase;

/**
 * Class IconTest
 * @package Tests\Support
 */
class IconTest extends TestCase
{
    /** @test */
    public function can_render_view_to_html()
    {
        $this->addConfigSet([
            'heroicon' => [
                'path' => parent::resourcesPath('svg'),
            ]
        ]);
        $html = View::file(parent::resourcesPath('views/icon.blade.php'))->render();
        $this->assertSame(
            '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" /></svg>',
            trim($html)
        );
    }

    /**
     * @param array $set
     */
    private function addConfigSet(array $set): void
    {
        Config::set("tall-icons.sets", $set);
    }
}
