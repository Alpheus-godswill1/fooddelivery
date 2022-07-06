<?php include "./config.inc.php";?>
<?php 

function Send_email(){
    global $connect;
    if(isset($_POST['submit'])){

        //  Getting Data From Form.

        $email_name = mysqli_real_escape_string($connect, $_POST['email_name']);
        $email_services  = mysqli_real_escape_string($connect, $_POST['service']);
        $email_address =mysqli_real_escape_string($connect, $_POST['email_address']);
        $home_address = mysqli_real_escape_string($connect, $_POST['home_address']);
        $email_phone = mysqli_real_escape_string($connect,$_POST['phone']);
        $email_content = mysqli_real_escape_string($connect, $_POST['message']);

            //preparing a PHP function 
            //must have at least three parameters
            //1. Email which mail is to be sent to.
            //2. Subject of the mail
            //3. Message or content of the mail gotten from the person
            $mailTo = "cuspeculiary1@gmail.com";
            $headers = "From: " . $email_address;
            $email_reason = "You have received an e-mail from: ". $email_name .".\n\n"." Whose phone number is : ".$email_phone.".\n\n".$email_content. ".\n\n". " Address Of Client: "."\n\n".$home_address;

         
        $sql = "INSERT INTO email_delivered(email_name,email_services,email_address,email_home_address,email_phone,email_content) VALUES('$email_name','$email_services','$email_address','$home_address','$email_phone','$email_content')";
        $result = mysqli_query($connect,$sql);
        if (isset($result)) {
            mail($mailTo, $email_services, $email_reason,$header);
            header("Location: ../contacts.php?email_was_sent_to_admin.");
        }
    }
}
Send_email();



?>