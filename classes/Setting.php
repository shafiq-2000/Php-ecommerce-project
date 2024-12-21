<?php
include_once __DIR__ . '/../config/config.php';


class Setting extends connection
{
    public function update_setting($data)
    {
        $name = ucwords($data['name']);
        $number = $data['number'];
        $numberop = $data['numberop'];
        $address = ucwords($data['address']);
        $fax = $data['fax'];
        $email = $data['email'];
        $city = ucwords($data['city']);
        $postalcode = $data['postalcode'];
        $country = ucwords($data['country']);
        $fb = $data['fb'];
        $instra = $data['instra'];
        $google = $data['twitter'];
        $twitter = $data['twitter'];


        $sql = "UPDATE `company_info` SET `c_name`='$name',`number`='$number',`A_number`='$numberop',`address`='$address',`fax`='$fax',`email`='$email',`city`='$city',`postal_code`='$postalcode',`country`='$country',`facebook`='$fb',`instragram`='$instra',`google`='$google',`twitter`='$twitter'";

        $result = $this->con->query($sql); //OOp style
        if ($result) {

            echo "<script>localStorage.setItem('data_insert', 'true'); window.location.href='../index.php';</script>";
        }
    }

    public function get_setting()
    {
        $sql = "SELECT * FROM `company_info`";
        $result = $this->con->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                return $row;
            }
        };
    }

    public function contact($contact)
    {

        $name = ucwords($contact['name']);
        $email = $contact['email'];
        $phone = $contact['phone'];
        $subject = $contact['subject'];

        $sql = "INSERT INTO `contact_tbl`(`name`, `email`, `phone`, `subject`) VALUES ('$name','$email','$phone','$subject')";
        $result = $this->con->query($sql);
        if ($result) {
            echo "<script>localStorage.setItem('contact', 'true'); window.location.href='index.php';</script>";
        }
    }
}
