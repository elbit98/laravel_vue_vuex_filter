<template>
    <div class="container">
        <div class="com-md-12 d-flex justify-content-between justify-content-md-center">
            <div class="form-group">
                <label for="name">Name</label>
                <input v-model="query.name" name="name" id="name" type="text" class="form-control" placeholder="Name"
                       aria-label="Name"
                       aria-describedby="basic-addon2">
            </div>

            <div class="form-group">
                <label for="bedrooms">Bedrooms</label>
                <select name="bedrooms" id="bedrooms" class="form-control" v-model="query.bedrooms">
                    <option value="0"></option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
            </div>

            <div class="form-group">
                <label for="bathrooms">Bathrooms</label>
                <select name="bathrooms" id="bathrooms" class="form-control" v-model="query.bathrooms">
                    <option value="0"></option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                </select>
            </div>

            <div class="form-group">
                <label for="storeys">Storeys</label>
                <select name="storeys" id="storeys" class="form-control" v-model="query.storeys">
                    <option value="0"></option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                </select>
            </div>

            <div class="form-group">
                <label for="garages">Garages</label>
                <select name="garages" id="garages" class="form-control" v-model="query.garages">
                    <option value="0"></option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                </select>
            </div>

            <div class="pl-3 row">
                <div class="form-group">
                    <input v-model="query.min_price" name="min_price" type="text" class="form-control"
                           placeholder="Price min"
                           aria-label="Price min"
                           aria-describedby="basic-addon2">

                    <input v-model="query.max_price" name="max_price" type="text" class="form-control"
                           placeholder="Price max"
                           aria-label="Price max"
                           aria-describedby="basic-addon2">
                </div>
            </div>

            <div class="pl-3 form-group">
                <button class="btn btn-primary" @click="searchHouses" type="button">
                    Search
                </button>
            </div>
        </div>


        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Bedrooms</th>
                <th scope="col">Bathrooms</th>
                <th scope="col">Storeys</th>
                <th scope="col">Garages</th>
                <th scope="col">Price</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="house in houses">
                <th scope="row">{{ house.id }}</th>
                <td>{{ house.name }}</td>
                <td>{{ house.bedrooms }}</td>
                <td>{{ house.bathrooms }}</td>
                <td>{{ house.storeys }}</td>
                <td>{{ house.garages }}</td>
                <td>{{ house.price }}</td>
            </tr>
            </tbody>
        </table>

        <h2 v-if="houses.length == 0">Нет никаких результатов</h2>

    </div>
</template>

<script>
    import MyAwesomeLoaderComponent from "./MyAwesomeLoaderComponent";

    export default {
        name: "Dashboard",
        data() {
            return {
                query: {},
            }
        },
        mounted() {
            this.$store.dispatch('SEARCH_HOUSES', this.query)
        },
        computed: {
            houses() {
                return this.$store.state.houses
            }
        },
        methods: {
            searchHouses() {
                this.$preloaders.open({
                    loaders: { //Object
                        myAwesomeLoader: {
                            container: '#app',
                            cssStyle: {backgroundColor: 'pink'},
                            overlayStyle: {opacity: 1},
                            component: MyAwesomeLoaderComponent
                        },
                    }
                });

                this.$store.dispatch('SEARCH_HOUSES', this.query)
                this.$preloaders.close()
            }
        }
    }
</script>

<style scoped>

</style>
