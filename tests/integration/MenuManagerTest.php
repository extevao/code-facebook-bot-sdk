<?php
/**
 * Created by PhpStorm.
 * User: estevao
 * Date: 12/02/18
 * Time: 21:01
 */

namespace CodeBot;


use PHPUnit\Framework\TestCase;

class MenuManagerTest extends TestCase
{

    public function testMakeMenu()
    {
        $menu = new MenuManager('default');

        $call_to_actions = [
            [
                'id' => 1,
                'type' => 'nested',
                'title' => 'O que eu posso fazer?',
                'parent_id' => 0,
                'value' => null
            ],
            [
                'id' => 2,
                'type' => 'web_url',
                'title' => 'Visite nosso site!',
                'parent_id' => 0,
                'value' => 'https://www.code.education/'
            ],
            [
                'id' => 3,
                'type' => 'web_url',
                'title' => 'Quer aprender laravel e vue?',
                'parent_id' => 1,
                'value' => 'https://sites.code.education/sv_02_laravel-vuejs/'
            ],
            [
                'id' => 4,
                'type' => 'postback',
                'title' => 'Quer ver as opções iniciais?',
                'parent_id' => 0,
                'value' => 'iniciar'
            ]
        ];

        foreach ($call_to_actions as $action) {
            $menu->callToAction($action['id'], $action['type'], $action['title'], $action['parent_id'], $action['value']);
        }


        $callSendApi = new CallSendApi('PAGE_ACCESS_TOKEN');
        $result = $callSendApi->make($menu->toArray(), CallSendApi::URL_PROFILE);

        $this->assertTrue(is_string($result));

    }
}