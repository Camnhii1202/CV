<?php
require_once "models/Education.php";

class EducationController
{
    public function addEducation()
    {
        //GET
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $view = "views/updateEducation.php";
            $action = "add";
            require "views/layout.php";
        }
        //POST
        elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['school_name'], $_POST['major'], $_POST['start_year'], $_POST['end_year'])) {
                $schoolName = $_POST['school_name'];
                $major = $_POST['major'];
                $startYear = $_POST['start_year'];
                $endYear = $_POST['end_year'];

                $educationModel = new Education();
                $result = $educationModel->addEducation($schoolName, $major, $startYear, $endYear);

                if (is_numeric($result)) {
                    header('Location: editCV?status=success&object=education&action=add');
                    exit;
                } else {
                    echo 'Thêm học vấn thất bại';
                }
            }
        }

    }
    public function updateEducation()
    {
        //GET
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $view = "views/updateEducation.php";
            $action = "update";

            if (isset($_GET["id"])) {
                $id = $_GET["id"];
                $educationModel = new Education();
                $education = $educationModel->getEducation($id);
            }

            require "views/layout.php";
        }
        //POST
        elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_GET['id'], $_POST['school_name'], $_POST['major'], $_POST['start_year'], $_POST['end_year'])) {
                $id = $_GET['id'];
                $schoolName = $_POST['school_name'];
                $major = $_POST['major'];
                $startYear = $_POST['start_year'];
                $endYear = $_POST['end_year'];

                $educationModel = new Education();
                $result = $educationModel->updateEducation($id, $schoolName, $major, $startYear, $endYear);

                if ($result >= 0) {
                    header('Location: editCV?status=success&object=education&action=update');
                    exit;
                } else {
                    echo 'Cập nhật học vấn thất bại';
                }
            }
        }
    }
    public function deleteEducation()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET["id"])) {
            $id = $_GET["id"];
            $educationModel = new Education();
            $result = $educationModel->deleteEducation($id);

            if ($result > 0) {
                header("Location: editCV?status=success&object=education&action=delete");
                exit;
            } else {
                echo "Xóa học vấn thất bại";
            }
        }
    }

}
?>