<table class="table table-responsive">
    <tr>
        <th>Номер заказа</th>
        <th>E-mail</th>
        <th>Телефон</th>
        <th>Сумма</th>
        <th>Книги</th>
        <th>Статус</th>
        <th>Действия</th>
    </tr>
    <?php foreach($orders as $order) { ?>
    <?php $books = explode(',', $order['books']); ?>
    <tr>
        <td><?=$order['order_key']?></td>
        <td><?=$order['email']?></td>
        <td><?=$order['phone']?></td>
        <td><?=$order['sum']?></td>
        <td>
            <?php foreach($books as $b){
                echo get_the_title($b)."<br>";
            }
            ?>
        </td>
        <td><?php if($order['pay'] == 1){
                echo "Оплачен";
            }
            else {
                echo "Ожидает оплаты";
            }?>
        </td>
        <td>
            <a href="/wp-admin/admin.php?page=orders&del=<?=$order['id']?>">Удалить</a>
        </td>
    </tr>
    <?php } ?>
</table>