<?php
require_once "controllers/CVController.php";
require_once "controllers/PersonalInfoController.php";
require_once "controllers/EducationController.php";
require_once "controllers/ExperienceController.php";
require_once "controllers/SkillController.php";

// Get the current URI without query parameters
$basePath = '/CV/backend';
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = str_replace($basePath, '', $uri);

switch ($uri) {
    //general
    case '/editCV':
        (new CVController())->editCV();
        break;

    //personal info
    case '/updateInfo':
        (new PersonalInfoController())->updateInfoView();
        break;

    //education
    case '/addEducation':
        (new EducationController())->addEducation();
        break;
    case '/updateEducation':
        (new EducationController())->updateEducation();
        break;
    case '/deleteEducation':
        (new EducationController())->deleteEducation();
        break;

    //experience
    case '/addExperience':
        (new ExperienceController())->addExperience();
        break;
    case '/updateExperience':
        (new ExperienceController())->updateExperience();
        break;
    case '/deleteExperience':
        (new ExperienceController())->deleteExperience();
        break;

    //skill
    case '/addSkill':
        (new SkillController())->addSkill();
        break;
    case '/updateSkill':
        (new SkillController())->updateSkill();
        break;
    case '/deleteSkill':
        (new SkillController())->deleteSkill();
        break;

    default:
        (new CVController())->index();
}
?>