<landing-page>

  <div slot="register-form">

    <register-form></register-form>

  </div>

  <div slot="login-form">
    
    <login-form login-errors="{{ $errors->has('email') ? $errors->first('email') : '' }}"></login-form>

  </div>

</landing-page> 