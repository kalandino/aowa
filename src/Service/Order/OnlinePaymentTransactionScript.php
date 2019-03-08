<?php

declare(strict_types = 1);

namespace Service\Order;

use Model;
use Service\User\ISecurity;
use Service\User\Security;
// use Symfony\Component\HttpFoundation\Session\SessionInterface;

class OnlinePaymentTransactionScript
{
    /**
     * Сессионный ключ списка всех продуктов корзины
     */
    private const PAYMENT_DATA_KEY = 'payment';

	/**
	 * @var SessionInterface
	 */
	private $session;

	/**
     * @var int платежные данные
     */
    private $data;

	/**
     * @var int сумма платежа
     */
    private $sum;


    /**
     * @param SessionInterface $session
     */
    // public function __construct(SessionInterface $session)
    // {
    //     $this->session = $session;
    // }

    /**
     * Проверка платежных данных
     *
     * @param PaymentData $data
     *
     * @return bool
     */
	public function checkPaymentData(PaymentData $data): bool
	{
		$this->data = $data;
		return !empty($this->data);
	}

    /**
     * Проверка средств на счете
     *
     * @return bool
     */
 	public function checkBalance(int $sum): bool
 	{

 	}

    /**
     * Блокировка средств на счете
     *
     * @return bool
     */
	public function holdSum(int $sum): bool
	{

	}

    /**
     * Списание суммы
     *
     * @return bool
     */
	public function approveSum(int $sum): bool
	{

	}

    /**
     * Оплата
     *
     * @return void
     */
	public function payment(): void
	{
		return;
	}

}