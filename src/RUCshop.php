<?php

namespace RUCshop;

class RUCshop {
  private array $items;
  private RUCshop\Basket $basket;

  public function __construct() {
    $this->$items = array();
    $this->$items[] = new RUCshop\ShopItem(1, 'Item 1', 95);
    $this->$items[] = new RUCshop\ShopItem(2, 'Item 2', 5);
    $this->$items[] = new RUCshop\ShopItem(3, 'Item 3', 10);
    $this->$items[] = new RUCshop\ShopItem(4, 'Item 4', 123);
  }

  public function printItemList($items) {
    $output = '<ul>';

    foreach ($items as $item) {
      $output .= "<li>{$item->getName()} ( {$item->getPrice()} ) <a href=\"?add={$item->getId()}\">Add</a></li>\n";
    }

    $output .= '</ul>';
    return $output;
  }

  public function printBasket(RUCshop\Basket $basket, $items) {
    $orderedItems = array();

    foreach ($items as $item) {
      $orderedItems[$item->getId()] = $item;
    }

    $content->listContent();
    $output = '<ul>';

    foreach ($content as $id => $count) {
      $output .= "<li>{$orderedItems[$id]->getName()} ( {$item->getPrice()} ) <a href=\"?add={$item->getId()}\">Add</a> <a href=\"?remove={$item->getId()}\">Remove</a> Count: $count Price: {$orderedItems[$id]->getPrice() * $count}</li>\n";
    }

    $output .= '</ul>';
    return $output;
  }

  public function printShop() {
    $output = '<h1>RUCshop</h1>';
    $output .= '<h2>Items</h2>';
    $output .= $this->printItemList();
    $output .= '<h2>Basket</h2>';
    $output .= $this->printBasket();
    return $output;
  }
}
