<?php require_once(dirname(__FILE__).'/head.php'); ?>
<?php require_once(dirname(__FILE__).'/header.php'); ?>
<table>
    <?php foreach($data as $key => $value): ?>
        <tr>
            <th>id</th>
            <td><?= $value['id'] ?></td>
        </tr>
        <tr>
            <th>name</th>
            <td><?= $value['name'] ?></td>
        </tr>
    <?php endforeach; ?>

</table>
<?php require_once(dirname(__FILE__).'/footer.php'); ?>