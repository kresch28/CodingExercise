<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-3">
                <div class="menu">
                        <p>Locations:</p>
                        <div class="form-check" v-for="item,k in locations" :key="item">
                            <input class="form-check-input" type="checkbox" name="flexCheckDefault" id="location" v-bind:value="item" v-model="k">
                            <label class="form-check-label" for="location">
                                {{item}}
                            </label>
                        </div>
                        <p></p>
                        <p>Companies:</p>
                        <div class="form-check" v-for="item in companies" :key="item">
                            <input class="form-check-input" type="checkbox" name="flexCheckDefault" id="company" v-model="company">
                            <label class="form-check-label" for="company">
                                {{item.name}}
                            </label>
                        </div>
                        <p></p>
                        <p>Search for a job:</p>
                        <p>
                            <input type="text">
                        </p>
                        <p>
                            <input
                                    type="submit"
                                    value="Submit"
                                    @click="checkForm"
                            >
                        </p>
                </div>
            </div>
            <div class="col-md-9">
                <div class="card">
                    <!--<div class="card-header">Example Component</div>-->
                    <!--<p>List</p>-->
                            <div class="card" v-for="item in jobs" :key="item.id">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        <div class="ms-2 me-auto">
                                            <div class="fw-bold">{{item.title}}</div>
                                            {{item.description}}
                                            <p></p>
                                            <div class="container">
                                                <div class="row justify-content-center">
                                                    <div class="col-md-4"><p>{{item.company.name}}</p></div>
                                                    <div class="col-md-2"><p class="text-primary">{{item.location}}</p></div>
                                                    <div class="col-md-6">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="container">
                                                <div class="row justify-content-center">
                                                    <div class="col-md-8"></div>
                                                    <div class="col-md-4">
                                                        <p>Published at: {{item.published_at.substr(0,item.published_at.indexOf('T'))}} {{item.published_at.substring(
                                                            item.published_at.lastIndexOf("T") + 1,
                                                            item.published_at.lastIndexOf("."))}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data: () => ({
            allLocations: [],
            location: '',
            company: ''
                     }),
        props: {
            jobs: {
                type: Array,
                required: true
            },
            companies: {
                type: Array,
                required: true
            },
            locations: {
                type: Array
            },

        },
        methods:{
            checkForm: function () {
                console.log(this.location);
                if(this.location) {
                    console.log(this.location);
                }
                if(this.company) {
                    console.log(this.company);
                }
            },
        },
        mounted() {
            console.log(this.jobs);
            console.log(this.companies);
            var locations = [];
            $.each(this.jobs, function(i, el){
                console.log(el.location);
                if($.inArray(el.location, this.locations) === -1)
                {
                    locations.push(el.location);
                }
            });
            var selects = new Set(locations)
            this.locations = [...selects];
            /*for (item in this.locations) {
                this.allLocations.push({'location':item})
            }
            console.log(this.allLocations);*/
        }
    }
</script>
