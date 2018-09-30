<template>
<div class="py-4 main">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Login to system</div>

                    <div class="card-body">
                        <form  @submit.prevent="handleLogin"> 

                            <div class="form-group row">
                                <label for="email" class="col-sm-4 col-form-label text-md-right">Email</label>

                                <div class="col-md-6">
                                    <input 
                                    id="email" 
                                    type="email" 
                                    v-model="credentials.email"
                                    class="form-control"
                                    name="email" 
                                        autofocus> 
                                    <span class="invalid-feedback" role="alert">
                                            <strong>Message goes here</strong>
                                        </span> 
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="password" class="col-sm-4 col-form-label text-md-right">Password</label>

                                <div class="col-md-6">
                                    <input 
                                    id="password" 
                                    type="password" 
                                    v-model="credentials.password"
                                    class="form-control"
                                    name="password" 
                                        > 
                                    <span class="invalid-feedback" role="alert">
                                            <strong>Message goes here</strong>
                                        </span> 
                                </div>
                            </div>

                            

                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input 
                                        class="form-check-input"
                                        type="checkbox" name="remember" 
                                        id="remember">

                                        <label class="form-check-label" for="remember">
                                            Remember me
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                    Login
                                    </button>

                                    <!-- <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a> -->
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
import AuthService from "../../../services/AuthService";

export default {
  name: "login",
  data() {
    return {
      credentials: {
        email: "",
        password: ""
      }
    };
  },

  methods: {
    handleLogin() {
      AuthService.login(this.credentials)
        .then(user => {
          console.log(user);
          // dispatch calls action , commit calls mutations
          this.$store.dispatch("global/setCurrentUser", user);
          this.$router.push("/dashboard");
        })
        .catch(error => {
          console.log(error);
        });
    }
  }
};
</script>

<style>
</style>
