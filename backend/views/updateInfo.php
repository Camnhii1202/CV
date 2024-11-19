<div class="container-update">
    <h2 class="form-title">Cập nhật thông tin</h2>
    <div class="form-container">
        <form action="" method="POST" class="form-input">
            <label for="name">Họ và tên</label>
            <input type="text" name="name" id="name" placeholder="Nhập họ và tên" value="<?php echo $info['name'] ?>" />

            <label for="email">Email</label>
            <input type="email" name="email" id="email" placeholder="Nhập email" value="<?php echo $info['email'] ?>" />

            <label for="phone">Số điện thoại</label>
            <input type="text" name="phone" id="phone" placeholder="Nhập số điện thoại"
                value="<?php echo $info['phone'] ?>" pattern="^0\d{9}$"
                title="Số điện thoại phải bắt đầu bằng 0 và có 10 chữ số" />

            <label for="address">Địa chỉ</label>
            <input type="text" name="address" id="address" placeholder="Nhập địa chỉ"
                value="<?php echo $info['address'] ?>" />

            <label for="apply_position">Vị trí ứng tuyển</label>
            <input type="text" name="apply_position" id="apply_position" placeholder="Nhập địa chỉ"
                value="<?php echo $info['apply_position'] ?>" />

            <label for="bio">Mô tả ngắn</label>
            <textarea name="bio" id="bio"
                placeholder="Nhập mô tả ngắn về bản thân"><?php echo $info['bio'] ?></textarea>

            <label for="linkedin_account">Tên tài khoản LinkedIn</label>
            <input type="text" name="linkedin_account" id="linkedin_account" placeholder="Nhập địa chỉ"
                value="<?php echo $info['linkedin_account'] ?>" />

            <label for="linkedin">Địa chỉ LinkedIn</label>
            <input type="text" name="linkedin" id="linkedin" placeholder="Nhập địa chỉ"
                value="<?php echo $info['linkedin'] ?>" />

            <div class="form-submit-button">
                <button type="submit">Cập nhật</button>
            </div>
        </form>
    </div>
</div>