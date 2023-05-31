<?php include('partials/head.php');
require_once('connection/connect.php');

$username = $_SESSION['username'];

$sql = "SELECT * FROM accounts WHERE Name = '$username' limit 1";
$result = mysqli_query($connection,$sql);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);


?>

<section class="profile_section">
    <div class="container">
        <div class="row">

            <div class="col-xl-4 col-lg-4">
                <div class="user_block zoomInLeft animated fast">
                    <div class="header">
                        <div class="__stat">

                        </div>
                        <div class="__stat">
                            <div class="_count">
                            <?php echo $row['pLevel'];?>
                            </div>
                            <div class="_desc">
                                ლეველი
                            </div>
                        </div>
                    </div>
                    <div>
                        <img style="height: 241px;" src="https://assets.open.mp/assets/images/skins/<?php echo $row['pChar'];?>.png" alt="">
                    </div>
                    <div class="nickName">
                        <?php echo $row['Name'];?>
                    </div>
                    <div class="status">
                        <?php
                        if($row['pAdmin'] == 0){
                            echo "მოთამაშე";
                        } else {
                            echo "ადმინისტრატორი";
                        }
                        ?>
                    </div>
                </div>
            </div>

            <div class="col-xl-8 col-lg-8">
                <!-- <ul class="header_profile zoomInDown  animated">
                    <a href="https://en-rp.ru/profile/settings"><li>Настройки</li></a>
                    <a href="https://en-rp.ru/profile/game"><li>Рулетка</li></a>
                    <a href="https://en-rp.ru/profile/logout"><li>Админ-панель</li></a>
                    <a href="https://en-rp.ru/profile/logout"><li>Выход</li></a>
                </ul> -->
                <div class="profile_stats zoomInDown fast animated">
                    <div class="col-xl-6">
                        <ul class="stat_list">
                            <li>
                                <div class="params">სქესი</div>
                                <div class="value">

                                    <?php
                                    if($row['pSex'] == 1){
                                        echo "მამრობითი";
                                    } else {
                                        echo "მდედრობითი";
                                    }
                                    ?>
                                </div>
                            </li>
                            <li>
                                <div class="params">სახლის N#</div>
                                <div class="value">
                                <?php echo $row['pPhousekey'];?>
                                </div>
                            </li>


                            <li>
                                <div class="params">ორგანიზაცია</div>
                                <div class="value">
                                    <?php
                                    if($row['pMember'] == 0){
                                        echo "არაა გაწევრიანებული";
                                    } else {
                                        echo "გაწევრიანებულია";
                                    }
                                    ?>
                                </div>
                            </li>
                            <li>
                                <div class="params">ანგარიში ხელზე</div>
                                <div class="value">$ <?php echo $row['pCash'];?></div>
                            </li>
                            <li>
                                <div class="params">ბანკის ანგარიში</div>
                                <div class="value">$ <?php echo $row['pBank'];?></div>
                            </li>
                            <li>
                                <div class="params">ცოლი/ქმარი</div>
                                <div class="value">
                                    <?php
                                    if($row['pMarried'] == 0){
                                        echo "არაა ქორწინებაში";
                                    } else {
                                        echo $row['pMarriedTo'];
                                    }
                                    ?>
                                </div>
                            </li>
                            <li>
                                <div class="params">VIP სტატუსი</div>
                                <div class="value">
                                  
                                    <?php
                                    if($row['pDonateRank'] == 0){
                                        echo "უსტატუსო";
                                    } else {
                                        echo $row['pDonateRank'];
                                    }
                                    ?>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <div class="col-xl-6">
                        <ul class="stat_list">
                            <li>
                                <div class="params">პირველი მანქანა</div>
                                <div class="value">
                                <?php echo $row['pCar'];?>
                                </div>
                            </li>
                            <li>
                                <div class="params">მეორე მანქანა</div>
                                <div class="value">
                                <?php echo $row['pCar1'];?>
                                </div>
                            </li>
                            <li>
                                <div class="params">მესამე მანქანა</div>
                                <div class="value">
                                <?php echo $row['pCar2'];?>
                                </div>
                            </li>

                            <li>
                                <div class="params">მანქანის ნომერი #1</div>
                                <div class="value"><?php echo $row['pCarNumber'];?></div>
                            </li>
                            <li>
                                <div class="params">მანქანის ნომერი #2</div>
                                <div class="value">
                                <?php echo $row['pCarNumber1'];?>
                                </div>
                            </li>
                            <li>
                                <div class="params">მანქანის ნომერი #3</div>
                                <div class="value"><?php echo $row['pCarNumber2'];?></div>
                            </li>
                            <li>
                                <div class="params">რეგისტრაციის IP</div>
                                <div class="value"><?php echo $row['pIpReg'];?></div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-lg-4 col-md-6">
                <div class="skillGun slideInUp animated faster">
                    <div class="info_gun">
                        <div class="name">
                            AK-47
                        </div>
                        <div class="progress">
                            <div class="value" style="width: <?php echo $row['pGunSkill5'];?>%"></div>
                        </div>
                        <div class="count">
                        <?php echo $row['pGunSkill5'];?> / 100%
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6">
                <div class="skillGun slideInUp animated faster">
                    <div class="info_gun">
                        <div class="name">
                            Desert Eagle
                        </div>
                        <div class="progress">
                            <div class="value" style="width:  <?php echo $row['pGunSkill2'];?>%"></div>
                        </div>
                        <div class="count">
                        <?php echo $row['pGunSkill2'];?> / 100%
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6">
                <div class="skillGun slideInUp animated faster">
                    <div class="info_gun">
                        <div class="name">
                            MP5
                        </div>
                        <div class="progress">
                            <div class="value" style="width:  <?php echo $row['pGunSkill4'];?>%"></div>
                        </div>
                        <div class="count">
                        <?php echo $row['pGunSkill4'];?> / 100%
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6">
                <div class="skillGun slideInUp animated ">
                    <div class="info_gun">
                        <div class="name">
                            M4
                        </div>
                        <div class="progress">
                            <div class="value" style="width:  <?php echo $row['pGunSkill6'];?>%"></div>
                        </div>
                        <div class="count">
                            <?php echo $row['pGunSkill6'];?> / 100%
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6">
                <div class="skillGun slideInUp animated">
                    <div class="info_gun">
                        <div class="name">
                            ShotGun
                        </div>
                        <div class="progress">
                            <div class="value" style="width: <?php echo $row['pGunSkill3'];?>%"></div>
                        </div>
                        <div class="count">
                        <?php echo $row['pGunSkill3'];?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6">
                <div class="skillGun slideInUp animated">
                 
                    <div class="info_gun">
                        <div class="name">
                            SDPistol
                        </div>
                        <div class="progress">
                            <div class="value" style="width: <?php echo $row['pGunSkill1'];?>%"></div>
                        </div>
                        <div class="count">
                            <?php echo $row['pGunSkill1'];?>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</section>

<!-- <section class="play_section">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="title_section">
                    <div class="title">
                        პაროლის <span>შეცვლა</span>
                    </div>

                </div>
            </div>
            <div class="col-xl-12 col-lg-12">
                <div class="step_list">
                    <div class="step_block">
                        <div class="number_step">PW</div>
                        <div class="info">
                            <div class="title"  style="margin-top: 10px;">შეცვალეთ თქვენი ანგარიშის პაროლი 1 დაკლიკებით</div>
                        </div>
                        <a href="{{ route('change_password') }}" class="btn_step"> შეცვლა</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> -->

<?php include('partials/footer.php'); ?>
