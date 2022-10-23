<?php

namespace App\DataFixtures;

use App\Entity\Customer;
use App\Entity\Ord;
use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    private array $customerFixtures = [
      [
          "id" => 1,
          "name" => "Игорь",
          "email" => "wawka2002@gmail.com"
      ]
    ];
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
            "name" => "ОЗУ Goodram DDR4 8Gb",
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
        foreach ($this->customerFixtures as $customerFixture) {
            $customer = new Customer();
            $customer->setId($customerFixture["id"]);
            $customer->setName($customerFixture["name"]);
            $customer->setEmail($customerFixture["email"]);
            $manager->persist($customer);
        }
        foreach ($this->productFixtures as $productFixture) {
            $product = new Product();
            $product->setId($productFixture["id"]);
            $product->setName($productFixture["name"]);
            $product->setPrice($productFixture["price"]);
            $manager->persist($product);
        }

        $ord = new Ord();
        $ord->setId(1);
        $ord->addProduct(1,2,3)
        $manager->flush();
    }
}
