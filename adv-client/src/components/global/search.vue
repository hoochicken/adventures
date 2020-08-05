<template>
    <div class="input-group">
        <input class="form-control" v-model="searchterm" v-on:keyup.enter="search" />
        <div class="input-group-append">
            <button class="input-group-text" @click="search">Search</button>
            <button class="input-group-text" @click="resetSearch">Reset</button>
        </div>
    </div>
</template>

<script>
    export default {
        name: "search",
        props: [],
        data () {
            return {
                searchterm: ''
            }
        },
        methods: {
            search () {
                this.$emit('search', this.searchterm);
            },
            resetSearch () {
                this.searchterm = '';
                this.$emit('resetSearch');
            }
        }
    }
</script>

<style scoped>

</style>
