<?php

declare(strict_types = 1);

namespace Service\Product;

use Model;

class ProductDecorator extends Product
{
    /**
     * Получаем информацию по конкретному продукту
     *
     * @param int $id
     *
     * @return Model\Entity\Product|null
     */
    public function getInfo(int $id): ?Model\Entity\Product
    {
        $product = $this->getProductRepository()->search([$id]);
        return count($product) ? $product[0] : null;
    }
}
