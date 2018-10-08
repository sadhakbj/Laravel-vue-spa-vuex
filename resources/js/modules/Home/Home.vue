<template>
      <container>
            <div class="col-md-12">
                  <card>
                        <template slot="title">All Users</template>
                        <template slot="body">
                              <table class="table table-borderless">
                                    <thead>
                                          <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Email</th>
                                          </tr>
                                    </thead>
                                    <tbody>
                                          <tr v-if="users.length == 0">
                                                <td colspan="4" style="text-align: center">No data available</td>
                                          </tr>
                                          <tr v-for="(user, index) in users" :key="user.id" v-else>
                                                <td>{{ index + 1 }}</td>
                                                <td>{{ user.name }}</td>
                                                <td>{{ user.email }}</td>
                                          </tr>
                                    </tbody>
                              </table>
                        </template>
                  </card>
            </div>
      </container>
</template>

<script>
import Card from "../../components/Card";
import Container from "../../components/Container";
import UserService from "../../services/UserService";

export default {
  name: "Home",
  data() {
    return {
      users: []
    };
  },
  components: {
    Container,
    Card
  },
  created() {
    this.getAllUsers();
  },
  methods: {
    getAllUsers() {
      UserService.getAllUsers()
        .then(userList => {
          this.users = userList;
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
