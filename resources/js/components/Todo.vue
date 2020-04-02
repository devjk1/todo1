<template>
    <div>
        <div    class="row d-flex align-items-center border-bottom"
                v-for="todo in todoData"
                :key="todo.id"
        >
            <div class="col-sm-6">{{ todo.description }}</div>
            <div class="col-sm-2">{{ todo.due_at }}</div>
            <div class="col-sm-2">{{ todo.completed }}</div>
            <button type="button"
                    class="col-sm-1 btn btn-outline-primary"
            >
                Edit
            </button>
            <button type="button"
                    class="col-sm-1 btn btn-outline-danger"
            >
                Delete
            </button>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            todos: null,
        }
    },
    props: {
        todoData: {
            type: Array,
        },
    },
}
</script>
