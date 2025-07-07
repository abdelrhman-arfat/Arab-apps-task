<?php

namespace App\Service;

use App\Models\product;

class ProductService
{
  public static function getProductsAfterFiltering($filter)
  {
    $query = product::query();

    if (isset($filter['min_price'])) {
      $query->where('price', '>=', $filter['min_price']);
    }
    if (isset($filter['max_price'])) {
      $query->where('price', '<=', $filter['max_price']);
    }
    if (isset($filter['stock'])) {
      $query->where('stock', '>=', $filter['stock']);
    }
    if (isset($filter['in_stock'])) {
      $query->where('status', $filter['in_stock']);
    }
    if (isset($filter['category_id'])) {
      $query->where('category_id', $filter['category_id']);
    }
    if (isset($filter['sort_by'])) {
      $sortBy = explode(",", $filter['sort_by']);
      $query->orderBy($sortBy[0], $sortBy[1]);
    }

    return $query->get();
  }
}
