<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-3">
                <FilterMenu @childToParent="onChildClick" :jobs="jobs" :locations="locations"></FilterMenu>
            </div>
            <div class="col-md-9">
                <div>
                    <p>
                        <input class="searchBar" type="text"  v-model="searchTerm" v-on:keyup="filterByTerm" placeholder="Search for Job">
                    </p>
                </div>
                <p>{{  }}</p>
                <div class="card">
                    <!--<div class="card-header">Example Component</div>-->
                    <!--<p>List</p>-->
                            <div class="card" v-for="item, k in jobs" :key="k">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        <h5>
                                            <span class="badge badge-success" v-if="(item.published_at.substring(item.published_at.lastIndexOf('-'), item.published_at.indexOf('-'))).substring(1) >= now">New</span>
                                        </h5>
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
        data() {
            return {
                searchTerm: [],
                locations: [],
                timeout: null,
                filter: {
                    title: [],
                    description: [],
                    location: [],
                    company: [],
                },
                now: new Date().getMonth()+1,
                date: ''

            };
        },
        props: {
            jobs: {
                type: Array,
                required: true
            },
            companies: {
                type: Array,
                required: true
            },

        },
        computed: {

        },
        methods:{
             filterByTerm() {
                 const text = this.searchTerm;

                 let filterd = this.jobs;

                 if (text.length) {
                     filterd = this.jobs.filter((entry, id) => {
                         return (
                             entry.description.includes(text) ||
                             entry.title.includes(text) ||
                             entry.location.includes(text)
                             || entry.company.name.includes(text)
                        );
                     });
                 }
                 this.jobs = filterd;

            },
            onChildClick (filters) {

                let filterd = this.jobs;

                //console.log("my filters: ", filters);
                Object.entries(filters).map(([category, filter]) => {
                    if(filter.length) {
                        //console.log("filtering for category: ", category);
                        //console.log("checking if it exists in: ", filterd);

                        if(category == 'company') {
                            filterd = this.jobs.filter((entry, id) => {
                                /*console.log("entry at category: ", entry[category].name);
                                console.log(typeof(entry[category].name))
                                console.log(("my filter: ", filter));
                                console.log(typeof(filter));
                                console.log("boolean? ", filter.includes(entry[category].name));
                                console.log(filter.includes(entry[category].name));*/
                                return filter.includes(entry[category].name);
                            });
                        }
                        else {
                            filterd = this.jobs.filter((entry, id) => {
                                /*console.log("entry at category: ", entry[category]);
                                console.log(("my filter: ", filter));
                                console.log("boolean? ", filter.includes(entry[category]));
                                console.log(filter.includes(entry[category]));*/
                                return filter.includes(entry[category]);
                            });
                        }
                    }

                    this.jobs = filterd;


                })
            },
        },
        mounted() {
            var locations = [];
            $.each(this.jobs, function(i, el){
                if($.inArray(el.location, this.locations) === -1)
                {
                    locations.push(el.location);
                }
            });
            var selects = new Set(locations)
            this.locations = [...selects];
        }
    }
</script>
<style scoped >
    .searchBar {
        width: 100%;
    }
    .badge {
        color: #000;
        border: 3px solid green;
        float: right;
    }
</style>
