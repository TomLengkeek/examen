<?php
/**
 * Dit is de testclass voor de countries controller class
 */

require dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

use PHPUnit\Framework\TestCase;

 class countriesTest extends TestCase
 {
   /**
    * @dataProvider provideSayMyName
    */
    public function testSayMyName($input,$expected)
    {
        $artikels = new Wagenparken();
        $output = $artikels->sayMyName($input);
        $message = "Er moet uitkomen: 'Mijn naam is: $input'";

        $this->assertEquals($expected,
                            $output,
                            $message);

    }

    public function provideSayMyName(){
      return [
         'test1' => ['Ruud', 'Hallo mijn naam is: Ruud'],
         'test2' => ['Luuc', 'Hallo mijn naam is: Luuc'],
         'test3' => ['Leo', 'Hallo mijn naam is: Leo']

      ];
    }
 }