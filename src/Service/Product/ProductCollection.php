<?php

namespace Service\Product;

use Comparator\IComparator;

class ProductCollection
{
	public function sort(IComparator $comparator, array $product): array
	{
		echo 'Некоторая бизнес-логика';
		return $comparator->compare($product);
	}
}