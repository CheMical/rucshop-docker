<?php

namespace RUCshop;

class RUCshop {
  private array $items;
  private Basket $basket;

  public function __construct() {
    $this->basket = new Basket();
    $this->items = array();
    $this->items[1] = new ShopItem(1, 'Item 1', 95);
    $this->items[2] = new ShopItem(2, 'Item 2', 5);
    $this->items[3] = new ShopItem(3, 'Item 3', 10);
    $this->items[4] = new ShopItem(4, 'Item 4', 123);
  }

  public function printItemList($items) {
    $output = '<ul>';

    foreach ($items as $item) {
      $output .= "<li>{$item->getName()} ( {$item->getPrice()} ) <a href=\"?add={$item->getId()}\">Add</a></li>\n";
    }

    $output .= '</ul>';
    return $output;
  }

  public function printBasket(Basket $basket, $items) {
    $orderedItems = array();

    foreach ($items as $item) {
      $orderedItems[$item->getId()] = $item;
    }

    $content = $basket->listContent();
    $output = '<ul>';

    foreach ($content as $id => $count) {
      $subtotal = $orderedItems[$id]->getPrice() * $count;
      $item = $orderedItems[$id];
      $output .= "<li>{$item->getName()} ( {$item->getPrice()} ) <a href=\"?add={$item->getId()}\">Add</a> <a href=\"?remove={$item->getId()}\">Remove</a> Count: $count Price: $subtotal</li>\n";
    }

    $output .= '</ul>';
    return $output;
  }

  public function printShop() {
    $output = '<h1>RUCshop</h1>';
    $output .= '<h2>Shop items</h2>';
    $output .= $this->printItemList($this->items);
    $output .= '<h2>Basket</h2>';
    $output .= $this->printBasket($this->basket, $this->items);
    $output .= '<h3>Total</h3>';
    $output .= $this->basket->getTotal();
    return $output;
  }

  public function putInBasket($itemId) {
    $this->basket->addItem($this->items[$itemId]);
  }

  public function removeFromBasket($itemId) {
    $this->basket->removeItem($this->items[$itemId]);
  }

}
