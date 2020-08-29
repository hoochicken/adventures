<template>
    <div id="app">
        <div class="d-flex">
            <img alt="Vue logo" src="./assets/logo.png" style="height:30px;">
            <h1>Adventures</h1>
        </div>
        <template>
            <div class="container">
                <router-view></router-view>
            </div>
        </template>

    </div>
</template>

<script>


    export default {
        name: 'App',

    }
</script>

<style>
    #app {
        font-family: Avenir, Helvetica, Arial, sans-serif;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
        color: #2c3e50;
        margin-top: 60px;
    }
</style>
