<?php
/**
 * Created by PhpStorm.
 * User: estevao
 * Date: 13/02/18
 * Time: 13:20
 */

namespace CodeBot;


use PHPUnit\Framework\TestCase;
use CodeBot\Build\Solid;

class BotTest extends TestCase
{

    private $pageAccessToken = 'EAACTuKy5EXMBAPrUKZBEzZAFNfDUz7yaSDynQY44BwmuCOw2h181FZBfMwTqXuxS3Ih6qoiAasAf6LTli2FdpQLffRX6DZC3lnyXAxGqSvSCoulE0d5q1EpGOKwgAmlM6RjhkIUrG2UrIZB7LK0KLHzLGn7fw0VtlQk89C7BYYZBUaIuuCujhb';

    public function testAddMenu()
    {

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

        $bot = Solid::factory();
        Solid::pageAccessToken($this->pageAccessToken);
        $bot->addMenu('default', false, $call_to_actions);

    }

    public function testRemoveMenu()
    {
        $bot = Solid::factory();
        Solid::pageAccessToken($this->pageAccessToken);
        $bot->removeMenu();


    }


    public function testAddGetStartedButton()
    {
        $bot = Solid::factory();
        Solid::pageAccessToken($this->pageAccessToken);
        $bot->addGetStartedButton('iniciar');

    }

    public function testRemoveGetStartedButton()
    {
        $bot = Solid::factory();
        Solid::pageAccessToken($this->pageAccessToken);
        $bot->removeGetStartedButton();


    }

}