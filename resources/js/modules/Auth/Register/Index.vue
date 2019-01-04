<template>
    <container>
        <div class="col-md-8">
            <card>
                <template slot="title">Register</template>
                <template slot="body">
                    <form @submit.prevent="handleRegister">

                        <div class="form-group row">
                            <label for="text" class="col-sm-4 col-form-label text-md-right">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" :class="{'form-control': true, 'is-invalid': form.hasError('name')}" name="name" v-model="user.name" autofocus>
                                <span v-if="form.hasError('name')" class="invalid-feedback" role="alert">
                                    <strong>{{ form.getError('name') }}</strong>
                                </span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label text-md-right">Email</label>

                            <div class="col-md-6">
                                <input id="email" type="email" :class="{'form-control': true, 'is-invalid': form.hasError('email')}" name="email" v-model="user.email">
                                <span v-if="form.hasError('email')" class="invalid-feedback" role="alert">
                                    <strong>{{ form.getError('email') }}</strong>
                                </span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-sm-4 col-form-label text-md-right">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" :class="{'form-control': true, 'is-invalid': form.hasError('password')}" name="password" v-model="user.password">
                                <span v-if="form.hasError('password')" class="invalid-feedback" role="alert">
                                    <strong>{{ form.getError('password') }}</strong>
                                </span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password_confirmation" class="col-sm-4 col-form-label text-md-right">Password Confirmation</label>

                            <div class="col-md-6">
                                <input id="password_confirmation" type="password" :class="{'form-control': true, 
                                        'is-invalid': form.hasError('password_confirmation')}" name="password_confirmation" v-model="user.password_confirmation">
                                <span v-if="form.hasError('password_confirmation')" class="invalid-feedback" role="alert">
                                    <strong>{{ form.getError('password_confirmation') }}</strong>
                                </span>
                            </div>

                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>

                    </form>
                </template>
            </card>
        </div>
    </container>
</template>

<script type="text/ecmascript-6">
import Container from "../../../components/Container";
import Card from "../../../components/Card";
import AuthService from "../../../services/AuthService";
import Form from "../../../services/FormService";

export default {
  name: "register",
  data() {
    return {
      user: {},
      form: new Form()
    };
  },
  components: {
    Card,
    Container
  },
  methods: {
    handleRegister() {
      AuthService.register(this.user)
        .then(user => {
          this.user = {};
          this.$router.push("/login");
        })
        .catch(error => {
          if (error.response.status === 422) {
            this.form.record(error.response.data.errors);
            this.$toaster.error("The form has some validation errors.");
          }
        });
    }
  }
};
</script>

<style>
</style>
