<template>
    <div>
        {{ response }}
        <h1>Update</h1>
        <place-form :item=item @save="updatePlace" @close="$router.push('/place/list')" @delete="deletePlace"></place-form>
    </div>
</template>

<script>
    import PlaceForm from "./form";
    export default {
        name: "place-update",
        components: {PlaceForm},
        data () {
            return {
                item: {
                    id: 0,
                    name: '',
                    class: 0,
                    description: '',
                    state: 1
                },
                response: {}
            }
        },
        async mounted () {
            await this.getPlace(this.$route.params.id)
        },
        methods: {
            async getPlace(id) {
                this.response = await this.axios.get('/place/get/' + id);
                this.item = this.response.data;
            },
            async updatePlace(item) {
                let params = JSON.stringify(item);
                this.response = await this.axios.post('/place/update/' + item.id, params);
            },
            async deletePlace(id) {
                if (!confirm('Really delete this place???')) {
                    return;
                }
                await this.axios.post('/place/delete/' + id);
                this.$router.push('/place/list');
            }
        }
    }
</script>

<style scoped>

</style>
