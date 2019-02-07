1. Фабричный метод используется:
	в методе getProductRepository() классе Service\Product\Product,
	в методе getUserRepository() классе Service\User\Security.
	Фабричный метод применяется для создания объектов с определенным интерфейсом, реализации которого предоставляются потомками. Удобно менять класс-родитель всего в одном месте кода.

2. Реализовано в классе Model\Repository\Product.

3. Реализовано в классе Service\Order\Basket.
	Добавлен класс Service\Order\BasketBuilder.
	Добавлен класс Service\Order\Checkout.