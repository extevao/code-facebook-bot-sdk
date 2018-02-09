<?php
/**
 * Created by PhpStorm.
 * User: estevao
 * Date: 08/02/18
 * Time: 22:16
 */

namespace CodeBot;

use CodeBot\Message\Text;
use PHPUnit\Framework\TestCase;

class CallSendApiTest extends TestCase
{
    /**
     * @expectedException \GuzzleHttp\Exception\ClientException
     */
    public function testMakeRequest()
    {
        $message = (new Text(1))->message('Oii');
        (new CallSendApi('2131'))->make($message);
    }
}