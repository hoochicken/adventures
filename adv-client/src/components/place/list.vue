<template>
    <div class="container">
        <h1>Places</h1>
        <search @resetSearch="resetSearch" @search="search" />
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <template v-for="item in places">
                <tr v-bind:key="item.id" v-bind:class="(currentId === item.id) ? 'bg-dark text-light' : ''">
                    <td>{{ item.id }}</td>
                    <td>{{ item.name }}</td>
                    <td>{{ item.description }}</td>
                    <td><button class="btn btn-success text-white update" @click="updatePlace(item.id)">Update</button><button class="btn btn-danger delete" @click="deletePlace(item.id)">Delete</button></td>
                </tr>
            </template>
            </tbody>
        </table>
        <pagination :totalPage="listState.totalPage" @btnClick="changePage"></pagination>
        <button class="btn btn-success " @click="$router.push('/place/create')">Create New Place</button>

        <div class="alert alert-success alert-dismissible fade show" role="alert">
            With Bootstrap!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
</template>

<script>
  import Search from "../global/search";
  export default {
    name: 'place-list',
      components: {Search},
      data() {
        return {
            places: [],
            currentId: 0,
            response: {},
            searchterm: '',
            listState: {
                maxResults: 3,
                currentPage:0,
                totalPage: 0,
                totalItems: 0
            },
            listStateDefault: {
                maxResults: 3,
                currentPage:0,
                totalPage: 0,
                totalItems: 0
            }
        }
    },
    async mounted () {
      this.list()
    },
    methods: {
      async list() {
          let params = new URLSearchParams();
          params.append('searchterm', this.searchterm);
          params.append('listState', JSON.stringify(this.listState));
          const response = await this.axios.post('/place/list', params);
          this.places = response.data.items;
          this.listState = response.data.listState;
      },
      async deletePlace(id) {
          if (!confirm('Really delete this place???')) {
              return;
          }
          await this.axios.post('/place/delete/' + id);
          this.list();
      },
      updatePlace(id) {
          this.$router.push('/place/update/' + id);
      },
      async search(searchterm) {
          this.searchterm = searchterm;
          this.listState = this.listStateDefault;
          this.list();
      },
      async resetSearch() {
          this.searchterm = '';
          this.listState = this.listStateDefault;
          this.list();
      },
      changePage : function(n) {
          this.listState.currentPage = n > 0 ? n - 1 : n;
          this.list();
      },
    }
  }
</script>

<style scoped>
    .delete {margin-left:15px;}
</style>
