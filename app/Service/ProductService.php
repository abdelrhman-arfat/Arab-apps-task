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
      $sortSetting = explode(",", $filter['sort_by']);
      $canSortBy = ['price', 'created_at'];
      $canOrderBy = ['asc', 'desc'];

      $sortBy = null;
      $orderBy = null;

      if (isset($sortSetting[0]) && in_array($sortSetting[0], $canSortBy)) {
        $sortBy = $sortSetting[0];
      }

      if (isset($sortSetting[1]) && in_array($sortSetting[1], $canOrderBy)) {
        $orderBy = $sortSetting[1];
      }

      if ($sortBy && $orderBy) {
        $query->orderBy($sortBy, $orderBy);
      }
    }

    return $query->with('category')->get();
  }
}
