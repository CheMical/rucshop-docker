<?php

namespace RUCshop;

interface Item {
  public function updatePrice($price);
  public function getPrice();
  public function getName();
  public function getId();
}

