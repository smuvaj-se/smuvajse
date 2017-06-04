<!-- Landing Page Contents
    ================================================= -->
    <div id="lp-register">
        <div class="container wrapper">
        <div class="row">
            <div class="col-sm-5">
            <div class="intro-texts">
                <h1 class="text-white">Smuvaj se!!! <br>Šta čekaš?</h1>
                <p>Friend Finder is a social network template that can be used to connect people. The template offers Landing pages, News Feed, Image/Video Feed, Chat Box, Timeline and lot more. <br /> <br />Why are you waiting for? Buy it now.</p>
              <button class="btn btn-primary">Detaljnije</button>
            </div>
          </div>
            <div class="col-sm-6 col-sm-offset-1">
            <div class="reg-form-container">

              <!-- Register/Login Tabs-->
              <div class="reg-options">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#register" data-toggle="tab">Register</a></li>
                  <li><a href="#login" data-toggle="tab">Login</a></li>
                </ul><!--Tabs End-->
              </div>

              <!--Registration Form Contents-->
              <div class="tab-content">
                <div class="tab-pane active" id="register">
                  <h3>Regustruj se !!!</h3>
                  <p class="text-muted">Pridruži nam se odmah. Započni muvanje </p>

                  <!--Register Form-->
                  <form name="registration_form" id='registration_form' class="form-inline">
                    <div class="row">
                      <div class="form-group col-xs-6">
                        <label for="name" class="sr-only">Ime</label>
                        <input id="name" class="form-control input-group-lg" type="text" name="name" title="Ime" placeholder="Ime"/>
                      </div>
                      <div class="form-group col-xs-6">
                        <label for="surname" class="sr-only">Prezime</label>
                        <input id="surname" class="form-control input-group-lg" type="text" name="surname" title="Prezime" placeholder="Prezime"/>
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-xs-12">
                        <label for="email" class="sr-only">Email</label>
                        <input id="email" class="form-control input-group-lg" type="text" name="Email" title="Enter Email" placeholder="Email"/>
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-xs-12">
                        <label for="password" class="sr-only">Lozinka</label>
                        <input id="password" class="form-control input-group-lg" type="password" name="password" title="Enter password" placeholder="Lozinka"/>
                      </div>
                    </div>

                    <div class="row">
                      <div class="form-group col-xs-12">
                        <label for="password_confirmed" class="sr-only">Potvrdi Lozinku</label>
                        <input id="password_confirmed" class="form-control input-group-lg" type="password" name="password_confirmed" title="Enter password" placeholder="Lozinka"/>
                      </div>
                    </div>

                    <div class="row">
                      <p class="birth"><strong>Datum rođenja</strong></p>
                      <div class="form-group col-sm-3 col-xs-6">
                        <label for="month" class="sr-only"></label>
                        <select class="form-control" id="day">
                          <option value="Day" disabled selected>Dan</option>
                          <option>1</option>
                          <option>2</option>
                          <option>3</option>
                          <option>4</option>
                          <option>5</option>
                          <option>6</option>
                          <option>7</option>
                          <option>8</option>
                          <option>9</option>
                          <option>10</option>
                          <option>11</option>
                          <option>12</option>
                          <option>13</option>
                          <option>14</option>
                          <option>15</option>
                          <option>16</option>
                          <option>17</option>
                          <option>18</option>
                          <option>19</option>
                          <option>20</option>
                          <option>21</option>
                          <option>22</option>
                          <option>23</option>
                          <option>24</option>
                          <option>25</option>
                          <option>26</option>
                          <option>27</option>
                          <option>28</option>
                          <option>29</option>
                          <option>30</option>
                          <option>31</option>
                        </select>
                      </div>
                      <div class="form-group col-sm-3 col-xs-6">
                        <label for="month" class="sr-only"></label>
                        <select class="form-control" id="month">
                          <option value="month" disabled selected>Mesec</option>
                          <option value="1">Jan</option>
                          <option value="2">Feb</option>
                          <option value="3">Mar</option>
                          <option value="4">Apr</option>
                          <option value="5">Maj</option>
                          <option value="6">Jun</option>
                          <option value="7">Jul</option>
                          <option value="8">Avg</option>
                          <option value="9">Sep</option>
                          <option value="10">Okt</option>
                          <option value="11">Nov</option>
                          <option value="12">Dec</option>
                        </select>
                      </div>
                      <div class="form-group col-sm-6 col-xs-12">

                        @php

                            $firstYear = 1945;
                            $lastYear  = Carbon\Carbon::now()->year - 18;

                        @endphp

                        <label for="year" class="sr-only"></label>

                        <select class="form-control" id="year">
                          <option value="year" disabled selected>Godina</option>

                          @for ($i = $firstYear; $i <= $lastYear; $i++)
                            <option value="{{ $i }}">{{ $i }}</option>
                          @endfor

                        </select>

                      </div>
                    </div>
                    <div class="form-group gender">
                      <label class="radio-inline">
                        <input type="radio" name="optradio" value=m checked>Muški pol
                      </label>
                      <label class="radio-inline">
                        <input type="radio" name="optradio" value=f >Ženski pol
                      </label>
                    </div>
                    <div class="row">
                      <div class="form-group col-xs-6">
                        <label for="city" class="sr-only">Grad</label>
                        <input id="city" class="form-control input-group-lg reg_name" type="text" name="city" title="Vaš Grad" placeholder="Grad"/>
                      </div>
                      <div class="form-group col-xs-6">
                        <label for="country" class="sr-only"></label>
                        <select class="form-control" id="country">
                          <option value="country" disabled selected>Država</option>

                          @foreach ($countries as $country)
                            <option value="{{ $country->id }}">{{ $country->name }}</option>
                          @endforeach

                        </select>
                      </div>
                    </div>
                  </form><!--Register Now Form Ends-->
                  <p><a href="#login" data-toggle="tab">Već imate nalog?</a></p>  <!-- promeniti class="active" na tab selektore -->
                  <button class="btn btn-primary">Registruj me</button>
                </div><!--Registration Form Contents Ends-->

                <!--Login-->
                <div class="tab-pane" id="login">
                  <h3>Login</h3>
                  <p class="text-muted">Loguj se i započni muvanje</p>

                  <!--Login Form-->
                  <form name="Login_form" id='Login_form'>
                     <div class="row">
                      <div class="form-group col-xs-12">
                        <label for="my-email" class="sr-only">Email</label>
                        <input id="my-email" class="form-control input-group-lg" type="text" name="Email" title="Enter Email" placeholder="Email"/>
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-xs-12">
                        <label for="my-password" class="sr-only">Password</label>
                        <input id="my-password" class="form-control input-group-lg" type="password" name="password" title="Enter password" placeholder="Lozinka"/>
                      </div>
                    </div>
                  </form><!--Login Form Ends-->
                  <p><a href="#">Zaboravio si lozinku?</a></p>
                  <button class="btn btn-primary">Login</button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-6 col-sm-offset-6">

            <!--Social Icons-->
            <ul class="list-inline social-icons">
              <li><a href="#"><i class="icon ion-social-facebook"></i></a></li>
              <li><a href="#"><i class="icon ion-social-twitter"></i></a></li>
              <li><a href="#"><i class="icon ion-social-googleplus"></i></a></li>
              <li><a href="#"><i class="icon ion-social-pinterest"></i></a></li>
              <li><a href="#"><i class="icon ion-social-linkedin"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>