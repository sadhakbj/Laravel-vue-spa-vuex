<template>
    <container>
        <div class="col-md-8">
            <card>
                <template slot="title">Login</template>

                <template slot="body">
                    <form @submit.prevent="handleLogin">

                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label text-md-right">Email</label>

                            <div class="col-md-6">
                                <input id="email" type="email" v-model="credentials.email"
                                       :class="{'form-control': true, 'is-invalid': form.hasError('email')}"
                                       name="email" autofocus
                                       autocomplete="off"
                                >
                                <span v-if="form.hasError('email')" class="invalid-feedback" role="alert">
                                    <strong>{{ form.getError('email') }}</strong>
                                </span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-sm-4 col-form-label text-md-right">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" v-model="credentials.password"
                                       :class="{'form-control': true, 'is-invalid': form.hasError('email')}"
                                       name="password"
                                       autocomplete="off"
                                >
                                <span v-if="form.hasError('password')" class="invalid-feedback" role="alert">
                                    <strong>{{ form.getError('password') }}</strong>
                                </span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember">

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
                </template>
            </card>
        </div>
    </container>
</template>

<script>
  import AuthService from "../../../services/AuthService";
  import Form from "../../../services/FormService";
  import Container from "../../../components/Container";
  import Card from "../../../components/Card";

  export default {
    name: "login",
    data() {
      return {
        credentials: {
          email: "",
          password: ""
        },
        form: new Form()
      };
    },
    components: {
      Container,
      Card
    },
    methods: {
      handleLogin() {
        AuthService.login(this.credentials)
          .then(user => {
            // dispatch calls action , commit calls mutations
            this.$store.dispatch("global/setCurrentUser", user);
            this.$toaster.success("Login successful.");
            this.$router.push("/dashboard");
          })
          .catch(error => {
            if (error.response.status === 422) {
              this.form.record(error.response.data.errors);
            } else if (error.response.status === 401) {
              this.form.record({email: ['The credentials do not match our records.']});
            }
            this.$toaster.error("The credentials do not match our records.");
          });
      }
    }
  };
</script>

<style>
</style>
