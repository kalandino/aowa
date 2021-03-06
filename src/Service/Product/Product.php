<?php

declare(strict_types = 1);

namespace Service\Product;

use Model;

class Product
{
    /**
     * Получаем все продукты
     *
     * @param string $sortType
     *
     * @return Model\Entity\Product[]
     */
    public function getAll(string $sortType): array
    {
        $productList = $this->getProductRepository()->fetchAll();
        $collection = new ProductCollection();

        // Применить паттерн Стратегия
        // Сортировка по цене
        if ($sortType === 'price') {
            $productList = $collection->sort(new PriceComparator​(), $productList);
        }
        // Сортировка по имени
        if ($sortType === 'name') {
            $productList = $collection->sort(new NameComparator(), $productList);
        }

        return $productList;
    }

    /**
     * Фабричный метод для репозитория Product
     *
     * @return Model\Repository\Product
     */
    protected function getProductRepository(): Model\Repository\Product
    {
        return new Model\Repository\Product();
    }

}
