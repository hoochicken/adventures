<template>
    <div>
        <h1>Create</h1>
        <place-form :item=item @save="createPlace" @cancel="$router.push('/place/list')"></place-form>
        <message-box>{{ error }}</message-box>
    </div>
</template>

<script>
    import PlaceForm from "./form";
    import MessageBox from "../global/message-box";
    export default {
        name: "place-create",
        components: {MessageBox, PlaceForm},
        data () {
            return {
                item: {
                    id: 0,
                    name: '',
                    description: '',
                    state: 1
                },
                response: {},
                error: {}
            }
        },
        methods: {
            async createPlace(item) {
                try {
                    this.error = {};
                    var params = JSON.stringify(item);
                    this.response = await this.axios.post('/place/create', params);
                    this.$router.push('/place/update/' + this.response.data.id)
                } catch (error) {
                    this.error = error.response;
                }
            }
        }
    }
</script>

<style scoped>

</style>
