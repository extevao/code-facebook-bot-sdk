<?php

namespace CodeBot\Message;

use Tests\TestCase;

class TextTest extends TestCase
{
    public function testRetornaUmArray()
    {
        $actual = (new Text)->message('oii');
        $expected = [
            'recipient' => [
                'id' => 1
            ],
            'message' => [
                'text' => 'oii',
                'metadata' => 'DEVELOPER_DEFINED_METADATA'

            ]
        ];

        $this->assertEquals($actual, $expected);

    }
}