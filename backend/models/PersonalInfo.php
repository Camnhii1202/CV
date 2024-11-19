<?php

require_once "config/DatabaseConnection.php";
class PersonalInfo
{
    private $conn;
    public function __construct()
    {
        $db = new DatabaseConnection();
        $this->conn = $db->getConnection();
    }

    public function getPersonalInfo()
    {
        $smtm = $this->conn->prepare("SELECT * FROM personal_info");
        $smtm->execute();
        $result = $smtm->fetch(PDO::FETCH_ASSOC);

        return $result;
    }

    public function updatePersonalInfo($id, $name, $email, $phone, $address, $bio, $apply_position, $linkedin, $linkedin_account)
    {
        $stmt = $this->conn->prepare(
            "UPDATE personal_info 
             SET name = :name, email = :email, phone = :phone, address = :address, bio = :bio, apply_position = :apply_position, linkedin = :linkedin, linkedin_account = :linkedin_account
             WHERE id = :id"
        );

        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':phone', $phone, PDO::PARAM_STR);
        $stmt->bindParam(':address', $address, PDO::PARAM_STR);
        $stmt->bindParam(':bio', $bio, PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':apply_position', $apply_position, PDO::PARAM_STR);
        $stmt->bindParam(':linkedin', $linkedin, PDO::PARAM_STR);
        $stmt->bindParam(':linkedin_account', $linkedin_account, PDO::PARAM_STR);

        $stmt->execute();

        return $stmt->rowCount();
    }
}














?>