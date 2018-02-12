<?php
/**
 * Created by PhpStorm.
 * User: estevao
 * Date: 12/02/18
 * Time: 15:16
 */

namespace CodeBot\TemplatesMessage;


use CodeBot\Element\Button;
use CodeBot\Element\Product;
use PHPUnit\Framework\TestCase;

class GenerericTemplateTest extends TestCase
{

    public function testListaComDoisProdutos()
    {


        $button = new Button('web_url', null, 'https://angular.io/');
        $product = new Product('Produto 1', 'https://angular.io/assets/images/logos/angular/angular.svg', 'Curso de angular', $button);

        $button2 = new Button('web_url', null, 'http://www.php.net/');
        $product2 = new Product('Produto 2', 'http://php.net/images/logos/php-logo.svg', 'Curso de PHP', $button2);


        $template = new GenericTemplate(1234);
        $template->add($product);
        $template->add($product2);

        $actual = $template->message('qwe');

        $expected = [
            'recipient' => [
                'id' => 1234
            ],
            'message' => [
                'attachment' => [
                    'type' => 'template',
                    'payload' => [
                        'template_type' => 'generic',
                        'elements' => [
                            [
                                'title' => 'Produto 1',
                                'subtitle' => 'Curso de angular',
                                'image_url' => 'https://angular.io/assets/images/logos/angular/angular.svg',
                                'default_action' => [
                                    'type' => 'web_url',
                                    'url' => 'https://angular.io/'
                                ]
                            ],
                            [
                                'title' => 'Produto 2',
                                'subtitle' => 'Curso de PHP',
                                'image_url' => 'http://php.net/images/logos/php-logo.svg',
                                'default_action' => [
                                    'type' => 'web_url',
                                    'url' => 'http://www.php.net/'

                                ]
                            ]
                        ]

                    ]
                ]
            ]
        ];

        $this->assertEquals($expected, $actual);
    }

}