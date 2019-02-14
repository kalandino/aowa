<?php

namespace Comparator;

class NameComparator implements IComparator 
{
	public function compare(array $elements)
	{
		echo 'Сравниваем по имени';
	} 
}