<?php

namespace App\Services;

use App\Repositories\ProductRepository;

class ProductService
{
    private ProductRepository $productRepository;

    public function __construct()
    {
        $this->productRepository = new ProductRepository();
    }

    public function getFeaturedFlowers(int $limit = 8): array
    {
        return $this->productRepository->getFeatured($limit);
    }
}
