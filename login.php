<?php include('partials/head.php'); ?>
<section class="login_section">
    <div class="container">
        <div class="row">
            <div class="col-xl-5 col-lg-6 col-md-8">
                <div class="form_window zoomInDown animated">
                    <div class="form_wrap">
                        <div class="title">
                            ავტორიზაცია
                        </div>
       

                        <form action="authorize.php" method='post'>

                            <div class="input_group">
                                <div class="input_group">
                                    <div class="label">შეიყვანეთ ანგარიშის სახელი:</div>
                                    <input type="text" name="username" placeholder="Levan_Bedinashvili">
                                </div>
                                <div class="input_group">
                                    <div class="label">შეიყვანეთ ანგარიშის პაროლი:</div>
                                    <input type="password" name="password" placeholder="**********************">
                            </div>
                            <input type="submit" style="background-color: #cf2b2b; color:white;" name="auth" class="btn_profile" value="შესვლა">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include('partials/footer.php'); ?>
