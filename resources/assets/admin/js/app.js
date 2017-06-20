import Vue from 'vue'

window.axios = require('axios');

window.axios.defaults.headers.common = {
    'X-CSRF-TOKEN': window.Laravel.csrfToken,
    'X-Requested-With': 'XMLHttpRequest'
};


Vue.component('country-list', {
    template: `
	<tbody>
		<tr is="country" v-for="country in countries.data">
			<td>
				<input
					type="text"
					name="name"
					class="form-control country-name"
					:value="country.name"
				 >
			</td>
			<td>{{country.show? 'Yes' : 'No'}}</td>
			<td>
				<input
					type="text"
					name="order"
					class="form-control country-order"
					:value="country.order"
				 >
			 </td>
			<td>
				<button class="btn btn-primary">{{ country.show ? "Hide" : "Show" }}</button>
				<button class="btn btn-success"
					@click="updateCountry"
					:data-id="country.id">Update</button>
			</td>
		</tr>
	</tbody>
    `,

    props: ['countries'],

    methods: {

    	updateCountry(event) {

    		let countryID = event.target.dataset.id;

    		let parent = event.target.closest('.parent');

    		let countryName = parent.getElementsByClassName('country-name')[0].value;

    		let countryOrder = parent.getElementsByClassName('country-order')[0].value;

    		axios.post('/country/insert', {
				id: countryID,
				name: countryName,
				order: countryOrder
    		})
    		.then(function (response) {
    		    console.log(response);
    		})
    		.catch(function (error) {
    			console.log(error);
    		});

    	}

    }
});

Vue.component('country', {
    template: `<tr class=parent><slot></slot></tr>`
});


Vue.component('pagination-list', {

    template: `
    	<tfoot>
			<div>
			  <tr>
			  	<td v-for="i in 10">{{ i }}</td>
			  </tr>
			</div>
		</tfoot>
    `,

    props: ['countries']
});


let App = new Vue({

	el: '#app-container',

	data: {
		countries: []
	},

	created() {
		this.getCountries()
	},

	methods: {

		getCountries() {

			let self = this;

			axios.get('/admin/countries')
				.then(function (response) {

					self.countries = response.data;

					console.log(self.countries);

				})
				.catch(function (error) {
					console.log(error);
				});

		},

		filterCountries(event) {

			let name = event.target.value;

			let self = this;

			if(name.length > 2) {

				axios.get('/country/search', {
					params: {
						name: name
					}
				})
				.then(function (response) {
					self.countries = response.data;
				})
				.catch(function (error) {
					console.log(error);
				});

			}

			if((event.keyCode === 8 && name.length === 2) || !name.length){
				this.getCountries();
			}
		}
	}

})