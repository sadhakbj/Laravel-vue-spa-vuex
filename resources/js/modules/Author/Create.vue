<template>
    <container>
        <div class="col-md-12">
            <card>
                <template slot="title">Add New Author</template>
                <template slot="body">
                    <form @submit.prevent="handleRegister">

                        <div class="form-group row">
                            <label for="name" class="col-sm-4 col-form-label text-md-right">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text"
                                       :class="{'form-control': true, 'is-invalid': form.hasError('name')}"
                                       name="name" v-model="author.name" autofocus>
                                <span v-if="form.hasError('name')" class="invalid-feedback" role="alert">
                                    <strong>{{ form.getError('name') }}</strong>
                                </span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label text-md-right">Email</label>

                            <div class="col-md-6">
                                <input id="email" type="email"
                                       :class="{'form-control': true, 'is-invalid': form.hasError('email')}"
                                       name="email" v-model="author.email">
                                <span v-if="form.hasError('email')" class="invalid-feedback" role="alert">
                                    <strong>{{ form.getError('email') }}</strong>
                                </span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address" class="col-sm-4 col-form-label text-md-right">Address</label>

                            <div class="col-md-6">
                                <input id="address" type="text"
                                       :class="{'form-control': true, 'is-invalid': form.hasError('address')}"
                                       name="address" v-model="author.address">
                                <span v-if="form.hasError('address')" class="invalid-feedback" role="alert">
                                    <strong>{{ form.getError('address') }}</strong>
                                </span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="info" class="col-sm-4 col-form-label text-md-right">Information</label>
                            <div class="col-md-6">
                                <textarea id="info" type="password" :class="{'form-control': true,
                                        'is-invalid': form.hasError('info')}" name="password_confirmation"
                                          v-model="author.info">
                                </textarea>
                                <span v-if="form.hasError('info')" class="invalid-feedback" role="alert">
                                    <strong>{{ form.getError('info') }}</strong>
                                </span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="info" class="col-sm-4 col-form-label text-md-right">Image</label>
                            <div class="col-md-6">
                                <input type="file" @change="handleFileChange" name="image" accept="image/*">
                                <span v-if="form.hasError('image')" class="invalid-feedback" role="alert">
                                    <strong>{{ form.getError('image') }}</strong>
                                </span>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Add
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
  import Container from "../../components/Container";
  import Card from "../../components/Card";
  import AuthorService from "../../services/AuthorService";
  import Form from "../../services/FormService";

  export default {
    name: "create-author",
    data() {
      return {
        author: {
          name: '',
          email: '',
          address: '',
          info: '',
        },
        image: null,
        form: new Form()
      };
    },
    components: {
      Card,
      Container
    },
    methods: {
      handleRegister() {
        const formData = new FormData();
        if (this.image !== null) {
          formData.append('image', this.image, this.image.name);
        }
        formData.append('name', this.author.name);
        formData.append('email', this.author.email);
        formData.append('info', this.author.info);
        formData.append('address', this.author.address);
        AuthorService.create(formData)
          .then(author => {
            this.$router.push("/login");
          })
          .catch(error => {
            if (error.response.status === 422) {
              this.form.record(error.response.data.errors);
              this.$toaster.error("The form has some validation errors.");
            }
          });
      },
      /**
       * Handle the file change event.
       */
      handleFileChange(event) {
        this.image = event.target.files[0];
      }
    }
  };
</script>

<style>
</style>
