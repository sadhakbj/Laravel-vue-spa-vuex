<template>
<div class="py-4 main">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Register to system</div>

                <div class="card-body">
                    <form>

                            <div class="form-group row">
                            <label for="text" class="col-sm-4 col-form-label text-md-right">Name</label>

                            <div class="col-md-6">
                                <input 
                                id="name" 
                                type="text" 
                                class="form-control"
                                name="name" 
                                     autofocus> 
                                <span class="invalid-feedback" role="alert">
                                        <strong>Message goes here</strong>
                                    </span> 
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label text-md-right">Email</label>

                            <div class="col-md-6">
                                <input 
                                id="email" 
                                type="email" 
                                class="form-control"
                                name="email" 
                                     > 
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
                                class="form-control"
                                name="password" 
                                     > 
                                <span class="invalid-feedback" role="alert">
                                        <strong>Message goes here</strong>
                                    </span> 
                            </div>
                        </div>


                  <div class="form-group row">
                              <label for="password_confirmation" class="col-sm-4 col-form-label text-md-right">Password Confirmation</label>

                              <div class="col-md-6">
                                    <input 
                                    id="password_confirmation" 
                                    type="password" 
                                    class="form-control"
                                    name="password_confirmation" 
                                          > 
                                    <span class="invalid-feedback" role="alert">
                                          <strong>Message goes here</strong>
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
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</template>

<script>
export default {
  name: "register"
};
</script>

<style>
</style>
