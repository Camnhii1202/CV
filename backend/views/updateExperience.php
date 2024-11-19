<div class="container-update">
    <h2 class="form-title"><?php if ($action === 'add')
        echo 'Thêm';
    else
        echo 'Cập nhật' ?> kinh nghiệm</h2>
        <div class="form-container">
            <form action="" method="POST" class="form-input">
                <label for="company_name">Tên công ty</label>
                <input type="text" name="company_name" id="company_name" placeholder="Nhập tên công ty" required value="<?php if (isset($experience))
        echo $experience['company_name'] ?>" />

                <label for="position">Vị trí công việc</label>
                <input type="text" name="position" id="position" placeholder="Nhập vị trí công việc" required value="<?php if (isset($experience))
        echo $experience['position'] ?>" />

                <label>Thời gian làm việc</label>
                <div class="input-range-date">
                    <input type="date" name="start_date" id="start_date" value="<?php if (isset($experience))
        echo $experience['start_date'] ?>" min="1900-01-01" max="2100-12-31">
                    <span>-</span>
                    <input type="date" name="end_date" id="end_date" value="<?php if (isset($experience))
        echo $experience['end_date'] ?>" min="1900-01-01" max="2100-12-31">
                </div>

                <label for="job_description">Mô tả công việc</label>
                <textarea name="job_description" id="job_description" placeholder="Nhập mô tả công việc" required><?php if (isset($experience))
        echo $experience['job_description'] ?></textarea>

                <div class="form-submit-button">
                    <button type="submit"><?php if ($action === 'add')
        echo 'Thêm';
    else
        echo 'Cập nhật' ?></button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const startYearInput = document.getElementById("start_date");
            const endYearInput = document.getElementById("end_date");

            const validateYears = () => {
                const startYear = parseInt(startYearInput.value, 10);
                const endYear = parseInt(endYearInput.value, 10);

                if (startYear && endYear && endYear <= startYear) {
                    alert("Ngày kết thúc phải lớn hơn ngày bắt đầu.");
                    endYearInput.value = "";
                }
            };

            endYearInput.onchange = validateYears
            startYearInput.onchange = validateYears
        });

    </script>