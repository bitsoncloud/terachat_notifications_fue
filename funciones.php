<?php

function tera_notif_follow($sent, $queue_item, $email_data, $headers){
    $orden = new WC_Order($email_data["order_id"]);
    $phone = $orden->get_billing_phone();
    $phoneFormatted = test_number($phone);
    $msg = "*".$email_data["subject"]."*\n";

    $cuerpo = html_entity_decode($email_data["message"], ENT_QUOTES | ENT_HTML5, "UTF-8");

    $msg .= strip_tags($cuerpo);
    if($msg != "") tera_notif_text_message($phoneFormatted, $msg);
}
add_filter("fue_send_queue_item", "tera_notif_follow", 10, 4);