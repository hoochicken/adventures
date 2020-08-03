<template>
    <div>
        <form>

            {{ heroclass }}
            <div class="form-group row form-horizontal">
                <label for="id" class="col-sm-2 col-form-label">ID</label><input id="id" class="form-control col-sm-10" v-model="item.id"/>
            </div>
             <div class="form-group row form-horizontal">
                <label for="name" class="col-sm-2 col-form-label">name</label><input id="name" class="form-control col-sm-10" v-model="item.name"/>
            </div>
            <!--div class="form-group row form-horizontal">
                <label for="type" class="col-sm-2 col-form-label">type</label><input id="type" class="form-control col-sm-10" v-model="item.type"/>
            </div-->
             <div class="form-group row form-horizontal">
                <label for="class" class="col-sm-2 col-form-label">class</label><!--input id="class" class="form-control col-sm-10" v-model="item.class"/-->
                 <select id="class" class="form-control col-sm-10" required v-model="item.class">
                     <option value=""> - please choose - </option>
                     <option v-for="hcls in heroclass" :key="hcls.id" :value="hcls.id">{{ hcls.label }} ({{ hcls.id }})</option>
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
            <div class="d-flex align-content-end">
                <button class="btn btn-primary" @click="createHero">Create</button>
            </div>
        </form>
        <div v-if="0 < errors.length" class="alert alert-danger">
            <p>Folgende Fehler sind aufgefallen:</p>
            <ul>
                <li v-for="(error, index) in errors" :key="index">{{ error }}</li>
            </ul>
        </div>
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
                heroclass: {},
                errors: []
            }
        },
        async mounted () {
            let classResponse = await this.axios.post('/hero/getClass', {});
            this.heroclass = classResponse.data;
        },
        methods: {
            createHero: function(e) {
                if (!this.checkForm(e)) {
                    return false;
                }
            },
            checkForm: function (e) {
                this.errors = [];

                if (!this.item.name) {
                    this.errors.push("Name required.");
                }
                if (this.item.le < 1) {
                    this.errors.push('Lebensenergie muss groesser 0 sein.');
                }

                if (!this.errors.length) {
                    return true;
                }

                e.preventDefault();
            },
        }
    }
</script>

<style scoped>
    label::first-letter { text-transform: uppercase; }
    .alert {text-align:left;}
</style>
