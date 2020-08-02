<template>
    <div>
        <form>
            <div class="form-group">
                <input class="form-control" v-bind="id"/>
                <input class="form-control" v-bind="name"/>
                <input class="form-control" v-bind="type"/>
                <input class="form-control" v-bind="class" />
                <input class="form-control" v-bind="description"/>
                <input class="form-control" v-bind="pic"/>
                <input class="form-control" v-bind="le"/>
                <input class="form-control" v-bind="le_current"/>
                <input class="form-control" v-bind="ae"/>
                <input class="form-control" v-bind="ae_current"/>
                <input class="form-control" v-bind="inventory"/>
                <input class="form-control" v-bind="weapon"/>
                <input class="form-control" v-bind="at"/>
                <input class="form-control" v-bind="pa"/>
                <input class="form-control" v-bind="attributes"/>
                <input class="form-control" v-bind="state"/>
            </div>
        </form>
    </div>
</template>

<script>
    export default {
        name: "hero-form",
        data () {
            return {
                id: 0,
                name: '',
                type: 0,
                class: 0,
                description: '',
                pic: '',
                le: '',
                le_current: '',
                inventory: '',
                weapon: 1,
                at: 0,
                pa: 0,
                attributes: {},
                state: true
            }
        }
    }
</script>

<style scoped>

</style>
