<?php
require_once "config/DatabaseConnection.php";

class Skill
{
    private $conn;
    public function __construct()
    {
        $db = new DatabaseConnection();
        $this->conn = $db->getConnection();
    }

    public function getAllSkills()
    {
        $smtm = $this->conn->prepare("SELECT * FROM skills");
        $smtm->execute();
        $result = $smtm->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    public function getSkill($id)
    {
        $smtm = $this->conn->prepare("SELECT * FROM skills WHERE skill_id = :id");
        $smtm->bindParam(':id', $id, PDO::PARAM_INT);
        $smtm->execute();
        $result = $smtm->fetch(PDO::FETCH_ASSOC);

        return $result;
    }

    public function addSkill($skill_name, $proficiency_level)
    {
        $stmt = $this->conn->prepare("INSERT INTO skills (skill_name, proficiency_level) VALUES (:skill_name, :proficiency_level)");
        $stmt->bindParam(':skill_name', $skill_name, PDO::PARAM_STR);
        $stmt->bindParam(':proficiency_level', $proficiency_level, PDO::PARAM_STR);
        $stmt->execute();

        return $this->conn->lastInsertId();
    }

    public function updateSkill($id, $skill_name, $proficiency_level)
    {
        $stmt = $this->conn->prepare("UPDATE skills SET skill_name = :skill_name, proficiency_level = :proficiency_level WHERE skill_id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':skill_name', $skill_name, PDO::PARAM_STR);
        $stmt->bindParam(':proficiency_level', $proficiency_level, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->rowCount();
    }

    public function deleteSkill($id)
    {
        $stmt = $this->conn->prepare("DELETE FROM skills WHERE skill_id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->rowCount();
    }
}



?>