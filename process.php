<?php
require_once 'db.php';
if (isset($_POST['id'])){
    $id = $_POST['id'];
    $sql = "SELECT * FROM `cars` WHERE `id` = '".$id."'";
    $q = mysqli_query($connection, $sql);
    if (!empty($q)){
        $row = mysqli_fetch_array($q); ?>
        <input type="text" class="form-control carId titleInput" rel="<?php echo $row['id'] ?>" value="<?php echo $row['name']?>">
        <br>
        <input type="button" value="Update" class="btn btn-success update">
        <input type="button" value="Delete" class="btn btn-danger delete">
        <?php
    }
}

?>
<script>
    $(document).ready(function () {
        var updatethis = "update";
        var deletethis = "delete";
        // Grabbing the id and the name like Trump
        $('.titleInput').on('input', function () {
            // Update
            $('.update').on('click', function () {
                var id = $(this).attr('rel');
                var title = $(this).val();
                $.post('process.php', {id: id, title: title, updatethis: updatethis}, function (data) {
                    $('#feedback').text('Car details updated successfully!');
                })
            });
        });
            // Delete
            $('.delete').on('click', function () {
                var delId = $('.nameLink').attr('rel');
                $.post('process.php', {id: delId, deletethis: deletethis}, function (data) {
                    $('#feedback').text('Car deleted!');
                    $('#action-container').hide()
                })
            })

    })    
</script>

<?php
    if (isset($_POST['updatethis'])){
        $title = $_POST['title'];
        $id = $_POST['id'];
        $sql = "UPDATE `cars` SET `name`= '$title' WHERE `id` = $id";
        $q = mysqli_query($connection, $sql);
        if(!$q){
            die('Query failed' . mysqli_error($connection));
        }
    }

    if (isset($_POST['deletethis'])){
        $id = $_POST['id'];
        $sql = "DELETE FROM cars WHERE `id`=$id";
        $q = mysqli_query($connection, $sql);
        if(!$q){
            die('Query failed' . mysqli_error($connection));
        }
    }
