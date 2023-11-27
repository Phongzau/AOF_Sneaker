<main class="bg_gray">
	
    <div class="container margin_60">
        <div class="main_title">
            <h2>Liên hệ với Allaia</h2>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-4">
                <div class="box_contacts">
                    <i class="ti-support"></i>
                    <h2>Trung tâm trợ giúp Allaia</h2>
                    <a href="#0">0343147165</a> - <a href="#0">helpphong@allaia.com</a>
                    <small>MON to FRI 9am-6pm SAT 9am-2pm</small>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="box_contacts">
                    <i class="ti-map-alt"></i>
                    <h2>Allaia Showroom</h2>
                    <div>6th Forrest Ray, London - 10001 UK</div>
                    <small>MON to FRI 9am-6pm SAT 9am-2pm</small>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="box_contacts">
                    <i class="ti-package"></i>
                    <h2>Allaia Orders</h2>
                    <a href="#0">0343147165</a> - <a href="#0">order@allaia.com</a>
                    <small>MON to FRI 9am-6pm SAT 9am-2pm</small>
                </div>
            </div>
        </div>
    <!-- /container -->
<div class="bg_white">
    <div class="container margin_60_35">
        <h4 class="pb-3">Gừi Thông Tin liên hệ</h4>
        <span style="color: green;" > <?php if(isset($thongbao)){  echo $thongbao;  } ?></span>
        <div class="row">
            <div class="col-lg-4 col-md-6 add_bottom_25">
                <form action="index.php?cl=lienhe" method="post" >
                <div class="form-group">
                    <input class="form-control" type="text" name="name"  required placeholder="Name *">
                </div>
                <div class="form-group">
                    <input class="form-control" type="email" name="email" required  placeholder="Email *">
                </div>
                <div class="form-group">
                    <textarea class="form-control" name="noidung" style="height: 150px;" required  placeholder="Message *"></textarea>
                </div>
                <div class="form-group">
                    <input class="btn_1 full-width" name="btn_submit" type="submit" required  value="Submit">
                </div>
                </form>
            </div>
            <div class="col-lg-8 col-md-6 add_bottom_25">
            <iframe class="map_contact" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2633.164912831598!2d105.74431224863612!3d21.038385775367402!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313455e940879933%3A0xcf10b34e9f1a03df!2zVHLGsOG7nW5nIENhbyDEkeG6s25nIEZQVCBQb2x5dGVjaG5pYw!5e0!3m2!1svi!2s!4v1700983852297!5m2!1svi!2s" style="border: 0" allowfullscreen></iframe>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /bg_white -->
</main>
<!--/main-->
