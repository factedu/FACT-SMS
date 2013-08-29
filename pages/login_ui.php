<div class="col-8" style="border: 1px solid white; padding: 24px; margin: 20px; border-radius: 20px;">
    <form class="form-horizontal" action="pages/auth.php" method="post">
        <div class="form-group">
          <label for="inputEmail" class="col-lg-2 control-label" >Email</label>
          <div class="col-lg-10">
            <input type="text" class="form-control" name="u_name" id="inputEmail" placeholder="Email">
          </div>
        </div>
        <div class="form-group">
          <label for="inputPassword" class="col-lg-2 control-label">Password</label>
          <div class="col-lg-10">
            <input type="password" name="pwd"class="form-control" id="inputPassword" placeholder="Password">
          </div>
        </div>
        <div class="form-group">
          <div class="col-lg-offset-2 col-lg-10">
            <div class="checkbox">
              <label>
                <input type="checkbox"> Remember me
              </label>
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="col-lg-offset-2 col-lg-10">
            <button type="submit" class="btn btn-outline pull-right">Sign in <i class='icon-signin'></i></button>
          </div>
        </div>
    </form>


</div>