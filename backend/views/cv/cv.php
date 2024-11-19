<?php
require_once "utils/Format.php";
$format = new Format();
?>

<div class="container">
    <!-- Header -->
    <div class="cv-header">
        <img src="https://studiochupanhdep.com/Upload/Images/Album/anh-doanh-nhan-nu.jpg" alt="Profile Picture" />
        <div class="info">
            <a href="editCV" class="update-button">Cập nhật</a>
            <h1><?php echo $info["name"] ?></h1>
            <h2><?php echo $info["apply_position"] ?></h2>
            <p>
                <?php echo $info["bio"] ?>
            </p>
        </div>
    </div>
    <!-- Contact -->
    <div class="contact">
        <div class="contact-info">
            <span><strong>Số điện thoại:</strong> <?php echo $info["phone"] ?> </span>
            <span><strong>Email:</strong>
                <?php echo $info["email"] ?></span>
            <span><strong>LinkedIn:</strong> <a href="<?php echo $info["linkedin"] ?>">
                    <?php echo $info["linkedin_account"] ?></a></span>
            <span><strong>Địa chỉ:</strong> <?php echo $info["address"] ?></span>
        </div>
    </div>

    <!-- Phần Học vấn -->
    <section class="education">
        <h2>Học vấn</h2>
        <?php foreach ($educations as $education): ?>
            <div class="education-item">
                <div class="education-header">
                    <div class="education-list-item">
                        <h3><?php echo $education["school_name"] ?></h3>
                    </div>
                    <span class="time"><?php echo $education["start_year"] ?> - <?php echo $education["end_year"] ?></span>
                </div>
                <p>Cử nhân - Chuyên ngành: <?php echo $education["major"] ?></p>
            </div>
        <?php endforeach; ?>
    </section>

    <!-- Phần Kinh nghiệm -->
    <section class="experience">
        <h2>Kinh nghiệm</h2>
        <?php foreach ($experiences as $experience): ?>
            <div class="experience-item">
                <div class="experience-header">
                    <div class="experience-list-item">
                        <h3><?php echo $experience["company_name"] ?></h3>
                    </div>

                    <span class="time"><?php echo $format->formatDateMothYear($experience["start_date"]) ?> -
                        <?php echo $format->formatDateMothYear($experience["end_date"]) ?></span>
                </div>
                <p><b><?php echo $experience["position"] ?></b></p>
                <ul>
                    <?php foreach ($format->seperateJobDescription($experience["job_description"]) as $jd_item) {
                        if (!empty(trim($jd_item)))
                            echo "<li>$jd_item</li>";
                    } ?>
                </ul>
            </div>
        <?php endforeach ?>
    </section>

    <!-- Phần Kỹ năng -->
    <section class="skills">
        <h2>Kỹ năng</h2>

        <ul>
            <?php foreach ($skills as $skill): ?>
                <li>
                    <div class="skills-list-item">
                        <p><?php echo $skill['skill_name']; ?> - <?php echo $skill['proficiency_level']; ?></p>
                    </div>
                </li>

            <?php endforeach; ?>
        </ul>
    </section>
</div>