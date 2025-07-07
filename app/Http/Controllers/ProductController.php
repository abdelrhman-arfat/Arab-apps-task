<?php

namespace App\Http\Controllers;

use App\Service\CacheService;
use App\Service\ProductService;
use App\Service\ResponseService;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function getProductAfterFiltering(Request $request)
    {
        $filter = $request->all();
        $ttl = 60 * 10; // 10 minutes 'Time to Live'
        $cacheKey = CacheService::setCacheKey("product", ($filter));
        $products = CacheService::remember($cacheKey, $ttl,  function () use ($filter) {
            return ProductService::getProductsAfterFiltering($filter);
        });
        return response()->json(ResponseService::success($products, "Products fetched successfully"));
    }
}
