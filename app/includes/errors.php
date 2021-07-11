<?php if (count($errors) > 0): ?>
        <div class="col-12 error p-2">
<?php foreach ($errors as $error): ?>
            <li style="list-style: none;"><i class="fa fa-exclamation-triangle text-white"></i>&nbsp;&nbsp;<?php echo $error; ?></li>
<?php endforeach; ?>
        </div>
<?php endif; ?>