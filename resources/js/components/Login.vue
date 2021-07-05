<template>
    <div class="container">
        <div class="col-md-4"><p></p></div>
        <div class="col-md-4">

            <div id="login" class="formContent">
                <form
                        id="app"
                        @submit="login"
                        action="/add"
                        method="get"
                >
                <h1>Login</h1>
                <input
                        type="text"
                        name="username"
                        v-model="input.username"
                        placeholder="Username"
                />
                <input
                        type="password"
                        name="password"
                        v-model="input.password"
                        placeholder="Password"
                />
                <input
                        type="submit"
                        value="Login"
                >
                </form>
                <div class="alert alert-danger" role="alert" v-if="errorrMessage != '' ">{{errorrMessage}}</div>
            </div>
        </div>
        <div class="col-md-4"><p></p></div>
    </div>

</template>

<script>

    export default {
        name: "Login",
        data() {
            return {
                authenticated: false,
                mockAccount: {
                    username: "admin",
                    password: "jobs"
                },
                input: {
                    username: "",
                    password: "",
                },
                errorrMessage: '',
            }
        },
        methods: {
            login(e) {
                if (this.input.username != "" && this.input.password != "") {
                    if (
                        this.input.username == this.mockAccount.username &&
                        this.input.password == this.mockAccount.password
                    ) {
                        console.log("The username and / or password is correct");
                    } else {
                        this.errorrMessage = "The username and / or password is incorrect";
                        console.log("The username and / or password is incorrect");
                        e.preventDefault();
                    }
                } else {
                    console.log("A username and password must be present");
                    /*e.preventDefault();*/
                }

            },
        },
    };
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

    input[type=password] {
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

    input[type=password]::placeholder {
        color: #cccccc;
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

