<div class="container mt-5">
 <?php if (isset($_SESSION['alert']) && is_array($_SESSION['alert'])) { ?>
    <?php if($_SESSION['alert']['success']??false) { ?>
        <div class="alert alert-success" role="alert">
            <?= $_SESSION['alert']['message'] ?>
        </div>
    <?php }else{ ?>
        <div class="alert alert-danger" role="alert">
            <?= $_SESSION['alert']['message'] ?>
        </div>
    <?php } ?>    
<?php 
$_SESSION['alert'] = null;
} ?>   
</div>
