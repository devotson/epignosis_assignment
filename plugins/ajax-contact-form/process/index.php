<?php
    
    // Bringing in wordpress  functionality (sanitize funcs etc.)
    $path = preg_replace('/wp-content.*$/', '',__DIR__);
    require_once($path."wp-load.php"); 

    if (isset($_POST['submit'])) :
        
        $firstname = sanitize_text_field($_POST['firstname']);
        $lastname = sanitize_text_field($_POST['lastname']);
        $email = sanitize_email($_POST['formemail']);
        $comments = sanitize_textarea_field($_POST['formtextarea']);
    
    endif;

    $to = 'stkatso@gmail.com';
    $subject = 'Test email from ajax form';
    $message = '<br><br>' . $comments;
    $headers = 'From: '. $email . "\r\n" . 
    'Reply-To: ' . $email . "\r\n";

    $success = wp_mail($to, $subject, $message, $headers);

    $return = [];
    if ($success) :
        $return['success'] = 1;
        $return['message'] = 'Email successfully sent';
    else :
        $return['success'] = 0;
        $return['message'] = 'There was an error sending the email';
    endif;

    echo json_encode($return);

?>