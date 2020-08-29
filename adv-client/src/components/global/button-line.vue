<template>
    <div :class="'d-flex mb-3 ' + (itemId > 0 ? 'justify-content-end' : 'justify-content-end')">
        <div v-if="itemId > 0" class="mr-auto btn btn-danger" @click="$emit('delete', itemId)">Delete</div>
        <button class="btn btn-warning mr-3" @click="$emit('cancel')">Cancel</button>
        <div v-if="itemId > 0" class="btn btn-success" @click="$emit('update', itemId)">Update</div>
        <div v-else class="btn btn-success" @click="$emit('create')">Create</div>
    </div>
</template>

<script>
    export default {
        name: "button-line",
        props: {
            itemId: {
                type: Number,
                default: 0
            }
        }
    }
</script>

<style scoped>

</style>
