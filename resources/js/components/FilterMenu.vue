<template>
    <div class="menu">
        <h2>Filter Menu:</h2>
        <!--<input id="field1" type="text" v-on:keyup="search" v-model="searchTerm">-->

        <form
                id="app"
                @submit="checkForm"
                action="/"
                method="get"
        >
        <p>Locations:</p>
        <div class="form-check" v-for="item, k in locations">
            <input class="form-check-input" type="checkbox" name="flexCheckDefault" id="location" v-bind:value="item" v-model="filter.location">
            <label class="form-check-label" for="location">
                {{item}}
            </label>
        </div>
        <p></p>
        <p>Companies:</p>
        <div class="form-check" v-for="item, k in companies">
            <input class="form-check-input" type="checkbox" name="flexCheckDefault" id="company" v-bind:value="item.name" v-model="filter.company">
            <label class="form-check-label" for="company">
                {{item.name}}
            </label>
        </div>
        <p></p>
        <p>
            <input
                    type="submit"
                    value="Submit"
            >
        </p>
        </form>
    </div>
</template>

<script>
    export default {
        name: "FilterMenu",
        props: {
            jobs: {
                type: Array,
                required: true
            },
            locations: {
                type: Array
            },

        },
        data() {
            return {
                filter: {
                    title: [],
                    description: [],
                    location: [],
                    company: [],
                },
                companies: [],
                searchTerm: [],
            }
        },
        computed: {

        },
        methods:{
            checkForm: function (e) {
                this.$emit('childToParent', this.filter);
                e.preventDefault();
            },
            loadData: function () {
                axios.get('/companies').then(res => {
                    if(res.status == 200) {
                        console.log(res);
                        this.companies = res.data.companies;
                    }
                }).catch(err => {
                    console.log(err);
                })
            },
        },
        mounted() {
            this.loadData();
        }
    }
</script>

<style scoped>

</style>
