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
                 <select id="class" class="form-control col-sm-10" required v-model="item.class">
                     <option value="0"> - please choose - </option>
                     <option v-for="hcls in heroclass" :key="hcls.id" :selected="hcls.id === item.class" :value="hcls.id">{{ hcls.label }} ({{ hcls.id }})</option>
                 </select>
            </div>
            <div class="form-group row form-horizontal">
                 <label for="description" class="col-sm-2 col-form-label">description</label><textarea id="description" class="form-control col-sm-10" v-model="item.description"></textarea>
            </div>
            <div class="form-group row form-horizontal">
                <label for="pic" class="col-sm-2 col-form-label">pic</label><input id="pic" class="form-control col-sm-10" v-model="item.pic"/>
            </div>
            <div class="form-group row form-horizontal">
                <label for="le" class="col-sm-2 col-form-label">le</label><input id="le" type="number" class="form-control col-sm-5" v-model.number="item.le"/><input id="le_current" type="number" class="form-control col-sm-5" v-model.number="item.le_current"/>
            </div>
            <div class="form-group row form-horizontal">
                <label for="ae" class="col-sm-2 col-form-label">ae</label><input  id="ae" type="number" class="form-control col-sm-5" v-model.number="item.ae"/><input id="ae_current" type="number" class="form-control col-sm-5" v-model.number="item.ae_current"/>
            </div>
            <div class="form-group row form-horizontal">
                <label for="inventory" class="col-sm-2 col-form-label">inventory</label><input id="inventory" class="form-control col-sm-10" v-model="item.inventory"/>
            </div>
            <div class="form-group row form-horizontal">
                <label for="weapon" class="col-sm-2 col-form-label">weapon</label><input id="weapon" class="form-control col-sm-10" v-model="item.weapon"/>
            </div>
            <div class="form-group row form-horizontal">
                <label for="at" class="col-sm-2 col-form-label">at</label><input id="at" type="number" class="form-control col-sm-10" v-model.number="item.at"/>
            </div>
            <div class="form-group row form-horizontal">
                <label for="pa" class="col-sm-2 col-form-label">pa</label><input id="pa" type="number" class="form-control col-sm-10" v-model.number="item.pa"/>
            </div>
            <div class="form-group row form-horizontal">
                 <label for="attributes" class="col-sm-2 col-form-label">attributes</label><textarea id="attributes" class="form-control col-sm-10" v-model="item.attributes"></textarea>
            </div>
            <div class="form-group row form-horizontal">
                <label for="state" class="col-sm-2 col-form-label">state</label><input id="state" type="number" class="form-control col-sm-10" v-model.number="item.state"/>
            </div>
            <div v-if="0 < errors.length" class="alert alert-danger">
                <p>Folgende Fehler sind aufgefallen:</p>
                <ul>
                    <li v-for="(error, index) in errors" :key="index">{{ error }}</li>
                </ul>
            </div>
            <div class="d-flex justify-content-end">
                <button v-if="item.id > 0" class="btn btn-primary" @click="saveItem">Update</button>
                <button v-else class="btn btn-primary" @click="saveItem">Create</button>
                <button class="btn btn-danger" @click="$emit('close')">Close</button>
            </div>
        </form>
    </div>
</template>

<script>
    export default {
        name: "hero-form",
        props: {item: {}},
        data () {
            return {
                heroclass: {},
                errors: []
            }
        },
        async mounted () {
            let classResponse = await this.axios.post('/hero/getClass', {});
            this.heroclass = classResponse.data;
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
                if (!this.item.class) this.errors.push('Your hero must have a class.');
                if (this.item.le < 1) this.errors.push('Life energy must be greater than 0.');
                if (this.item.ae < 1) this.errors.push('Astral energy must be greater than 0.');
                if (this.item.at < 1) this.errors.push('Attack value must be greater than 0.');
                if (this.item.pa < 1) this.errors.push('Parade value must be greater than 0.');

                if (!this.errors.length) return true;
            },
        }
    }
</script>

<style scoped>
    label::first-letter { text-transform: uppercase; }
    .alert {text-align:left;}
    .justify-content-end {
        -webkit-box-pack: end !important;
        -ms-flex-pack: end !important;
        justify-content: flex-end !important;
    }
</style>
