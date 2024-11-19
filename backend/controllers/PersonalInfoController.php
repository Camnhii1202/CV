<?php
require_once "models/PersonalInfo.php";

class PersonalInfoController
{
    public function updateInfoView()
    {
        //GET
        if ($_SERVER['REQUEST_METHOD'] === "GET") {
            $view = "views/updateInfo.php";
            $personalInfo = new PersonalInfo();
            $info = $personalInfo->getPersonalInfo();
            require "views/layout.php";
        }

        //POST
        elseif ($_SERVER['REQUEST_METHOD'] === "POST") {
            if (isset($_GET['id'], $_POST['name'], $_POST['email'], $_POST['phone'], $_POST['address'], $_POST['bio'], $_POST['apply_position'], $_POST['linkedin_account'], $_POST['linkedin'])) {

                $id = $_GET['id'];
                $name = $_POST['name'];
                $email = $_POST['email'];
                $phone = $_POST['phone'];
                $address = $_POST['address'];
                $bio = $_POST['bio'];
                $apply_position = $_POST['apply_position'];
                $linkedinAccount = $_POST['linkedin_account'];
                $linkedin = $_POST['linkedin'];

                $personalInfoModel = new PersonalInfo();
                $result = $personalInfoModel->updatePersonalInfo($id, $name, $email, $phone, $address, $bio, $apply_position, $linkedin, $linkedinAccount);

                if ($result >= 0) {
                    header("Location: editCV?status=success&object=personalInfo&action=update");
                    exit;
                } else {
                    echo "Cập nhật thông tin thất bại";
                }
            } else {
                echo "Missing required form fields.";
            }
        }
    }

}



?>