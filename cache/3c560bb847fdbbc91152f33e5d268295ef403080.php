
<html>
    <body>
    <table border="1">
        <thead>
        <tr>
            <td><b>Sr.</b></td>
            <td><b>userId</b></td>
            <td><b>id</b></td>
            <td><b>title</b></td>
            <td><b>completed</b></td>
        </tr>
        </thead>
        <tbody>
        <?php $i=0;
        foreach($data as $row){
        ?>
        <tr>

            <td><?php echo e(++$i); ?></td>
            <td><?php echo e($row->userId); ?></td>
            <td><?php echo e($row->id); ?></td>
            <td><?php echo e($row->title); ?></td>
            <td><?php echo e($row->completed); ?></td>

        </tr>
            <?php
}
?>
        </tbody>
    </table>

    </body>
</html>
<?php /**PATH E:\Saqlain Khadim\Best-Practices and Repositries\Slim_first_project\resources\views/table.blade.php ENDPATH**/ ?>