<?php
        $uid = $userdata['id'];
        $sql = "SELECT * FROM rating WHERE id = '$uid' AND hid = '$id'";
        $result = mysqli_query($con, $sql);
        $rows = mysqli_num_rows($result);
        if ($rows > 0) {
          $rating = mysqli_fetch_array($result);
          $rid = $rating['rid'];
          $rate = $rating['rate'];
        ?>
          <div class="star-wrapper">
            <p class="px">Your Review</p>
            <a href="rating.php?re=5&rid=<?php echo $rid; ?>" class="fas fa-star s1" onclick="return confirm('Are you sure want to update rate?')" title="5"></a>
            <a href="rating.php?re=4&rid=<?php echo $rid; ?>" class="fas fa-star s2" onclick="return confirm('Are you sure want to update rate?')" title="4"></a>
            <a href="rating.php?re=3&rid=<?php echo $rid; ?>" class="fas fa-star s3" onclick="return confirm('Are you sure want to update rate?')" title="3"></a>
            <a href="rating.php?re=2&rid=<?php echo $rid; ?>" class="fas fa-star s4" onclick="return confirm('Are you sure want to update rate?')" title="2"></a>
            <a href="rating.php?re=1&rid=<?php echo $rid; ?>" class="fas fa-star s5" onclick="return confirm('Are you sure want to update rate?')" title="1"></a>
          </div>
          <script>
            <?php

            while ($rate >= 1) {
            ?>
              document.getElementsByClassName('s<?php echo 6 - $rate; ?>')[0].style.color = "red";
            <?php
              $rate--;
            }
            ?>
          </script>
        <?php } else {
        ?>
          <div class="star-wrapper">
            <p class="px">Please Give Your Review</p>
            <a href="rating.php?rate=5&hid=<?php echo $id; ?>" class="fas fa-star s1" onclick="return confirm('Are you sure want to rate?')" title="5"></a>
            <a href="rating.php?rate=4&hid=<?php echo $id; ?>" class="fas fa-star s2" onclick="return confirm('Are you sure want to rate?')" title="4"></a>
            <a href="rating.php?rate=3&hid=<?php echo $id; ?>" class="fas fa-star s3" onclick="return confirm('Are you sure want to rate?')" title="3"></a>
            <a href="rating.php?rate=2&hid=<?php echo $id; ?>" class="fas fa-star s4" onclick="return confirm('Are you sure want to rate?')" title="2"></a>
            <a href="rating.php?rate=1&hid=<?php echo $id; ?>" class="fas fa-star s5" onclick="return confirm('Are you sure want to rate?')" title="1"></a>
          </div>
        <?php } ?>