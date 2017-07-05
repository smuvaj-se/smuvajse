import Vue from 'vue'

window.Event = new Vue();

window.axios = require('axios');

window.axios.defaults.headers.common = {
    'X-CSRF-TOKEN': window.Laravel.csrfToken,
    'X-Requested-With': 'XMLHttpRequest'
};

Vue.component('visible-filters', {
	template: `
		<div>
			<span
				v-for="query in queryFilters"
				:class="{ 'text-muted': !query.selected }"
				@mouseenter="changeClassMouseenter(query)"
				@mouseout="changeClassMouseout(query)"
				@click="filterVisibility(query)"
			>{{query.name}}</span>
		</div>
	`,

	methods: {

		filterVisibility(selectedFilter) {

			this.queryFilters.forEach(filter => {
				filter.selected = (filter.query == selectedFilter.query);
				filter.active   = (filter.query == selectedFilter.query);
			});

			Event.$emit('country-filter', selectedFilter.query);
		},

		changeClassMouseenter(query) {
			if(!query.active)
				query.selected = true;
		},

		changeClassMouseout(query) {
			if(!query.active)
				query.selected = false;
		}
	},

	data() {
		return {
			queryFilters: [
				{name: "All | ", selected: true, query: "all", active: true},
				{name: "Visible | ", selected: false, query: true, active: false},
				{name: "Hidden", selected: false, query: false, active: false}
			]
		}
	}
});

Vue.component('country-list', {
    template: `
	<tbody>
	    <tr v-for="(country, index) in countries.data" :key="country">
	        <td>
	            <input
	                type="text"
	                name="name"
	                class="form-control country-name"
	                v-model="country.name"
	             >
	        </td>
	        <td>
	            <select name="show" class="form-control country-show" v-model="country.show">
	                <option value="false">No</option>
	                <option value="true">Yes</option>
	            </select>
	        </td>
	        <td>
	            <input
	                type="text"
	                name="order"
	                class="form-control country-order"
	                v-model="country.order"
	             >
	         </td>
	        <td>
	            <button class="btn btn-success"
	                @click="updateCountry(country)"
	                :data-id="country.id">Update</button>
	        </td>
	    </tr>
	</tbody>
    `,

    props: ['countries'],

    methods: {

    	updateCountry(country) {

    		axios.post('/country/insert', {
				id: country.id,
				name: country.name,
				order: country.order,
				show: country.show
    		})
    		.then(function (response) {
    			Event.$emit('country-updated', true);
    		})
    		.catch(function (error) {
    			Event.$emit('country-updated', false, error.response.data);
    		});

    	}

    }
});

Vue.component('pagination-list', {

    template: `
    	<tfoot v-if="countries.total > 20">
			<tr align="center">
				<nav aria-label="Page navigation">
					<ul class="pagination">
						<li :class="countries.current_page == 1 ? 'disabled' : ''">
							<a
								:class="countries.current_page == 1 ? 'disabled' : ''"
								:href="countries.current_page == 1 ? '#' : countries.prev_page_url"
								@click.prevent="
								countries.current_page != 1 ? pagination(countries.current_page - 1) : null"
								aria-label="Previous">
								<span aria-hidden="true">&laquo;</span>
							</a>
						</li>

						<li v-for="i in countries.last_page"
						:class="countries.current_page == i ? 'active' : ''"
						>
							<a
								:href="countries.current_page == i ? '#' : '/country/search?page='+i"
								@click.prevent="pagination(i)"
							>{{i}}</a>
						</li>

						<li :class="countries.current_page == countries.last_page ? 'disabled' : ''">
							<a
								:href="countries.current_page < countries.last_page ? countries.next_page_url : '#'"
								@click.prevent="
								countries.current_page < countries.last_page ? pagination(countries.current_page + 1) : null"
								aria-label="Next">
								<span aria-hidden="true">&raquo;</span>
							</a>
						</li>
					</ul>
				</nav>
    		</tr>
		</tfoot>
    `,

    props: ['countries'],

    methods: {
    	pagination(page) {
    		this.$parent.getCountries({page : page});
    	}
    }
});


let App = new Vue({

	el: '#app-container',

	data: {
		countries: [],
		orderBy: 'desc',
		showMessage: false,
		messageData: {},
	},

	created() {
		this.getCountries(),

		Event.$on('country-updated', (success, response) => {

			if(success) {
				this.messageData.class = 'alert-success';
				this.messageData.text  = '';
				this.messageData.title = 'Country successfully updated';
			} else {
				this.messageData.class = 'alert-danger';
				this.messageData.title = 'There was an error while updating country';
				this.messageData.text  = '';

				for(let key in response){

					this.messageData.text += `
						<p>
							<strong>${key.toUpperCase()} - </strong>
							${response[key][0]}
						</p>
					`;

				}
			}

			this.showMessage = true;
		});

		Event.$on('country-filter', (param) => {
			this.getCountries({show: param});
		})

	},

	methods: {

		getCountries(params) {

			let getParams = {};

			let self = this;

			if(params && params.orderBy){
				this.orderBy = this.orderBy == 'asc' ? 'desc' : 'asc';
			}

			axios.get('/country/search', {params})
				.then(function (response) {
					self.countries  = response.data;
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

					console.log(self.countries);
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