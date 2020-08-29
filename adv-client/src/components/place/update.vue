<template>
    <div>
        <h1>Update</h1>
        <place-form :item=item @save="updatePlace" @cancel="$router.push('/place/list')" @delete="deletePlace"></place-form>
        <message-box>{{ error }}</message-box>
    </div>
</template>

<script>
    import PlaceForm from "./form";
    import MessageBox from "../global/message-box";
    export default {
        name: "place-update",
        components: {MessageBox, PlaceForm},
        data () {
            return {
                item: {
                    id: 0,
                    name: '',
                    class: 0,
                    description: '',
                    state: 1
                },
                response: {},
                error: {},
                msgtype: 'info'
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
                try {
                    let params = JSON.stringify(item);
                    this.response = await this.axios.post('/place/update/' + item.id, params);
                } catch (error) {
                    this.error = error.response;
                }
            },
            async deletePlace() {
                if (!confirm('Really delete this place???')) {
                    return;
                }
                try {
                    await this.axios.post('/place/delete/' + this.item.id);
                } catch (error) {
                    this.error = error.response;
                }
            }
        }
    }
</script>

<style scoped>

</style>
