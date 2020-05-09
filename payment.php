<?php
include("config.php");
include ("header.php");





?>
<!DOCTYPE html>
<html>
  <head>

    <title>Payment</title>
  </head>
  <div class="wrapper" style="margin: 5vh 25vh;min-height: 90vh">

    <div class="feature-display">

      <div class="register-text">
        <div><h4>Payment</h4><hr></div>



        <div>
          <form style="width: 45vh" action="payment.php" method="POST">

            <div class="register-form"><label>Amount</label><?php echo '<input type="text" name="amount" readonly value="Abc">'; ?></div>
            <div class="register-form"><label>Card No</label><input type="text" name="card" value="Def"></div>
            <div class="register-form"><label>CVV</label><input type="text" id="scr" name="cv" value="Ghi"></div>
            <div class="register-form"><label>Expiration Date</label><input type="text" id="usr" name="ex" value="Jkl"></div>
            <div class="register-form"><label>Transaction ID</label><input type="text" id="usr" name="tranid" value="Mno"></div>

            <div style="display: flex; align-items: center; justify-content: flex-end; padding: 30px;">
              <div class="register-form">
                <label for=""></label>
                <input type="submit" id="submit" name="pay_m" value="Pay" href="#">
              </div>

            </div>
          </form>
        </div>





  </div>
  </div>
  </div>

  </body>
  <div><?php include 'footer.php'; ?></div>
</html>
