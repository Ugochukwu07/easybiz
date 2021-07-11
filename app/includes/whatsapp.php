<?php 
    $text = 'Hello ' . $store['bname'] . '. ' . 'I saw your online store at eazybiz.com and am interested in one of your product.' . ' ############################# # Product Id: ' . $product['id'] . 
            '# Product name: ' . $product['name'] . ' 
            # Old Price: ' . $product['price_old'] . ' 
            # New Price: ' . $product['price_new'] . ' 
            # 
            # My name is ___________.';
    $url = whatsapp($store['bphone'], $text);
?>