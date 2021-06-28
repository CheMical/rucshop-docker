<?php

namespace RUCshop;

class ShopItem implements RUCshop\Item {
  private int $id;
  private string $name;
  private int $price;

  public function __construct(int $id, string $name, int $price) {
    $this->$id = $id;
    $this->$name = $name;
    $this->$price = $price;
  }

  public function updatePrice($newPrice) {
    $this->$price = $newPrice;
  }

  public function getPrice() {
    return $this->$price;
  }

  public function getName() {
    return $this->$name;
  }

  public function getId() {
    return $this->$id;
  }
}
