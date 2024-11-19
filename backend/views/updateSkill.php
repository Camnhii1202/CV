<div class="container-update">
    <h2 class="form-title">
        <?php if ($action === "update")
            echo "Cập nhật";
        else
            echo "Thêm" ?></button> kỹ năng
        </h2>
        <div class="form-container">
            <form action="" method="POST" class="form-input">
                <label for="skill_name">Tên kỹ năng</label>
                <input type="text" name="skill_name" id="skill_name" placeholder="Nhập tên kỹ năng" required value="<?php
        if (isset($skill))
            echo $skill["skill_name"] ?>" />
                <label for="proficiency_level">Mức độ thành thạo</label>
                <select name="proficiency_level" id="proficiency_level" required>
                    <option value="">--Chọn--</option>
                    <option value="Nâng cao" <?php echo (!empty($skill) && isset($skill["proficiency_level"]) && $skill["proficiency_level"] == "Nâng cao") ? 'selected' : ''; ?>>Nâng cao</option>
                <option value="Tốt" <?php echo (!empty($skill) && isset($skill["proficiency_level"]) && $skill["proficiency_level"] == "Tốt") ? 'selected' : ''; ?>>Tốt</option>
                <option value="Trung bình" <?php echo (!empty($skill) && isset($skill["proficiency_level"]) && $skill["proficiency_level"] == "Trung bình") ? 'selected' : ''; ?>>Trung bình</option>
            </select>

            <div class="form-submit-button">
                <button type="submit">
                    <?php if ($action === "update")
                        echo "Cập nhật";
                    else
                        echo "Thêm" ?></button>
                </div>
            </form>
        </div>
    </div>