<div class="container-update">
    <h2 class="form-title"><?php
    if ($action === "add")
        echo "Thêm";
    else
        echo "Cập nhật";
    ?> học vấn</h2>
    <div class="form-container">
        <form action="" method="POST" class="form-input">
            <label for="school_name">Tên trường</label>
            <input type="text" name="school_name" id="school_name" placeholder="Nhập tên trường" required value="<?php if (isset($education))
                echo $education["school_name"] ?>" />

                <label for="major">Chuyên ngành</label>
                <input type="text" name="major" id="major" placeholder="Nhập chuyên ngành" required value="<?php if (isset($education))
                echo $education["major"] ?>" />

                <label>Thời gian học</label>
                <div class="input-range-year">
                    <input type="number" name="start_year" id="start_year" placeholder="Năm bắt đầu" required min="1900"
                        max="2100" value="<?php if (isset($education))
                echo $education["start_year"] ?>" />

                    <span>-</span>

                    <input type="number" name="end_year" id="end_year" placeholder="Năm kết thúc" required min="1900"
                        max="2100" value="<?php if (isset($education))
                echo $education["end_year"] ?>" />
                </div>

                <div class="form-submit-button">
                    <button type="submit"><?php
            if ($action === "add")
                echo "Thêm";
            else
                echo "Cập nhật";
            ?></button>
            </div>
        </form>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const startYearInput = document.getElementById("start_year");
        const endYearInput = document.getElementById("end_year");

        const validateYears = () => {
            const startYear = parseInt(startYearInput.value, 10);
            const endYear = parseInt(endYearInput.value, 10);

            if (startYear && endYear && endYear <= startYear) {
                alert("Năm kết thúc phải lớn hơn năm bắt đầu.");
                endYearInput.value = "";
            }
        };

        endYearInput.onchange = validateYears
        startYearInput.onchange = validateYears
    });

</script>