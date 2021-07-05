<template>
    <div class="container">
        <p>Blubb</p>
        <h1>Add a new Job Ad:</h1>
        <div class="col-md-4"><p></p></div>
        <div class="col-md-4">

            <div id="login" class="formContent">
                <form
                        id="app"
                        action="/"
                        v-on:submit="addJob"
                >
                    <input type="hidden" name="_method" value="POST">

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
                    <select name="myselect" v-for="item in companies" :key="item.id">
                        <option>{{ item }}</option>
                    </select>
                    <input
                            type="submit"
                            value="Add Job"
                    >
                </form>
            </div>
        </div>
        <div class="col-md-4"><p></p></div>
    </div>
</template>

<script>
    export default {
        name: "Add",
        data(){
            return{
                title:'',
                description:'',
                location: '',
                company: '',
            }
        },
        methods: {
            addJob: function () {
                console.log('add' + this.company)
                axios.post('/', {
                    'title' : this.title,
                    'description': this.description,
                    'location': this.location,
                    'company': this.company
                }).then((res)=> {
                    console.log(res);
                    alert(res);
                }).catch(function(error){
                    console.log(error);
                    alert(error);
                });
            }
        }
    }
</script>
