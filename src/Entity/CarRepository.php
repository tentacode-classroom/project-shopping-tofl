<?php

namespace App\Entity;

class CarRepository {

    private $cars;

    public function __construct() {
        $car1 = new Car();
        $car1->setId(1);
        $car1->setType('Ford Mustang');
        $car1->setNbSeats(4);
        $car1->setPrice(20000.00);
        $car1->setImage('mustang.jpeg');

        $car2 = new Car();
        $car2->setId(2);
        $car2->setType('Mercedes class A');
        $car2->setNbSeats(4);
        $car2->setPrice(55000.00);
        $car2->setImage('mercedes.png');

        $car3 = new Car();
        $car3->setId(3);
        $car3->setType('Renault Espace');
        $car3->setNbSeats(7);
        $car3->setPrice(1000.00);
        $car3->setImage('renault.jpg');

        $this->cars = [$car1, $car2, $car3];
    }

    public function findAll(): array {
        return $this->cars;
    }

    public function findOneById(int $id): Car {
        foreach ($this->cars as $car) {
            if ($car->getId() === $id) {
                return $car;
            }
        }
    }

}