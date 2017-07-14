<template>

    <div id="reset_password">

        <p v-if="messages !== ''">{{ messages }}</p>

        <p v-else="errorsServer !== ''">{{ errorsServer }}</p>

        <form @submit.prevent="validateBeforeSubmit" id="reset_password_form" class="form-horizontal" role="form" method="POST" action="/password/reset">

            <div class="row">

                <input type="hidden" name="_token" :value="csrfToken">

                <input type="hidden" name="token" :value="token">

                <div class="form-group col-xs-12">
                    
                    <input v-validate="validateEmail" id="email" type="email" class="form-control" name="email" value="" required autofocus placeholder="Email">


                    <transition name="slide-fade">

                        <p v-if="errors.has('email')" class="inputError">{{ errors.first('email') }}</p>

                    </transition>
                </div>

                <div class="form-group col-xs-12">
                                        
                    <input v-validate="validatePassword" id="password" type="password" class="form-control" name="password" required placeholder="Lozinka">             


                    <transition name="slide-fade">

                    <p v-if="errors.has('password')" class="inputError">{{ errors.first('password') }}</p>

                    </transition>
                </div>

                <div class="form-group col-xs-12">
                   
                    <input v-validate="validatePasswordConfirmation" id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="Lozinka Ponovljena">


                    <transition name="slide-fade">

                        <p v-if="errors.has('password_confirmation')" class="inputError">{{ errors.first('password_confirmation') }}</p>

                    </transition>
                </div>


                <button type="submit" class="btn btn-primary">
                    Reset Password
                </button>



            </div>
        </form>

    </div>

</template>

<script type="text/javascript">

    export default {

        props: {

            messages: {

                type: String
            },

            errorsServer: {

                type: String
            }

        },

        data() {

            return {

                csrfToken: '',

                token: '',

                validateEmail: {

                    required: true,

                    email: true

                },

                validatePassword: {

                  required: true

              },

              validatePasswordConfirmation: {

                  required: true,
                  confirmed: 'password'
              }

          }
      },

      created() {

        this.csrfToken = axios.defaults.headers.common['X-CSRF-TOKEN'];

        var url = window.location.href;

        var query = 'reset';

        this.token = url.slice((url.indexOf(query) + query.length), url.length);

    },

    methods: {

        validateBeforeSubmit() {

            this.$validator.validateAll().then(() => {

                document.getElementById('reset_password_form').submit();

            }).catch(() => {


            });

        }

    }
}

</script>

<style lang="scss">

    #reset_password {

        margin-top: 10%;
    },
    
    #reset_password_form {

        margin-top: 20%;

        input {

            border-radius: 30px;
            box-shadow: none;
            border-color: none;
            margin: 0px;

            &:focus{
              /* box-shadow: none;
              border-color: none; */

          }
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
    transition: all .5s ease;
}
.slide-fade-leave-active {
    transition: all .8s cubic-bezier(1.0, 0.5, 0.8, 1.0);
}
.slide-fade-enter, .slide-fade-leave-to
/* .slide-fade-leave-active for <2.1.8 */ {
    transform: translateX(10px);
    opacity: 0;
}

</style>