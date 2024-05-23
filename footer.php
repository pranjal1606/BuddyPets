<!-- Footer -->
<footer class="footer">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-lg-6 mb-4 mb-md-0">
        <h2 class="footer-heading">Have a Questions?</h2>
        <div class="block-23 mb-3">
          <ul>
            <li><span class="icon fa fa-map"></span><span class="text"><?php echo $address; ?></span></li>
              <?php
                if ($phone1 != "") {
                  echo "<li><a href='tel:$phone1'><span class='icon fa fa-phone'></span><span class='text'>$phone1</span></a></li>";
                }

                if ($email1 != "") {
                  echo "<li><a href='mailto:$email1'><span class='icon fa fa-paper-plane'></span><span class='text'>$email1</span></a></li>";
                } 
              ?>
          </ul>
        </div>
      </div>
      <div class="col-md-6 col-lg-6 mb-0 mb-md-0">
        <h2 class="footer-heading">BuddyPets</h2>
        <div class="col-md-6 d-flex justify-content-md-end">
          <div class="social-media">
            <p class="mb-0 d-flex">
              <?php
              if ($facebook != "") {
                echo "<a href='$facebook' class='d-flex align-items-center justify-content-center'><span class='fa fa-facebook fa-2x'><i class='sr-only'>Facebook</i></span>
									</a>";
              }
              if ($twitter != "") {
                echo "<a href='$twitter' class='d-flex align-items-center justify-content-center'><span class='fa fa-twitter fa-2x'><i class='sr-only'>Twitter</i></span>
									</a>";
              }
              if ($instagram != "") {
                echo "<a href='$instagram' class='d-flex align-items-center justify-content-center'><span class='fa fa-instagram fa-2x'><i class='sr-only'>Instagram</i></span>
									</a>";
              }
              if ($youtube != "") {
                echo "<a href='$youtube' class='d-flex align-items-center justify-content-center'><span class='fa fa-youtube fa-2x'><i class='sr-only'>Youtube</i></span>
									</a>";
              }
              if ($whatsapp != "") {
                echo "<a href='$whatsapp' class='d-flex align-items-center justify-content-center'><span class='fa fa-whatsapp fa-2x'><i class='sr-only'>Whatsapp</i></span>
									</a>";
              }
              if ($snapchat != "") {
                echo "<a href='$snapchat' class='d-flex align-items-center justify-content-center'><span class='fa fa-snapchat  fa-2x'><i class='sr-only'>Snapchat</i></span>
									</a>";
              }
              if ($telegram != "") {
                echo "<a href='$telegram' class='d-flex align-items-center justify-content-center'><span class='fa fa-telegram fa-2x'><i class='sr-only'>Telegram</i></span>
									</a>";
              }

              ?>
            </p>
          </div>
        </div>
      </div>
    </div>
    <p class="text-center">All Rights Reserved &copy;  Pranjal Chhuchhar</p>
</footer>