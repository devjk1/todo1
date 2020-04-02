<template>
    <div class="row d-flex align-items-center border-top">
        <div class="col-sm-6">{{ item.description }}</div>
        <div class="col-sm-2"></div>
        <div class="col-sm-2"></div>
        <a  href=""
            class="col-sm-1 btn btn-primary"
        >
            Edit
        </a>
        <a  href=""
            class="col-sm-1 btn btn-danger"
        >
            Delete
        </a>
    </div>
</template>

<script>
export default {
    data() {
        return {

        }
    },
    props: {
        item: {
            type: Object,
        }
    },
}
</script>
