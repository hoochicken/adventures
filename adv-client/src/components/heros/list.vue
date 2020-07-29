<template>
    <div class="container">
        <h1>Heros</h1>
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
                    <td><button class="btn btn-secondary" @click="decrease(item.id)">-1</button></td>
                </tr>
            </template>
            </tbody>
        </table>
        <a class="btn btn-primary">Add Hero</a>

        <div class="alert alert-success alert-dismissible fade show" role="alert">
            With Bootstrap!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
</template>

<script>
  export default {
    data() {
      return {
        heros: {},
        currentId: 0,
          response: {}
      }
    },
    async mounted () {
      this.get()
    },
    methods: {
      async decrease(id) {
          this.currentId = id;
          var params = new URLSearchParams();
          params.append('id', id);
          this.response = await this.axios.post('/hero/decrease', params);
          this.get();
      },
      async get() {
          const response = await this.axios.get('/heros');
          this.heros = response.data
      }
    }
  }
</script>
