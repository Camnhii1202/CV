<?php
require_once "config/DatabaseConnection.php";

class Experience
{
    private $conn;
    public function __construct()
    {
        $db = new DatabaseConnection();
        $this->conn = $db->getConnection();
    }

    public function getAllExperience()
    {
        $smtm = $this->conn->prepare("select * from experience");
        $smtm->execute();
        $result = $smtm->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    public function getExperience($id)
    {
        $smtm = $this->conn->prepare("select * from experience where work_id = :id");
        $smtm->bindParam(':id', $id, PDO::PARAM_INT);
        $smtm->execute();
        $result = $smtm->fetch(PDO::FETCH_ASSOC);

        return $result;
    }

    public function addExperience($company_name, $position, $start_date, $end_date, $job_description)
    {
        $stmt = $this->conn->prepare(
            "INSERT INTO experience (company_name, position, start_date, end_date, job_description) 
             VALUES (:company_name, :position, :start_date, :end_date, :job_description)"
        );

        $stmt->bindParam(':company_name', $company_name, PDO::PARAM_STR);
        $stmt->bindParam(':position', $position, PDO::PARAM_STR);
        $stmt->bindParam(':start_date', $start_date, PDO::PARAM_STR);
        $stmt->bindParam(':end_date', $end_date, PDO::PARAM_STR);
        $stmt->bindParam(':job_description', $job_description, PDO::PARAM_STR);

        $stmt->execute();

        return $this->conn->lastInsertId();
    }

    public function updateExperience($id, $company_name, $position, $start_date, $end_date, $job_description)
    {
        $stmt = $this->conn->prepare(
            "UPDATE experience 
             SET company_name = :company_name, 
                 position = :position, 
                 start_date = :start_date, 
                 end_date = :end_date, 
                 job_description = :job_description
             WHERE work_id = :id"
        );

        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':company_name', $company_name, PDO::PARAM_STR);
        $stmt->bindParam(':position', $position, PDO::PARAM_STR);
        $stmt->bindParam(':start_date', $start_date, PDO::PARAM_STR);
        $stmt->bindParam(':end_date', $end_date, PDO::PARAM_STR);
        $stmt->bindParam(':job_description', $job_description, PDO::PARAM_STR);

        $stmt->execute();

        return $stmt->rowCount();
    }

    public function deleteExperience($id)
    {
        $stmt = $this->conn->prepare("DELETE FROM experience WHERE work_id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->rowCount();
    }


}


?>