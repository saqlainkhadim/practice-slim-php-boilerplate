
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

            <td>{{++$i}}</td>
            <td>{{$row->userId}}</td>
            <td>{{$row->id}}</td>
            <td>{{$row->title}}</td>
            <td>{{$row->completed}}</td>

        </tr>
            <?php
}
?>
        </tbody>
    </table>

    </body>
</html>
