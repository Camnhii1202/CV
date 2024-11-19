<?php
require_once "models/PersonalInfo.php";
require_once "models/Skill.php";
require_once "models/Education.php";
require_once "models/Experience.php";

class CVController
{
    public function index()
    {
        $view = "views/cv/cv.php";
        //call models
        $personalInfo = new PersonalInfo();
        $skill = new Skill();
        $education = new Education();
        $experience = new Experience();

        //get data
        $info = $personalInfo->getPersonalInfo();
        $skills = $skill->getAllSkills();
        $educations = $education->getAllEducation();
        $experiences = $experience->getAllExperience();

        require "views/layout.php";
    }

    public function editCV()
    {
        $view = "views/cv/cvEdit.php";

        //call models
        $personalInfo = new PersonalInfo();
        $skill = new Skill();
        $education = new Education();
        $experience = new Experience();

        //get data
        $info = $personalInfo->getPersonalInfo();
        $skills = $skill->getAllSkills();
        $educations = $education->getAllEducation();
        $experiences = $experience->getAllExperience();

        require "views/layout.php";
    }
}
?>