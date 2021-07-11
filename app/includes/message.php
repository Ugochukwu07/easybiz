<?php if (isset($_SESSION['message'])): ?>
<div class='col-12 p-2 <?php echo $_SESSION['type'];?> text-center'>
<p><?php echo $_SESSION['message'];?></p>
<span class="text-white p-2 border  d-inline-block border-white rounded"><?php echo ucwords('refresh page to clear this prompt.') . 'Thank You'; ?></span>
</div>
<?php 
unset($_SESSION['message']);
unset($_SESSION['type']);
?>
<?php endif; ?>
