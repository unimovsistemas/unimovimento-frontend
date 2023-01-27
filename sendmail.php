<?php
    // Your email here
    $email = 'example@example.com';

    // Errors Object
    $serverErrors = array();
    // Recaptcha settings
    $use_recaptcha = false;
    define("RECAPTCHA_V3_SECRET_KEY", 'Place_Your_Secret_Key_Here');

    // Errors strings
    $name_error      = '*Invalid name (Only letters and white space allowed) <br>';
    $email_error     = '*Invalid email format <br>';
    $phone_error     = '*Invalid phone number <br>';
    $subject_error   = '*Please choose the subject <br>';
    $message_error   = '*Please write your message <br>';
    $recaptcha_error = '*You are Robot!';
 
    // Status strings
    $sent_message = 'Email Sent Successfully!';
    $send_error_message = 'Error, please try again...';

    // Email subject
    $email_subject = 'New message from ' . "[$_SERVER[HTTP_HOST]]";

    $post_data = "";

    $sender_email = '';

    function secure ($var){
        return stripslashes(htmlspecialchars($var));
    }

    //$form_data = json_decode( file_get_contets( 'php://input' ), true );

    foreach ($form_data as $key => $value){
        $value = secure($value);

        switch ($key){
            case 'name':
                if( !preg_match("/^[a-zA-Z ]*$/", $value) || empty($value) ) {
                    $serverErrors['errors'] .= $name_error;
                }
                else{
                    $post_data .= "<strong>$key:</strong> $value <br>";
                }
                break;
            case 'email':
                if( !filter_var($value, FILTER_VALIDATE_EMAIL) ) {
                    $serverErrors['errors'] .= $email_error;
                }
                else{
                    $post_data .= "<strong>$key:</strong> $value <br>";
                    $sender_email = $value;
                }
                break;
            case 'phone':
                if( empty($value) ){
                    $serverErrors['errors'] .= $phone_error;
                }
                else{
                    $post_data .= "<strong>$key:</strong> $value <br>";
                }
                break;
            case 'subject':
                if( empty($value) ){
                    $serverErrors['errors'] .= $subject_error;
                }
                else{
                    $post_data .= "<strong>$key:</strong> $value <br>";
                }
                break;
            case 'message':
                if( empty($value) ){
                    $serverErrors['errors'] .= $message_error;
                }
                else{
                    $post_data .= "<br><strong>$key:</strong> $value <br>";
                }
                break;
                case 'g-recaptcha-response':
                    if( !empty($value) ) $use_recaptcha = true;
                    break;
            default: if( !empty($value) ) $post_data .= "<strong>$key:</strong> $value <br>";
        }
    }
    // Recaptcha
    function recaptcha(){
        $token = $_POST['g-recaptcha-response'];

        // call curl to POST request
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,"https://www.google.com/recaptcha/api/siteverify");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(array('secret' => RECAPTCHA_V3_SECRET_KEY, 'response' => $token)));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);
        $arrResponse = json_decode($response, true);

        // verify the response
        if($arrResponse["success"] == '1' && $arrResponse["score"] >= 0.5)  return true;
        else return false;
    }

    // Recaptcha status check
    if( $use_recaptcha and !recaptcha() ) $serverErrors['errors'] .= $recaptcha_error;

    // Set and return status ERROR if anny errors found
    if( count($serverErrors) > 0 ) {
        $serverErrors['status'] = 'error';

        // Return JSON Errors
        echo json_encode($serverErrors, JSON_FORCE_OBJECT);
        exit;
    }
    else{
        /*
        * If no errors prepare and send email
        */

        if( !empty($sender_email) ){
            $sender = "{$sender_email} <noreply@{$_SERVER['HTTP_HOST']}>";
        }
        else{
            $sender = "{$email} <noreply@{$_SERVER['HTTP_HOST']}>";
        }

        // Setting up header
        $header  = 'MIME-Version: 1.0' . "\r\n";
        $header .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $header .= 'From: '.$sender."\r\n".
            'Reply-To: '.$sender."\r\n" .
            'X-Mailer: PHP/' . phpversion();

        //  $message = $post_data . "\n\n"."User IP: <a href='#'>User IP</a>" . $_SERVER['REMOTE_ADDR'] . "\n\n"  .date("H:i M.d.Y ")."\n";

        $message = '<html><body>';
        $message .= '<p style="display: block; max-width: 550px; font-size: 16px">'. $serverErrors['errors']. '</p>';
        $message .= '<br>';
        $message .= '<a href="https://iplocation.com/?ip='.$_SERVER['REMOTE_ADDR'].'" style="text-decoration: underline; color: #27AE60"><strong style="color: #27AE60">VIEW USER LOCALIZATION</strong></a>';
        $message .= '<p style="color: #999999; font-size: 14px"><strong>SENT:</strong> ' . date("H:i M.d.Y ") . '</p>';
        $message .= '<p style="color: #999999; font-size: 11px; margin-top: 50px;"> Powered by <span style="color: #EB3B5B">Simple AJAX Contact Form</span></p>';
        $message .= '</body></html>';

        // Verification before sending
        $verify = mail($email,$email_subject,$message,$header);

        // Return Server Response
        if ($verify == 'true'){
            echo json_encode( [ 'id' => 5 ], JSON_FORCE_OBJECT);
            exit;
        }
        else {
            echo json_encode( [ 'id' => '' ] , JSON_FORCE_OBJECT);
            exit;
        }
    }
