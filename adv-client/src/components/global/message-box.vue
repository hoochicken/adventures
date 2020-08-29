<template>
    <div :class="'d-flex alert alert-' + msgtype"><slot></slot></div>
</template>

<script>
    export default {
        name: "message-box",
        props: {
            msgtype: {
                type: String,
                default: 'info',
            },
        }
    }
</script>

<style scoped>

</style>
