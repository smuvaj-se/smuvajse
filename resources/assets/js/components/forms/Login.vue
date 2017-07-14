<template>

  <!--Login Form-->
  <form @submit.prevent="validateBeforeSubmit" method="POST" action="/login" name="login_form" id='login_form' autocomplete="off">

   <div class="row">

    <input type="hidden" name="_token" :value="csrfToken">

    <div class="form-group col-xs-12">

      <input @focus="loginFailed = false" v-validate="validateEmail" id="my-email" class="form-control input-group-lg" type="text" name="email" title="Enter Email" placeholder="Email"/>   

      <transition name="slide-fade">
        <!-- js validation -->
        <p class="inputError" v-if="errors.has('email')">{{ errors.first('email') }}</p>

      </transition>

      <transition name="slide-fade">

        <p class="inputError" v-if="loginFailed">{{ loginErrors }}</p>

      </transition>

    </div>
  </div>
  <div class="row">
    <div class="form-group col-xs-12">

      <input @focus="loginFailed = false" v-validate="validatePassword" id="my-password" class="form-control input-group-lg" type="password" name="password" title="Enter password" placeholder="Lozinka"/>
      
      <transition name="slide-fade">
        <!-- js validation -->
        <p class="inputError" v-if="errors.has('password')">{{ errors.first('password') }}</p>
      </transition>

    </div>
  </div>
  <p><a href="/password/reset">Zaboravio si lozinku?</a></p>
  <button type="submit" class="btn btn-primary">Login</button>
</form><!--Login Form Ends-->

</template>

<script>

  export default {

    props: {

      loginErrors: {

        type: String,

        required: false
      }

    },

    created() {

      this.csrfToken = axios.defaults.headers.common['X-CSRF-TOKEN'];

      if (this.loginErrors !== '') {

        this.loginFailed = true;

      }

    },

    data () {

      return {

        loginFailed: false,

        csrfToken: '',

        validateEmail: {

          required: true,
          
          email: true

        },

        validatePassword: {

          required: true,

        }

      }

    },

    methods: {

      validateBeforeSubmit() {

        this.$validator.validateAll().then(() => {

          document.getElementById('login_form').submit();

        }).catch(() => {


        });

      }

    }

  }

</script>

<style lang="scss" scoped>

  #login_form {

    input {

      border-radius: 30px;
      box-shadow: none;
      border-color: none;
      margin: 0px;
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