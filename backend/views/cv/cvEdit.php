<?php
require_once "utils/Format.php";
$format = new Format();
?>
<div class="container">
    <!-- Header -->
    <div class="cv-header">
        <img src="https://studiochupanhdep.com/Upload/Images/Album/anh-doanh-nhan-nu.jpg" alt="Profile Picture" />
        <div class="info">
            <a href="." class="update-button">Hoàn thành</a>
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
        <a href="./updateInfo?id=<?php echo $info["id"] ?>" class="action-buttons">Cập nhật</a>
    </div>

    <!-- Phần Học vấn -->
    <section class="education">
        <h2>Học vấn</h2>
        <a href="./addEducation" class="action-buttons">
            <i class="fa-solid fa-plus"></i>
        </a>
        <?php foreach ($educations as $education): ?>
            <div class="education-item">
                <div class="education-header">
                    <div class="education-list-item">
                        <h3><?php echo $education["school_name"] ?></h3>
                        <a href="./updateEducation?id=<?php echo $education["education_id"] ?>" class="action-buttons">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                        <a href="./deleteEducation?id=<?php echo $education["education_id"] ?>"
                            class="action-buttons delete">
                            <i class="fa-solid fa-trash"></i>
                        </a>
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
        <a href="./addExperience" class="action-buttons"><i class="fa-solid fa-plus"></i></a>
        <?php foreach ($experiences as $experience): ?>
            <div class="experience-item">
                <div class="experience-header">
                    <div class="experience-list-item">
                        <h3><?php echo $experience["company_name"] ?></h3>
                        <a href="./updateExperience?id=<?php echo $experience["work_id"] ?>" class="action-buttons">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                        <a href="./deleteExperience?id=<?php echo $experience["work_id"] ?>" class="action-buttons delete">
                            <i class="fa-solid fa-trash"></i>
                        </a>
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
        <a href="./addSkill" class="action-buttons"><i class="fa-solid fa-plus"></i></a>

        <ul>
            <?php foreach ($skills as $skill): ?>
                <li>
                    <div class="skills-list-item">
                        <p><?php echo $skill['skill_name']; ?> - <?php echo $skill['proficiency_level']; ?></p>
                        <a href="./updateSkill?id=<?php echo $skill["skill_id"] ?>" class="action-buttons"><i
                                class="fa-solid fa-pen-to-square"></i></a>
                        <a href="./deleteSkill?id=<?php echo $skill["skill_id"] ?>" class="action-buttons delete"><i
                                class="fa-solid fa-trash"></i></a>
                    </div>
                </li>

            <?php endforeach; ?>

        </ul>
    </section>
</div>

<!-- Confirmation Modal -->
<div id="deleteModal" class="modal hidden">
    <div class="modal-content">
        <h3 id="modal-title">Bạn có chắc chắn xóa Kinh nghiệm này?</h3>
        <p>Hành động này không thể hoàn tác.</p>
        <div class="modal-actions">
            <button id="cancelButton" class="cancel-button">Hủy</button>
            <a id="confirmDeleteButton" class="confirm-button">Xóa</a>
        </div>
    </div>
</div>

<!-- modal -->
<script>
    document.addEventListener("DOMContentLoaded", () => {
        const deleteLinks = document.querySelectorAll("a.action-buttons.delete");
        const deleteModal = document.getElementById("deleteModal");
        const modalTitle = document.getElementById("modal-title");
        const confirmDeleteButton = document.getElementById("confirmDeleteButton");
        const cancelButton = document.getElementById("cancelButton");

        deleteLinks.forEach(link => {
            link.addEventListener("click", (event) => {
                event.preventDefault();
                const href = link.getAttribute("href");

                const title = href.includes('Skill')
                    ? 'Kỹ năng'
                    : href.includes('Education')
                        ? 'Học vấn'
                        : href.includes('Experience')
                            ? 'Kinh nghiệm'
                            : '';
                modalTitle.textContent = `Bạn có chắc chắn xóa ${title} này?`;
                confirmDeleteButton.setAttribute("href", href);
                deleteModal.classList.remove("hidden");
            });
        });

        // Close the modal on cancel
        cancelButton.addEventListener("click", () => {
            deleteModal.classList.add("hidden");
        });
    });
</script>

<!-- toast -->
<?php
if (isset($_GET["status"], $_GET["object"], $_GET["action"])) {
    $status = $_GET["status"];
    $object = $_GET["object"];
    $action = $_GET["action"];

    // Vietnamese translations
    $objectTranslations = [
        "skill" => "Kỹ năng",
        "personalInfo" => "Thông tin",
        "experience" => "Kinh nghiệm",
        "education" => "Học vấn"
    ];

    $actionTranslations = [
        "add" => "thêm mới",
        "update" => "cập nhật",
        "delete" => "xóa"
    ];

    // Generate the message
    $objectText = $objectTranslations[$object] ?? $object;
    $actionText = $actionTranslations[$action] ?? $action;
    $type = $status === "success" ? "success" : "error";

    $message = $status === "success"
        ? ucfirst($actionText) . " " . strtolower($objectText) . " thành công!"
        : ucfirst($actionText) . " " . strtolower($objectText) . " thất bại!";


    echo "<script>
        window.onload = function () {
            showToast('$message', '$type');
        }
    </script>";
}
?>