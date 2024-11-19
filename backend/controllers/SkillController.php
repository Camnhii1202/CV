<?php
require_once "models/Skill.php";

class SkillController
{

    public function addSkill()
    {
        //GET
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $view = "views/updateSkill.php";
            $action = "add";
            require "views/layout.php";
        }

        //POST
        elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['skill_name'], $_POST['proficiency_level'])) {
                $skillName = $_POST["skill_name"];
                $proficiencyLevel = $_POST["proficiency_level"];

                $skillModel = new Skill();
                $result = $skillModel->addSkill($skillName, $proficiencyLevel);
                if (is_numeric($result)) {
                    header("Location: editCV?status=success&object=skill&action=add");
                    exit;
                } else {
                    echo "Thêm kỹ năng thất bại";
                }
            } else {
                echo "Missing required form fields.";
            }
        }
    }
    public function updateSkill()
    {

        //GET
        if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET["id"])) {
            $view = "views/updateSkill.php";
            $action = "update";
            $id = $_GET["id"];

            $skillModel = new Skill();
            $skill = $skillModel->getSkill($id);
            require "views/layout.php";
        }

        //POST
        elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['skill_name'], $_POST['proficiency_level'], $_GET["id"])) {
                $skillName = $_POST["skill_name"];
                $proficiencyLevel = $_POST["proficiency_level"];
                $id = $_GET["id"];

                $skillModel = new Skill();
                $result = $skillModel->updateSkill($id, $skillName, $proficiencyLevel);
                if ($result >= 0) {
                    header("Location: editCV?status=success&object=skill&action=update");
                    exit;
                } else {
                    echo "Cập nhật kỹ năng thất bại";
                }
            } else {
                echo "Missing required form fields.";
            }
        }

    }

    public function deleteSkill()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET["id"])) {
            $id = $_GET["id"];
            $skillModel = new Skill();
            $result = $skillModel->deleteSkill($id);

            if ($result > 0) {
                header("Location: editCV?status=success&object=skill&action=delete");
                exit;
            } else {
                echo "Xóa kỹ năng thất bại";
            }
        }
    }

}



?>