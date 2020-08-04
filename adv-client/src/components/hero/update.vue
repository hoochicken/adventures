<template>
    <div>
        <h1>Update</h1>
        <hero-form :item=item @save="updateHero"></hero-form>
    </div>
</template>

<script>
    import HeroForm from "./form";
    export default {
        name: "hero-update",
        components: {HeroForm},
        data () {
            return {
                item: {
                    id: 0,
                    name: '',
                    type: 1,
                    class: 0,
                    description: '',
                    pic: '',
                    le: 0,
                    le_current: 0,
                    ae: 0,
                    ae_current: 0,
                    inventory: '',
                    weapon: 1,
                    at: 0,
                    pa: 0,
                    attributes: '{}',
                    state: 1
                },
                response: {}
            }
        },
        async mounted () {
            await this.getHero(this.$route.params.id)
        },
        methods: {
            async getHero(id) {
                this.response = await this.axios.get('/hero/get/' + id);
            },
            async updateHero(item) {
                var params = JSON.stringify(item);
                this.response = await this.axios.post('/hero/update', params);
            }
        }
    }
</script>

<style scoped>

</style>
