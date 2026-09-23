<?php

namespace App\Models;

class Product
{
    public int $id;
    public int $parent_id = 0;
    public string $name;
    public string $slug;
    public ?string $sku = null;
    public ?string $short_description = null;
    public ?string $description = null;
    public float $regular_price = 0;
    public ?float $sale_price = null;
    public int $stock = 0;
    public ?string $thumbnail = null;
    public string $status = 'active';
}
