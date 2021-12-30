<?php

namespace Alialbair\BelajarPhpUnitTest;

use Exception;
use PhpParser\Builder\Function_;
use PHPUnit\Framework\TestCase;

class ProductServiceTest extends TestCase{
    private ProductRepository $repository;
    private ProductService $service;

    protected function setUp(): void
    {
        $this->repository = $this->createStub(ProductRepository::class); // createStub() ini adalah cara membuat dummy objek pada kelas, jika kelas yang mau kita test berhubungan dengan class lain
        $this->service = new ProductService($this->repository); // ini class yang mau di test
    }

    //configuration stub(InvocationStubber).
    public function testStub(){
        $product = new Product();
        $product->setId("1");

        $this->repository->method("findById")
            ->willReturn($product);
        
        $result = $this->repository->findById("1");
        // var_dump($result);
        self::assertSame($product, $result);
    }

    //StubMap / Map digunakan ketika ada kondisi contoh jika set 1 balikannya apa? set 2 balikannya apa? 
    public function testStubMap(){
        $product1 = new Product();
        $product1->setId("1");
        
        $product2 = new Product();
        $product2->setId("1");

        //bikin map
        $map = [
            ["1", $product1],
            ["2", $product2],
        ];

        $this->repository->method("findById")
        ->willReturnMap($map);

        self::assertSame($product1, $this->repository->findById("1"));
        self::assertSame($product2, $this->repository->findById("2"));
    }

    //selain map bisa menggunakan callback
    public function testStubCallBack(){
        $this->repository->method("findById")
            ->willReturnCallback(function (string $id){
                $product = new Product();
                $product->setId($id);
                return $product;
            });
            
            self::assertEquals("1", $this->repository->findById("1")->getId());
            self::assertEquals("2", $this->repository->findById("2")->getId());
            self::assertEquals("3", $this->repository->findById("3")->getId());
    }

    public function testRegisterSuccess(){
        $this->repository->method("findById")->willReturn(null);
        $this->repository->method("save")->willReturnArgument(0);

        $product = new Product();
        $product->setId("1");
        $product->setName("Contoh");

        $result = $this->service->register($product);

        self::assertEquals($product->getId(), $result->getId());
        self::assertEquals($product->getName(), $result->getName());
    }

    public function testRegisterException(){
        $this->expectException(\Exception::class);

        $productInDB = new Product();
        $productInDB->setId("1");
        
        $this->repository->method("findById")->willReturn($productInDB);

        $product = new Product();
        $product->setId("1");

        $this->service->register($product);
    }

    public function testDeleteSuccess(){
        $product = new Product();
        $product->setId("1");

        $this->repository->method("findById")->willReturn($product);

        $this->service->delete("1");
        self::assertTrue(true, "Success Delete");
    }

    public function testDeleteException(){
        $this->expectException(\Exception::class);
        $this->repository->method("findById")->willReturn(null);

        $this->service->delete("1");
    }
//ada permasalah jika menggunakan stab contoh 
//hapus tambahkan $this->repository->delete($product); pada pruduct service dan run, hasilnya tetap sukses
//karna kita tidak tau berapa banyak interaksi method di stabnya.
//solusinya menggunakan Mock Object / createMock() bukan stab /createStab
//Mock Object adalah improvment dari stab
//Mock trait dan abstract class
//menggunakan getMockForTrait(trait) dan getMockForAbstract(abstractClass)
}

?>