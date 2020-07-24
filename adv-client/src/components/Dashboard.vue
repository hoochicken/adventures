<template>
    <div class="container">
        {{ heros}}
        {{ movies}}
        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Count</th>
            </tr>
            </thead>
            <tbody>
            <template v-for="movie in movies">
                <tr v-bind:key="movie.id">
                    <td>{{ movie.id }}</td>
                    <td>{{ movie.title }}</td>
                    <td>{{ movie.count }}</td>
                </tr>
            </template>
            </tbody>
        </table>
        <a class="button is-primary">Add Movie</a>
        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Count</th>
            </tr>
            </thead>
            <tbody>
            <template v-for="item in heros">
                <tr v-bind:key="item.id">
                    <td>{{ item.id }}</td>
                    <td>{{ item.name}}</td>
                    <td>{{ item.le }}</td>
                </tr>
            </template>
            </tbody>
        </table>
        <a class="button is-primary">Add Hero</a>
    </div>
</template>

<script>
  import axios from 'axios'

  export default {
    data() {
      return {
        movies: {},
        heros: {}
      }
    },
    async mounted () {
      const response = await axios.get('http://localhost:8000/movies')
      this.movies = response.data
      const response2 = await axios.get('http://localhost:8000/heros')
      this.heros = response2.data
    }
  }
</script>
