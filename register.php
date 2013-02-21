    <?php
      include("head.php");
      if (isset($_POST['email'])) {
        $email = trim($_POST['email']);
        $password = md5(trim($_POST['password']));
        $checkSql = "SELECT * FROM bt_user WHERE email = '" . $email . "'";
        $img = rand(1, 10000);
        $img = $img%8 + 1;
        $img = $img . ".png";
        mysql_query("SET NAMES utf8");
        $checkResult = mysql_query($checkSql);
        if (mysql_num_rows($checkResult) > 0) {
          echo "<script>$('#error-msg').append('这个邮件已经注册过了, 忘记密码请联系鹳狸猿.');</script>";
        } else {
          $sql = "INSERT INTO bt_user (uid, name, pwd, img, email, time) VALUES ('', '" .
              $email . "', '" . $password . "', '" . $img . "', '" . $email . "', 0)";
          mysql_query($sql);
          echo "<script>location.href='login.php';</script>";
        }

      }
    ?>
    <div class="no-head-container container">
      <div class="control-group error">
        <span id="error-msg"></span>
      </div>
      <form class="form-horizontal" name="regForm" id="regForm" action="" method="post">
        <div class="control-group">
          <label class="control-label" for="inputEmail">Email</label>
          <div class="controls">
            <input type="text" id="inputEmail" placeholder="Email" name="email" required>
          </div>
        </div>
        <div class="control-group">
          <label class="control-label" for="inputPassword">Password</label>
          <div class="controls">
            <input type="password" id="inputPassword" placeholder="Password" name="password" required>
          </div>
        </div>
        <div class="control-group">
          <label class="control-label" for="inputPassword">Repeat Password</label>
          <div class="controls">
            <input type="password" id="repeatPassword" name="rp" placeholder="Password" required>
          </div>
        </div>
        <div class="control-group">
          <div class="controls">
            <button type="submit" class="btn">注册</button>
          </div>
        </div>
      </form>
      <div class="control-group error">
        <span id="error-msg">备注: 请不要使用常用密码和银行密码. 谢谢.</span>
      </div>
    </div>
    <?php
      include("footer.php");
    ?>
  </body>
</html>