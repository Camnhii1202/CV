<?php
require_once "models/Experience.php";

class ExperienceController
{

    public function addExperience()
    {
        //GET
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $view = "views/updateExperience.php";
            $action = "add";

            require "views/layout.php";
        }
        //POST
        elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['company_name'], $_POST['position'], $_POST['start_date'], $_POST['end_date'], $_POST['job_description'])) {
                $companyName = $_POST['company_name'];
                $position = $_POST['position'];
                $startDate = $_POST['start_date'];
                $endDate = $_POST['end_date'];
                $jobDescription = $_POST['job_description'];

                $experienceModel = new Experience();
                $result = $experienceModel->addExperience($companyName, $position, $startDate, $endDate, $jobDescription);

                if (is_numeric($result)) {
                    header('Location: editCV?status=success&object=experience&action=add');
                    exit;
                } else {
                    echo 'Thêm kinh nghiệm thất bại';
                }
            }
        }
    }
    public function updateExperience()
    {
        //GET
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $view = "views/updateExperience.php";
            $action = "update";

            if (isset($_GET["id"])) {
                $id = $_GET["id"];
                $experienceModel = new Experience();
                $experience = $experienceModel->getExperience($id);
            }

            require "views/layout.php";
        }
        //POST
        elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_GET['id'], $_POST['company_name'], $_POST['position'], $_POST['start_date'], $_POST['end_date'], $_POST['job_description'])) {

                $id = $_GET['id'];
                $companyName = $_POST['company_name'];
                $position = $_POST['position'];
                $startDate = $_POST['start_date'];
                $endDate = $_POST['end_date'];
                $jobDescription = $_POST['job_description'];

                $experienceModel = new Experience();
                $result = $experienceModel->updateExperience($id, $companyName, $position, $startDate, $endDate, $jobDescription);

                if ($result >= 0) {
                    header('Location: editCV?status=success&object=experience&action=update');
                    exit;
                } else {
                    echo 'Cập nhật kinh nghiệm thất bại';
                }
            }
        }
    }
    public function deleteExperience()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET["id"])) {
            $id = $_GET["id"];
            $experienceModel = new Experience();
            $result = $experienceModel->deleteExperience($id);

            if ($result > 0) {
                header("Location: editCV?status=success&object=experience&action=delete");
                exit;
            } else {
                echo "Xóa kinh nghiệm thất bại";
            }
        }
    }

}
?>