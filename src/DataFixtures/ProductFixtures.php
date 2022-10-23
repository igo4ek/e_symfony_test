<?php

namespace App\DataFixtures;

use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ProductFixtures extends Fixture
{
    private $fixtures = [
        [
            "name" => "Камень Ryzen 5 2600G",
            "price" => 15999.99
        ],
        [
            "name" => "Слойка со сгущёнкой",
            "price" => 45
        ],
        [
            "name" => "Виниловый проигрыватель",
            "price" => 8500.67
        ],
        [
            "name" => "Бумажный пакет для продуктов",
            "price" => 6.78
        ],
    ];
    public function load(ObjectManager $manager): void
    {
         foreach ($this->fixtures as $fixture) {
            $product = new Product();
            $product->setName($fixture["name"]);
            $product->setPrice($fixture["price"]);
            $manager->persist($product);
         }
         $manager->flush();
    }
}
