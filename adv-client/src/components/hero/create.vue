<template>
    <div>
        <h1>Create</h1>
        <hero-form :item=item @save="createHero"></hero-form>
    </div>
</template>

<script>
    import HeroForm from "./form";
    export default {
        name: "hero-create",
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
        methods: {
            async createHero(item) {
                var params = JSON.stringify(item);
                this.response = await this.axios.post('/hero/create', params);
                this.$router.push('hero/update/' + this.response.data.id)
            }
        }
    }
</script>

<style scoped>

</style>
