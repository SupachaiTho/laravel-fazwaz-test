  
<style lang="scss">
.pagination {
    justify-content: flex-end !important;
    .page-stats {
        align-items: center;
        margin-right: 5px;
    }
    i {
        color: #3273dc !important;
    }
}
</style>

<template>
    <nav class="pagination" v-if="!client">
        <span class="page-stats">{{pagination.from}} - {{pagination.to}} of {{pagination.total}}</span>
        <a v-if="pagination.prevPageUrl" class="mx-2 btn btn-outline-primary btn-sm pagination-previous" @click="$emit('prev');">
            Prev
        </a>
        <a class="mx-2 btn btn-outline-primary btn-sm pagination-previous disabled" v-else :disabled="true">
           Prev
        </a>

        <a v-if="pagination.nextPageUrl" class="btn btn-outline-primary btn-sm pagination-next" @click="$emit('next');">
            Next
        </a>
        <a class="btn btn-outline-primary btn-sm pagination-next disabled" v-else :disabled="true">
            Next
        </a>
    </nav>
</template>

<script>
    export default {
        props: ['pagination', 'client', 'filtered']
    }
</script>