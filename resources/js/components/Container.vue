<template>
    <div class="main">
        <Links/>
        <br/>
        <Home :jobs='jobs' :companies='companies' />
    </div>
</template>

<script>
    export default {
        name: "Container",
        props: {
            jobs: {
                type: Array,
                required: true
            },
            companies: {
                type: Array,
                required: true
            },
        },
        mounted() {
        }
    }
</script>
