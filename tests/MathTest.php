<?php

namespace Alialbair\BelajarPhpUnitTest;

use PHPUnit\Framework\TestCase;

class MathTest extends TestCase{

    //manual
    public function testManual(){
        self::assertEquals(10, Math::sum([5, 5]));
        self::assertEquals(20, Math::sum([4, 4, 4, 4, 4]));
        self::assertEquals(9, Math::sum([3, 3, 3]));
        self::assertEquals(0, Math::sum([]));
        self::assertEquals(2, Math::sum([2]));   
    }

    //menggunakan data provider phpunit
    //satu x gagal, gagal semua
    /**
     * @dataProvider mathSumData
     */
    public function testDataProvider(array $values, int $expected){
        self::assertEquals($expected, Math::sum($values));
    } 

    //satu kali gagal tidak gagal semua
    public function mathSumData():array{
        return [
            [[5,5],10],
            [[4,4,4,4,4], 20],
            [[3,3,3], 9],
            [[], 0],
            [[2], 2],
        ];
    }

    //cara yang lainya yaitu  @testWith, duganakan hanya untuk kasus sederhana, jika kompleks pakai data provider
    /**
     * @testWith [[5,5],10]
     *      [[4,4,4,4,4], 20]
     *       [[3,3,3], 9]
     *      [[], 0]
     *       [[2], 2]
     */
    public function testWith(array $values, int $expected){
        self::assertEquals($expected, Math::sum($values));
    }
}
?>