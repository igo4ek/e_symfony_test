<?php

namespace App\DataFixtures;

use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    private array $productFixtures = [
        [
            "id" => 1,
            "name" => "Камень Ryzen 5 2600G",
            "price" => 15999.99
        ],
        [
            "id" => 2,
            "name" => "Слойка со сгущёнкой",
            "price" => 45
        ],
        [
            "id" => 3,
            "name" => "Виниловый проигрыватель",
            "price" => 8500.67
        ],
        [
            "id" => 4,
            "name" => "Бумажный пакет для продуктов",
            "price" => 6.78
        ],
    ];
    public function load(ObjectManager $manager): void
    {
        foreach ($this->productFixtures as $productFixture) {
            $product = new Product();
            $product->setId($productFixture["id"]);
            $product->setName($productFixture["name"]);
            $product->setPrice($productFixture["price"]);
            $manager->persist($product);
        }
        $manager->flush();
    }
}
