<template>
	
	<!-- Landing Page Contents
  ================================================= -->
  
  <div id="lp-register">
    <div class="container wrapper">
      <div class="row">
        <div class="col-sm-5">
          <div class="intro-texts">
            <h1 class="text-white">Smuvaj se!<br>Šta čekaš???</h1>
            <p>Friend Finder is a social network template that can be used to connect people. The template offers Landing pages, News Feed, Image/Video Feed, Chat Box, Timeline and lot more. <br /> <br />Why are you waiting for? Buy it now.</p>
            <button class="btn btn-primary">Detaljnije</button>
          </div>
        </div>
        <div class="col-sm-6 col-sm-offset-1">
          <div class="reg-form-container">

            <!-- Register/Login Tabs-->
            <div class="reg-options">
              <ul class="nav nav-tabs">
                <li v-bind:class="{'active' : failedLoggin}"><a href="#register" data-toggle="tab">Register</a></li>
                <li v-bind:class="{'active' : !failedLoggin}"><a href="#login" data-toggle="tab">Login</a></li>
              </ul><!--Tabs End-->
            </div>

            <!--Registration Form Contents-->
            <div class="tab-content">
              <div v-bind:class="{'tab-pane' : true, 'active' : failedLoggin}" id="register">
                <h3>Regustruj se !!!</h3>
                <p class="text-muted">Pridruži nam se odmah. Započni muvanje </p>
                
                <!--Register Form-->                         

                <slot name="register-form"></slot>
                
              </div><!--Registration Form Contents Ends-->

              <!--Login-->
              <div v-bind:class="{'tab-pane' : true, 'active' : !failedLoggin}" id="login">

                <h3>Login</h3>
                <p class="text-muted">Loguj se i započni muvanje</p>

                <!--Login Form-->

                <slot name="login-form"></slot>
                
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

</template>

<script>

  export default {

  	mounted() {

  		console.log(this.loginErrors)
  	},

  	props: {

      loginErrors: {

        type: String,

        required: false
      }

    },

    methods: {

    	
    },

    computed: {

      /*loginErrorsObj: function () {

        if (this.loginErrors != "") {

          console.log(JSON.parse(this.loginErrors))

          return JSON.parse(this.loginErrors);
        }
      },*/

      failedLoggin: function() {

       if (this.loginErrors === "") {

        return true;
      }
    }
  }
  
}

</script>