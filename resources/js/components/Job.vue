<template>
    <div class="container">
        <h1>Add a new Job Ad:</h1>
        <div class="col-md-4"><p></p></div>
        <div class="col-md-4">

            <div id="login" class="formContent">
                <form
                        id="app"
                        @submit="addJob"
                        action="/"
                        method="post"
                >
                    <input
                            type="text"
                            name="title"
                            v-model="input.title"
                            placeholder="Title"
                    />
                    <input
                            type="text"
                            name="description"
                            v-model="input.description"
                            placeholder="Description"
                    />
                    <input
                            type="text"
                            name="location"
                            v-model="input.location"
                            placeholder="Location"
                    />
                    <select name="company" v-model="input.company">
                        <option v-for="item in companies" v-bind:value="item.id" :key="item.id">{{ item.name }}</option>
                    </select>
                    <input
                            type="submit"
                            value="Add"
                    >
                </form>
            </div>
        </div>
        <div class="col-md-4"><p></p></div>
    </div>
</template>

<script>
    export default {
        name: "Job",
        data() {
            return {
                input: {
                    title:'',
                    description:'',
                    location: '',
                    company: '',
                },
                companies: this.loadData(),
            }
        },
        methods:{
            addJob: function () {
                console.log('blubb' + this.input.company)
                axios.post('/', {
                    'title' : this.title,
                    'description': this.description,
                    'location': this.location,
                    'company': this.company
                }).then((res)=> {
                    console.log(res);
                    //alert(res);
                }).catch(function(error){
                    //console.log(error);
                    //alert(error);
                });
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
            mounted() {
                this.loadData();

            }
        },
    }
</script>
<style scoped>
    .formContent {
        -webkit-border-radius: 10px 10px 10px 10px;
        border-radius: 10px 10px 10px 10px;
        background: #fff;
        padding: 30px;
        width: 90%;
        max-width: 450px;
        position: relative;
        padding: 0px;
        -webkit-box-shadow: 0 30px 60px 0 rgba(0,0,0,0.3);
        box-shadow: 0 30px 60px 0 rgba(0,0,0,0.3);
        text-align: center;
    }

    input[type=text] {
        background-color: #f6f6f6;
        border: none;
        color: #0d0d0d;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 14px;
        margin: 5px;
        width: 85%;
        border: 2px solid #f6f6f6;
        -webkit-border-radius: 5px 5px 5px 5px;
        border-radius: 5px 5px 5px 5px;
    }

    input[type=text]::placeholder {
        color: #cccccc;
    }

    select {
        background-color: #f6f6f6;
        border: none;
        color: #0d0d0d;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 14px;
        margin: 5px;
        width: 85%;
        border: 2px solid #f6f6f6;
        -webkit-border-radius: 5px 5px 5px 5px;
        border-radius: 5px 5px 5px 5px;
    }

    option {
        text-align: center;
    }

    input[type=submit]  {
        background-color: #56baed;
        border: none;
        color: white;
        padding: 15px 80px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        text-transform: uppercase;
        font-size: 13px;
        -webkit-box-shadow: 0 10px 30px 0 rgba(95,186,233,0.4);
        box-shadow: 0 10px 30px 0 rgba(95,186,233,0.4);
        -webkit-border-radius: 5px 5px 5px 5px;
        border-radius: 5px 5px 5px 5px;
        margin: 5px 20px 40px 20px;
    }

</style>
