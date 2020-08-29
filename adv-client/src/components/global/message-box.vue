<template>
    <div><div v-if="hasSlotData" :class="'d-flex alert alert-' + msgtype">{{ $slots.default }}<slot></slot></div></div>
</template>

<script>
    export default {
        name: "message-box",
        props: {
            msgtype: {
                type: String,
                default: 'info',
            },
        },
        computed: {
            hasSlotData() {
                return this.$slots.default.text && this.$slots.default.text !== '{}';
            }
        }
    }
</script>

<style scoped>

</style>
