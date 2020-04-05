<template>
    <div class="row d-flex align-items-center border-top">
        <div class="col-sm-4">{{ item.description }}</div>
        <div class="col-sm-2">{{ item.due_at }}</div>
        <div class="col-sm-2">{{ item.completed }}</div>
        <button class="col-sm-2 btn btn-outline-success">Complete Todo</button>
        <a  :href="editTodoUrl"
            class="col-sm-1 btn btn-outline-primary"
        >
            Edit
        </a>
        <a  href=""
            class="col-sm-1 btn btn-outline-danger"
        >
            Delete
        </a>
    </div>
</template>

<script>
export default {
    data() {
        return {
            editTodoUrl: `/users/${this.item.user_id}/todolists/${this.item.todo_list_id}/todos/${this.item.id}/edit`,
        }
    },
    props: {
        item: {
            type: Object,
        }
    },
}
</script>
