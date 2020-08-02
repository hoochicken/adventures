<template>
    <div>
        <form>
            <div class="form-group">
                <input class="form-control" v-bind="item.id"/>
                <input class="form-control" v-bind="item.name"/>
                <input class="form-control" v-bind="item.type"/>
                <input class="form-control" v-bind="item.class" />
                <input class="form-control" v-bind="item.description"/>
                <input class="form-control" v-bind="item.pic"/>
                <input class="form-control" v-bind="item.le"/>
                <input class="form-control" v-bind="item.le_current"/>
                <input class="form-control" v-bind="item.ae"/>
                <input class="form-control" v-bind="item.ae_current"/>
                <input class="form-control" v-bind="item.inventory"/>
                <input class="form-control" v-bind="item.weapon"/>
                <input class="form-control" v-bind="item.at"/>
                <input class="form-control" v-bind="item.pa"/>
                <input class="form-control" v-bind="item.attributes"/>
                <input class="form-control" v-bind="item.state"/>
            </div>
        </form>
    </div>
</template>

<script>
    export default {
        name: "hero-form",
        data () {
            return {
                item: {
                    id: 0,
                    name: '',
                    type: 0,
                    class: 0,
                    description: '',
                    pic: '',
                    le: '',
                    le_current: '',
                    ae: '',
                    ae_current: '',
                    inventory: '',
                    weapon: 1,
                    at: 0,
                    pa: 0,
                    attributes: {},
                    state: true
                }
            }
        }
    }
</script>

<style scoped>

</style>
