<?php

/** @var \Model\Entity\Product[] $productList */
/** @var bool $isLogged */
/** @var \Closure $path */
$body = function () use ($isLogged, $path) {
    ?>
    <form method="post">
        <table cellpadding="10">
            <tr>
                <td colspan="3" align="center">Оплата произведена</td>
            </tr>
        </table>
    </form>
    <?php
};

$renderLayout(
    'main_template.html.php',
    [
        'title' => 'Покупка',
        'body' => $body,
    ]
);
