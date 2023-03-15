<?php
    # Import PHPMailer classes into the global namespace
    # These must be at the top of your script, not inside a function
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    # Load Composer's autoloader
    require_once 'phpmailer/vendor/autoload.php';

    class Mailer
    {
        public function sendMail($toEmail, $toName, $subject, $body, $fromEmail = USER_SMTP, $fromName = NAME_SMTP, $ccEmail = '')
        {
            ob_start();

            # Create an instance; passing 'true' enables exceptions
            $mail = new PHPMailer(true);

            try
            {
                # Server settings
                // $mail->SMTPDebug  = SMTP::DEBUG_SERVER;                     #Enable verbose debug output
                $mail->isSMTP();                                            #Send using SMTP
                $mail->Host       = HOST_SMTP;                              #Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   #Enable SMTP authentication
                $mail->Username   = USER_SMTP;                              #SMTP username
                $mail->Password   = PSWD_SMTP;                              #SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            #Enable implicit TLS encryption
                $mail->Port       = PORT_SMTP;                              #TCP port to connect to; use 587 if you have set 'SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS'

                # Recipients
                $mail->setFrom($fromEmail, $fromName);                      # add FROM: user
                $mail->addAddress($toEmail, $toName);                       # Add a recipient. Name is optional
                if (!empty($ccEmail)) { $mail->addCC($bccEmail); }          # Add optionals CC emails
                $mail->addBCC(USER_SMTP);                                   # Add BCC developver email for tests

                // $mail->addReplyTo('info@example.com', 'Information');
                // $mail->addCC('cc@example.com');
                // $mail->addBCC('bcc@example.com');

                # Attachments
                // $mail->addAttachment('/var/tmp/file.tar.gz');               #Add attachments
                // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');          #Optional name

                # Content
                $mail->isHTML(true);                                        #Set email format to HTML
                $mail->Subject = $subject;
                $mail->Body    = $body;
                // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                $mail->send();
                ob_end_clean();
                return true;
            } 

            catch (Exception $e)
            {
                # Server settings
                // $mail->SMTPDebug  = SMTP::DEBUG_SERVER;                     #Enable verbose debug output
                $mail->isSMTP();                                            #Send using SMTP
                $mail->Host       = HOST_SMTP;                              #Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   #Enable SMTP authentication
                $mail->Username   = USER_SMTP;                              #SMTP username
                $mail->Password   = PSWD_SMTP;                              #SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            #Enable implicit TLS encryption
                $mail->Port       = PORT_SMTP;                              #TCP port to connect to; use 587 if you have set 'SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS'

                # Recipients
                $mail->setFrom($fromEmail, $fromName);                      # add FROM: user
                $mail->addAddress($toEmail, $toName);                       # Add a recipient. Name is optional
                if (!empty($ccEmail)) { $mail->addCC($bccEmail); }          # Add optionals CC emails
                $mail->addBCC(USER_SMTP);                                   # Add BCC developver email for tests

                // $mail->addReplyTo('info@example.com', 'Information');
                // $mail->addCC('cc@example.com');
                // $mail->addBCC('bcc@example.com');

                # Attachments
                // $mail->addAttachment('/var/tmp/file.tar.gz');               #Add attachments
                // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');          #Optional name

                # Content
                $mail->isHTML(true);                                        #Set email format to HTML
                $mail->Subject = $subject;
                $mail->Body    = $body;
                // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                $m = $mail->send();
                ob_end_clean();
                if($m) { return true; }
                else{ return false; }
            }
        }
    }
?>