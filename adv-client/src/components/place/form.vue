<template>
    <div>
        <form>
            <div v-if="item.id > 0" class="form-group row form-horizontal">
                <label for="id" class="col-sm-2 col-form-label">ID</label><input id="id" class="form-control col-sm-10" v-model="item.id"/>
            </div>
            <div class="form-group row form-horizontal">
                <label for="name" class="col-sm-2 col-form-label">name</label><input id="name" class="form-control col-sm-10" v-model="item.name"/>
            </div>
            <div class="form-group row form-horizontal">
                <label for="class" class="col-sm-2 col-form-label">class</label><!--input id="class" class="form-control col-sm-10" v-model="item.class"/-->
                 <select id="type" class="form-control col-sm-10" required v-model="item.type">
                     <option value="0"> - please choose - </option>
                     <option v-for="hcls in placetype" :key="hcls.id" :selected="hcls.id === item.class" :value="hcls.id">{{ hcls.label }} ({{ hcls.id }})</option>
                 </select>
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
            <div class="">
                <button v-if="item.id > 0" class="btn btn-success float-right" @click="saveItem">Update</button>
                <button v-else class="btn btn-success float-right" @click="saveItem">Create</button>
                <button class="btn btn-warning float-right" @click="$emit('close')">Cancel</button>
                <button v-if="item.id > 0" class="btn btn-danger float-left" @click="$emit('delete', item.id)">Delete</button>
            </div>
        </form>
    </div>
</template>

<script>
    export default {
        name: "place-form",
        props: {item: {}},
        data () {
            return {
                placetype: {},
                errors: []
            }
        },
        async mounted () {
            let classResponse = await this.axios.post('/place/getClass', {});
            this.placetype = classResponse.data;
        },
        methods: {
            saveItem: function(e) {
                e.preventDefault();
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
