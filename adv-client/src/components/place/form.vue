<template>
    <div>
        <form>
            <div v-if="item.id > 0" class="form-group row form-horizontal">
                <label for="id" class="col-sm-2 col-form-label">ID</label><input id="id" readonly class="form-control col-sm-10" v-model="item.id"/>
            </div>
            <div class="form-group row form-horizontal">
                <label for="name" class="col-sm-2 col-form-label">name</label><input id="name" class="form-control col-sm-10" v-model="item.name"/>
            </div>
            <div class="form-group row form-horizontal">
                 <label for="description" class="col-sm-2 col-form-label">description</label><textarea id="description" class="form-control col-sm-10" v-model="item.description"></textarea>
            </div>
            <div v-if="0 < errors.length" class="alert alert-danger">
                <p>Folgende Fehler sind aufgefallen:</p>
                <ul>
                    <li v-for="(error, index) in errors" :key="index">{{ error }}</li>
                </ul>
            </div>
            <button-line :itemId="item.id" @create="saveItem" @cancel="$emit('cancel')" @update="saveItem" @delete="$emit('delete')"></button-line>
        </form>
    </div>
</template>

<script>
    import ButtonLine from "../global/button-line";
    export default {
        name: "place-form",
        components: {ButtonLine},
        props: {item: {}},
        data () {
            return {
                placetype: {},
                errors: []
            }
        },
        async mounted () {
            // let classResponse = await this.axios.post('/place/getClass', {});
            // this.placetype = classResponse.data;
        },
        methods: {
            saveItem: function() {
                if (!this.checkForm()) {
                    return false;
                }
                this.$emit('save', this.item);
            },
            checkForm: function () {
                this.errors = [];

                if (!this.item.name) this.errors.push("Name required.");
                if (!this.errors.length) return true;
            },
        }
    }
</script>

<style scoped>
    label::first-letter { text-transform: uppercase; }
    .alert {text-align:left;}
</style>
