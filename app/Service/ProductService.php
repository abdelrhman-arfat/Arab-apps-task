<?php

namespace App\Service;

use App\Models\product;

class ProductService
{
  public static function getProductsAfterFiltering($filter)
  {
    $query = product::query();

    if (isset($filter['name'])) {
      $query->where('name', 'like', '%' . $filter['name'] . '%');
    }
    if (isset($filter['min_price'])) {
      $query->where('price', '>=', $filter['min_price']);
    }
    if (isset($filter['max_price'])) {
      $query->where('price', '<=', $filter['max_price']);
    }
    if (isset($filter['stock'])) {
      $query->where('stock', '>=', $filter['stock']);
    }

    return $query->get();
  }
}
