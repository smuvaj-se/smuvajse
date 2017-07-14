<template>
	
	<!--Register Form-->
  <form @submit.prevent="validateBeforeSubmit" method="POST" action="/register" name="registration_form" id='registration_form' class="form-inline">
    <div class="row">

      <input type="hidden" name="_token" :value="csrfToken">

      <div class="form-group col-xs-6">
        <label for="name" class="sr-only">Ime</label>
        <input v-validate="validateName" data-vv-as="Ime" id="name" class="form-control input-group-lg" type="text" name="name" title="Ime" placeholder="Ime" autocomplete="off" />
        <transition name="slide-fade" appear>
         <p v-if="errors.has('name')" class="inputError">{{ errors.first('name') }}</p>
        </transition>     
      </div>

      <div class="form-group col-xs-6">
        <label for="surname" class="sr-only">Prezime</label>
        <input v-validate="validateSurname" id="surname" class="form-control input-group-lg" type="text" name="surname" title="Prezime" placeholder="Prezime" autocomplete="off"/>
        <transition name="slide-fade">
        <p v-if="errors.has('surname')" class="inputError">{{ errors.first('surname') }}</p>
        </transition>

      </div>
    </div>
    <div class="row">
      <div class="form-group col-xs-12">
        <label for="email" class="sr-only">Email</label>
        <input v-validate="validateEmail" id="email" class="form-control input-group-lg" type="text" name="email" title="Enter Email" placeholder="Email" autocomplete="off"/>
        <transition name="slide-fade">
          <p v-if="errors.has('email')" class="inputError">{{ errors.first('email') }}</p>
        </transition>

      </div>
    </div>
    <div class="row">
      <div class="form-group col-xs-12">
        <label for="password" class="sr-only">Lozinka</label>
        <input v-validate="validatePassword" id="password" class="form-control input-group-lg" type="password" name="password" title="Enter password" placeholder="Lozinka" autocomplete="off"/>
        <transition name="slide-fade">
          <p v-if="errors.has('password')" class="inputError">{{ errors.first('password') }}</p>
        </transition>

      </div>
    </div>

    <div class="row">
      <div class="form-group col-xs-12">
        <label for="password_confirmed" class="sr-only">Potvrdi Lozinku</label>
        <input v-validate="validatePasswordConfirmation" id="password_confirmed" class="form-control input-group-lg" type="password" name="password_confirmation" title="Enter password" placeholder="Lozinka Ponovljena" autocomplete="off"/>
        <transition name="slide-fade">
          <p v-if="errors.has('password_confirmation')" class="inputError">{{ errors.first('password_confirmation') }}</p>
        </transition>

      </div>
    </div>

    <div class="row">
      <p class="birth"><strong>Datum rođenja</strong></p>
      <div class="form-group col-sm-4 col-xs-12">
        <label for="day" class="sr-only"></label>
        <select v-validate="validateDayOfBirth" name="day" class="form-control" id="day" >
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
        <transition name="slide-fade">
          <p v-if="errors.has('day')" class="inputError">{{ errors.first('day') }}</p>
        </transition>

      </div>
      <div class="form-group col-sm-4 col-xs-12">
        <label for="month" class="sr-only"></label>
        <select v-validate="validateMonthOfBirth" name="month" class="form-control" id="month">
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
        <transition name="slide-fade">
          <p v-if="errors.has('month')" class="inputError">{{ errors.first('month') }}</p>
        </transition>

      </div>

      <div class="form-group col-sm-4 col-xs-12">



        <label for="year" class="sr-only"></label>

        <select v-validate="validateYearOfBirth" name="year" class="form-control" id="year">
          <option value="year" disabled selected>Godina</option>

          <option v-for="year in years">{{ year }}</option>

        </select>
        <transition name="slide-fade">
          <p v-if="errors.has('year')" class="inputError">{{ errors.first('year') }}</p>
        </transition>

      </div>
    </div>
    <div class="form-group gender">
      <label class="radio-inline">
        <input v-validate="validateSex" type="radio" name="sex" value=1>Muški pol
      </label>
      <label class="radio-inline">
        <input v-validate="validateSex" type="radio" name="sex" value=0 >Ženski pol
      </label>
      <transition name="slide-fade">
        <p v-if="errors.has('sex')" class="inputError">{{ errors.first('sex') }}</p>
      </transition>

    </div>
    <div class="row">
      <div class="form-group col-xs-6">
        <label for="city" class="sr-only">Grad</label>
        <input v-validate="validateCity" 
        id="city" class="form-control input-group-lg reg_name" type="text" name="city" title="Vaš Grad" placeholder="Grad"/>
        <transition name="slide-fade">
          <p v-if="errors.has('city')" class="inputError">{{ errors.first('city') }}</p>
        </transition>

      </div>
      <div class="form-group col-xs-6">
        <label for="country" class="sr-only"></label>
        <select v-validate="validateCountry" name="country" class="form-control" id="country">
          <option value="country" disabled selected>Država</option>

          <option v-for="country in countries" v-bind:value="country.id">{{ country.name }}</option>

        </select>
        <transition name="slide-fade">
          <p v-if="errors.has('country')" class="inputError">{{ errors.first('country') }}</p>
        </transition>

      </div>
    </div>
    <p>
      <a @click="switchToLoginTab()" href="#login" data-toggle="tab">Već imate nalog?</a>
    </p>  <!-- promeniti class="active" na tab selektore -->
    <button type="submit" class="btn btn-primary">Registruj me</button>
  </form><!--Register Now Form Ends-->

</template>

<script>
  
  export default {

  created() {

          this.getYears();

          this.getShownCountries();

          this.csrfToken = axios.defaults.headers.common['X-CSRF-TOKEN']

          /*console.log(this.countries)*/

      },

  data () {

      return {

        csrfToken: '',

        years: [],

        countries: [],

        validateName: {

        required: true,
        alpha: true,
        max: 255
        
        },

        validateSurname: {

          required: true,
          alpha: true,
          max: 255


        },

        validateEmail: {

          required: true,
          email: true

        },

        validatePassword: {

          required: true,

        },

        validatePasswordConfirmation: {

          required: true,
          confirmed: 'password'
        },

        validateDayOfBirth: {

          required: true,
          numeric: true
        },

        validateMonthOfBirth: {

          required: true,
          numeric: true
        },

        validateYearOfBirth: {

          required: true,
          numeric: true
        },

        validateSex: {

          required: true,
          between: [0, 1]
        },

        validateCity: {

          required: true,
          alpha: true
        },

        validateCountry: {

          required: true,
          numeric: true
        }

      }

  },

  methods: {

      validateBeforeSubmit() {

          this.$validator.validateAll().then(() => {

          document.getElementById('registration_form').submit();

          }).catch(() => {

             
          });

      },

      getYears() {

          var date = new Date();

          var maxYear = date.getFullYear() - 17;

          var minYear = 1945;

          while(maxYear > minYear) {

            this.years.push(maxYear);

            maxYear--;

          }

      },

      getShownCountries() {

        axios.get('/countries/shown')

        .then(response => {
          
          this.countries = response.data;
          console.log(this.countries);

        })

        .catch(e => {
          this.errors.push(e)

        });

      },

      switchToLoginTab() {

        document.querySelector('.nav-tabs > li:first-child').className = "";
        document.querySelector('.nav-tabs > li:last-child').className = "active";
      }

  }
  
}

</script>

<style lang="scss" scoped>
  
#registration_form {

  input:focus {
    border-color: #98cbe8;
  }

  .inputError{
    
    color: #ef3d47;
    margin-left:10px;
    text-shadow: 0px 1px 1px rgba(0,0,0,0.4),
             0px 8px 13px rgba(0,0,0,0.1),
             0px 18px 23px rgba(0,0,0,0.1);

  }
  
  .btn-primary {

    border-radius: 30px;
  }

}

/* transition animations */
.slide-fade-enter-active {
  transition: all .4s ease;
}
.slide-fade-leave-active {
  transition: all .5s cubic-bezier(1.0, 0.5, 0.8, 1.0);
}
.slide-fade-enter, .slide-fade-leave-to
/* .slide-fade-leave-active for <2.1.8 */ {
  transform: translateY(10px);
  opacity: 0;
}

</style>