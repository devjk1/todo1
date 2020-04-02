<template>
    <div class="container">
        <div    class="row"
                v-for="todo in todoData"
                :key="todo.id">
            <div class="col">{{ todo.description }}</div>
            <div class="col">{{ todo.due_at }}</div>
            <div class="col">{{ todo.completed }}</div>
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
