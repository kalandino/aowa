<?php

namespace Comparator;

use Composer\Semver\Comparator;

interface IComparator
{
	public function compare(array $elements);
}