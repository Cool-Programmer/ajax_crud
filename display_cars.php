<?php
require_once 'db.php';
$sql = "SELECT * FROM `cars` ORDER BY `name` ASC";
$q = mysqli_query($connection, $sql);
while ($row = mysqli_fetch_array($q)){?>
    <tr>
        <td><?php echo $row['id']?></td>
        <td><a href="javascript:void(0)" rel="<?php echo $row['id']; ?>" class="nameLink"><?php echo $row['name']?></a></td>
    </tr>
<?php } ?>



<script>
    //**********ACTION CONTAINER**********//
    //$('#action-container').hide();  // Hide the div initially
    $('.nameLink').on('click', function () { // When the element with the specific class is clicked
        $('#action-container').show();
        var id = $(this).attr('rel'); // Id of the car
        var url = 'process.php';  // Url of the processing page
        $.post('process.php', {id: id}, function (data) {
            $('#action-container').html(data);
        });
    });
</script>