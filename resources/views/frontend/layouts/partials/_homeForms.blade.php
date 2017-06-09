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

                  {{-- @if(count($errors))
                    @foreach($errors->all() as $error)
                      {{ $error }}
                    @endforeach
                  @endif --}}
                  <!--Register Form-->
                  <form method="POST" action="/register" name="registration_form" id='registration_form' class="form-inline">
                    <div class="row">
                      {{ csrf_field() }}
                      <div class="form-group col-xs-6">
                        <label for="name" class="sr-only">Ime</label>
                        <input id="name" class="form-control input-group-lg" type="text" name="name" title="Ime" placeholder="Ime"/>
                        @if($errors->has('name'))
                        <span class="red">{{ $errors->first('name') }}</span>
                        @endif
                      </div>
                      <div class="form-group col-xs-6">
                        <label for="surname" class="sr-only">Prezime</label>
                        <input id="surname" class="form-control input-group-lg" type="text" name="surname" title="Prezime" placeholder="Prezime"/>
                        @if($errors->has('surname'))
                        <span class="red">{{ $errors->first('surname') }}</span>
                        @endif
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-xs-12">
                        <label for="email" class="sr-only">Email</label>
                        <input id="email" class="form-control input-group-lg" type="text" name="email" title="Enter Email" placeholder="Email"/>
                        @if($errors->has('email'))
                        <span class="red">{{ $errors->first('email') }}</span>
                        @endif
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-xs-12">
                        <label for="password" class="sr-only">Lozinka</label>
                        <input id="password" class="form-control input-group-lg" type="password" name="password" title="Enter password" placeholder="Lozinka"/>
                        @if($errors->has('password'))
                        <span class="red">{{ $errors->first('password') }}</span>
                        @endif
                      </div>
                    </div>

                    <div class="row">
                      <div class="form-group col-xs-12">
                        <label for="password_confirmed" class="sr-only">Potvrdi Lozinku</label>
                        <input id="password_confirmed" class="form-control input-group-lg" type="password" name="password_confirmation" title="Enter password" placeholder="Lozinka"/>
                        @if($errors->has('password_confirmation'))
                        <span class="red">{{ $errors->first('password_confirmation') }}</span>
                        @endif
                      </div>
                    </div>

                    <div class="row">
                      <p class="birth"><strong>Datum rođenja</strong></p>
                      <div class="form-group col-sm-3 col-xs-6">
                        <label for="month" class="sr-only"></label>
                        <select name="day" class="form-control" id="day">
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
                        @if($errors->has('day'))
                        <span class="red">{{ $errors->first('day') }}</span>
                        @endif
                      </div>
                      <div class="form-group col-sm-3 col-xs-6">
                        <label for="month" class="sr-only"></label>
                        <select name="month" class="form-control" id="month">
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
                        @if($errors->has('month'))
                        <span class="red">{{ $errors->first('month') }}</span>
                        @endif
                      </div>

                      <div class="form-group col-sm-6 col-xs-12">

                        @php

                            $firstYear = 1945;
                            $lastYear  = Carbon\Carbon::now()->year - 18;

                        @endphp

                        <label for="year" class="sr-only"></label>

                        <select name="year" class="form-control" id="year">
                          <option value="year" disabled selected>Godina</option>

                          @for ($i = $firstYear; $i <= $lastYear; $i++)
                            <option value="{{ $i }}">{{ $i }}</option>
                          @endfor

                        </select>
                        @if($errors->has('year'))
                        <span class="red">{{ $errors->first('year') }}</span>
                        @endif
                      </div>
                    </div>
                    <div class="form-group gender">
                      <label class="radio-inline">
                        <input type="radio" name="sex" value=1 checked>Muški pol
                      </label>
                      <label class="radio-inline">
                        <input type="radio" name="sex" value=0 >Ženski pol
                      </label>
                      @if($errors->has('sex'))
                        <span class="red">{{ $errors->first('sex') }}</span>
                      @endif
                    </div>
                    <div class="row">
                      <div class="form-group col-xs-6">
                        <label for="city" class="sr-only">Grad</label>
                        <input id="city" class="form-control input-group-lg reg_name" type="text" name="city" title="Vaš Grad" placeholder="Grad"/>
                        @if($errors->has('city'))
                        <span class="red">{{ $errors->first('city') }}</span>
                        @endif
                      </div>
                      <div class="form-group col-xs-6">
                        <label for="country" class="sr-only"></label>
                        <select name="country" class="form-control" id="country">
                          <option value="country" disabled selected>Država</option>

                          @foreach ($countries as $country)
                            <option value="{{ $country->id }}">{{ $country->name }}</option>
                          @endforeach

                        </select>
                        @if($errors->has('country'))
                        <span class="red">{{ $errors->first('country') }}</span>
                        @endif
                      </div>
                    </div>
                    <p><a href="#login" data-toggle="tab">Već imate nalog?</a></p>  <!-- promeniti class="active" na tab selektore -->
                  <button type="submit" class="btn btn-primary">Registruj me</button>
                  </form><!--Register Now Form Ends-->
                  
                </div><!--Registration Form Contents Ends-->

                <!--Login-->
                <div class="tab-pane" id="login">
                  <h3>Login</h3>
                  <p class="text-muted">Loguj se i započni muvanje</p>

                  <!--Login Form-->
                  <form method="POST" action="/login" name="Login_form" id='Login_form'>
                    {{ csrf_field() }}
                     <div class="row">
                      <div class="form-group col-xs-12">
                        <label for="my-email" class="sr-only">Email</label>
                        <input id="my-email" class="form-control input-group-lg" type="text" name="email" title="Enter Email" placeholder="Email"/>
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-xs-12">
                        <label for="my-password" class="sr-only">Password</label>
                        <input id="my-password" class="form-control input-group-lg" type="password" name="password" title="Enter password" placeholder="Lozinka"/>
                        @if($errors->has('password'))
                        {{ $errors->first('password') }}
                        @endif
                      </div>
                    </div>
                    <p><a href="#">Zaboravio si lozinku?</a></p>
                    <button type="submit" class="btn btn-primary">Login</button>
                  </form><!--Login Form Ends-->
                  
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