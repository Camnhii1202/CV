<?php
require_once "config/DatabaseConnection.php";

class Education
{
    private $conn;
    public function __construct()
    {
        $db = new DatabaseConnection();
        $this->conn = $db->getConnection();
    }

    public function getAllEducation()
    {
        $smtm = $this->conn->prepare("SELECT * FROM education");
        $smtm->execute();
        $result = $smtm->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    public function getEducation($id)
    {
        $smtm = $this->conn->prepare("SELECT * FROM education WHERE education_id = :id");
        $smtm->bindParam(':id', $id, PDO::PARAM_INT);
        $smtm->execute();
        $result = $smtm->fetch(PDO::FETCH_ASSOC);

        return $result;
    }

    public function addEducation($school_name, $major, $start_year, $end_year)
    {
        $stmt = $this->conn->prepare(
            "INSERT INTO education (school_name, major, start_year, end_year) 
             VALUES (:school_name, :major, :start_year, :end_year)"
        );

        $stmt->bindParam(':school_name', $school_name, PDO::PARAM_STR);
        $stmt->bindParam(':major', $major, PDO::PARAM_STR);
        $stmt->bindParam(':start_year', $start_year, PDO::PARAM_INT);
        $stmt->bindParam(':end_year', $end_year, PDO::PARAM_INT);

        $stmt->execute();

        return $this->conn->lastInsertId();
    }

    public function updateEducation($id, $school_name, $major, $start_year, $end_year)
    {
        $stmt = $this->conn->prepare(
            "UPDATE education 
             SET school_name = :school_name, major = :major, start_year = :start_year, end_year = :end_year
             WHERE education_id = :id"
        );

        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':school_name', $school_name, PDO::PARAM_STR);
        $stmt->bindParam(':major', $major, PDO::PARAM_STR);
        $stmt->bindParam(':start_year', $start_year, PDO::PARAM_INT);
        $stmt->bindParam(':end_year', $end_year, PDO::PARAM_INT);

        $stmt->execute();

        return $stmt->rowCount();
    }

    public function deleteEducation($id)
    {
        $stmt = $this->conn->prepare("DELETE FROM education WHERE education_id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->rowCount();
    }


}


?>