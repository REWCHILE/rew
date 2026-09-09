<?php

namespace Tests\Feature;

use Tests\TestCase;

class FlagsTest extends TestCase
{
    /**
     * Test flags endpoint returns SVG content correctly.
     */
    public function test_flag_svg_endpoints_return_ok(): void
    {
        $responseCl = $this->get('/images/flags/cl.svg');
        $responseCl->assertStatus(200);
        $this->assertStringContainsString('svg', $responseCl->headers->get('content-type'));

        $responseUs = $this->get('/images/flags/us.svg');
        $responseUs->assertStatus(200);
        $this->assertStringContainsString('svg', $responseUs->headers->get('content-type'));
    }
}
