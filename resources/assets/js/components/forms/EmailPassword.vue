<template>

	<div id="email_password">

		<p v-if="messages !== ''">{{ messages }}</p>

		<p v-else-if="errorsServer !== ''">{{ errorsServer }}</p>

		<p v-else>Enter your email and we will send you a link to reset your password.</p>

		<form @submit.prevent="validateBeforeSubmit" method="POST" action="/password/email" name="email_password" id='email_password_form'>

			<div class="row">

				<input type="hidden" name="_token" :value="csrfToken">

				<div class="form-group col-xs-12">

					<label for="my-email" class="sr-only">Email</label>

					<input v-validate="validateEmail" id="my-email" class="form-control input-group-lg" type="text" name="email" title="Enter Email" placeholder="Email"/>

					<transition name="slide-fade">

						<p v-if="errors.has('email')" class="inputError">{{ errors.first('email') }}</p>

					</transition>        

				</div>

			</div>


			<button type="submit" class="btn btn-primary">Send Password Reset Link</button>

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

				validateEmail: {

					required: true,

					email: true

				}

			}
		},

		created() {

			this.csrfToken = axios.defaults.headers.common['X-CSRF-TOKEN'];

			console.log(this.messages)

			console.log(this.errorsServer)

		},

		methods: {

			validateBeforeSubmit() {

				this.$validator.validateAll().then(() => {

					document.getElementById('email_password_form').submit();

				}).catch(() => {


				});

			}

		}
}

</script>

<style lang="scss">

	#email_password {

	margin-top: 10%;
	},
	
	#email_password_form {

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