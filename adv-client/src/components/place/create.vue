<template>
    <div>
        <h1>Create</h1>
        <place-form :item=item @save="createPlace" @close="$router.push('/place/list')"></place-form>
    </div>
</template>

<script>
    import PlaceForm from "./form";
    export default {
        name: "place-create",
        components: {PlaceForm},
        data () {
            return {
                item: {
                    id: 0,
                    name: '',
                    type: 1,
                    description: '',
                    state: 1
                },
                response: {}
            }
        },
        methods: {
            async createPlace(item) {
                var params = JSON.stringify(item);
                this.response = await this.axios.post('/place/create', params);
                this.$router.push('/place/update/' + this.response.data.id)
            }
        }
    }
</script>

<style scoped>

</style>
