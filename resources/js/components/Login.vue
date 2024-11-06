<template>
     <div class="login login-with-news-feed">
            <!-- begin news-feed -->
            <div class="news-feed">
                <div class="news-image" style="background-image: url(../assets/img/login-bg/login-bg.jpg)"></div>
                <div class="news-caption">
                    <h4 class="caption-title"><b>BIOMED</b> Admin Application</h4>
                    <p>
                        Leading the way in open access publishing in biology, health and medicine
                    </p>
                </div>
            </div>
            <!-- end news-feed -->
            <!-- begin right-content -->
            <div class="right-content">
                <!-- begin login-header -->
                <div class="login-header">
                    <div class="brand">
                        <span class="logo"></span> <b>BIOMEd</b> Admin
                        <small>Lorem Ipsum</small>
                    </div>
                    <div class="icon">
                        <i class="fa fa-sign-in"></i>
                    </div>
                </div>
                <!-- end login-header -->
                <!-- begin login-content -->
                <div class="login-content">
                    <form  @submit.prevent="loginUser" class="margin-bottom-0">
                        <div class="form-group m-b-15">
                            <input v-model="form.username" type="text" class="form-control form-control-lg" placeholder="Username" required />
                        </div>
                        <div class="form-group m-b-15">
                            <input v-model="form.password" type="password" class="form-control form-control-lg" placeholder="Password" required />
                        </div>
                    
                        <div class="login-buttons">
                            <button type="submit" class="btn btn-success btn-block btn-lg">Sign me in</button>
                        </div>
                        <!-- <div class="m-t-20 m-b-40 p-b-40 text-inverse">
                            Not a member yet? Click <a href="register_v3.html" class="text-success">here</a> to register.
                        </div> -->
                        <hr />
                        <p class="text-center text-grey-darker">
                            &copy; Biomed
                        </p>
                    </form>
                </div>
                <!-- end login-content -->
            </div>
            <!-- end right-container -->
        </div>
  </template>
  
  <script>
 
  export default {
    name: "Login",
    data(){
        return{
            form:{
                username: '',
                password: ''
            }
        }
    }, 
    methods:{ 
        loginUser() {
            axios
                .post('/api/login', this.form)
                .then(response => {
                    if (response.data.user_role == 'client') {
                        localStorage.setItem('userId', response.data.userId);
                        localStorage.setItem('api_token', response.data.api_token);
                    //    this.triggerSuccess();
                        
                        setTimeout(() => {
                            this.$router.push({ name: 'Client Dashboard', query: { api_token: response.data.api_token } });
                        }, 1000);
                    } else {
                        setTimeout(() => {
                            this.$router.push({ name: 'Dashboard', query: { api_token: response.data.api_token } });
                        }, 1000);
                    //    this.triggerError();
                       
                        setTimeout(() => {
                            // this.$router.push({ name: 'Login' });

                        }, 1000);
                    }
                })
                .catch(error => {

                    if (error.response && error.response.data) {
                        // Server returned an error response
                        this.errors = error.response.data.errors;
                    } else {
                        // Error occurred during the request
                        console.log(error);
                    }
                });
        },
    }
  };
  </script>
  