<?php

namespace Alialbair\BelajarPhpUnitTest;



interface ProductRepository{
    function save(Product $product):Product;

    function delete(Product $product): void;

    function findById(string $id): ?Product;

    function findAll():array;
}
?>