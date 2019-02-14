<?php

namespace Comparator;

class PriceComparator implements IComparator
{
	public function compare(array $elements)
	{
		echo 'Сравниваем по цене'; 
	}
}