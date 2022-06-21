<?php


/**
 * Dit is de testclass voor de countries controller class
 */


namespace TDD\Test;

require dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

use PHPUnit\Framework\TestCase;
use mvcexamen\controllers\Actieveleering;


 class countriesTest extends TestCase
 {
   /**
    * @dataProvider provideSayMyName
    */
    public function testSayMyName($input,$expected)
    {
        $artikels = new Actieveleerling();
        $output = $artikels->sayMyName($input);
        $message = "Er moet uitkomen: 'Mijn naam is: $input'";

        $this->assertEquals($expected,
                            $output,
                            $message);

    }

    public function provideSayMyName(){
      return [
         'test1' => ['Tjardo', 'Hallo mijn naam is: Tjardo'],
         'test2' => ['Luuc', 'Hallo mijn naam is: Luuc'],
         'test3' => ['Tom', 'Hallo mijn naam is: Tom']

      ];
    }
 }