<?php
if (isset($_SESSION['error_message'])) { ?>
<div class="alert alert-danger">
    <?= $_SESSION['error_message'] ?>
</div>
<?php
    unset($_SESSION['error_message']);
}
?>
