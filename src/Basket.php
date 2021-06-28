<?php

namespace RUCshop;

class Basket {
  private array $content;

  public function __construct() {
    $this->$content = array();
  }

  public function addItem(RUCshop\Item $item) {
    array_push($this->$content, $item);
  }

  public function removeItem(RUCshop\Item $item) {
    foreach ($this->$content as &$element) {
      if ($item === $element) {
        unset($element);
        break;
    }
  }
  
  public function listContent() {
    $orderedContent = array();

    foreach ($this->$content as $element) {
      $id = $element->getId();

      if (empty($orderedContent[$id]) {
        $orderedContent[$id] = 1;
      }
      else {
        $orderedContent[$id] += 1
      }
    }

    return $orderedContent;
  }

  public function getTotal() {
    $total = 0;

    foreach ($this->$content as $element) {
      $total += $element->getPrice();
    }

    return $total;
  }
}
