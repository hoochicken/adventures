<template>
    <div class="container">
        <h1>Heros</h1>
        <search @resetSearch="resetSearch" @search="search" />
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>LE</th>
                <th>gerade</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <template v-for="item in heros">
                <tr v-bind:key="item.id" v-bind:class="(currentId === item.id) ? 'bg-dark text-light' : ''">
                    <td>{{ item.id }}</td>
                    <td>{{ item.name}}</td>
                    <td>{{ item.le }}</td>
                    <td>{{ item.le_current }}</td>
                    <td><button class="btn btn-success text-white update" @click="updateHero(item.id)">Update</button><button class="btn btn-danger delete" @click="deleteHero(item.id)">Delete</button></td>
                </tr>
            </template>
            </tbody>
        </table>
        <pagination :totalPage="listState.totalPage" @btnClick="goToFunction"></pagination>
        <button class="btn btn-success " @click="$router.push('/hero/create')">Create New Hero</button>

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
    name: 'hero-list',
      components: {Search},
      data() {
        return {
            heros: [],
            currentId: 0,
            response: {},
            searchterm: '',
            listState: {
                totalPage: 10,

            }
            // exampleItems: [...Array(150).keys()].map(i => ({ id: (i+1), name: 'Item ' + (i+1) }))
        }
    },
    async mounted () {
      this.list()
    },
    methods: {
      async decrease(id) {
          this.currentId = id;
          var params = new URLSearchParams();
          params.append('id', id);
          this.response = await this.axios.post('/hero/decrease', params);
          this.list();
      },
      async list() {
          let params = new URLSearchParams();
          params.append('searchterm', this.searchterm);
          // console.log(params.get('searchterm'));
          const response = await this.axios.post('/hero/list', params);
          this.heros = response.data;
      },
      async deleteHero(id) {
          if (!confirm('Really delete this hero???')) {
              return;
          }
          await this.axios.post('/hero/delete/' + id);
          this.list();
      },
      updateHero(id) {
          this.$router.push('/hero/update/' + id);
      },
      async search(searchterm) {
          this.searchterm = searchterm;
          this.list();
      },
      async resetSearch() {
          this.searchterm = '';
      },
      onChangePage(heros) {
          this.heros = heros;
      },
      goToFunction : function(n)
      {
          console.log(n);
      },
      goToFuncWithData : function(n, data)
      {
          console.log(n, data);
      },
      goToFuncWithMultipleData : function(n, data)
      {
          console.log(n, data[0], data[1]);
      }
    }
  }
</script>

<style scoped>
    .delete {margin-left:15px;}
</style>
