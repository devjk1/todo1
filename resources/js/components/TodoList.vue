<template>
    <div class="container border">
        <div class="row d-flex align-items-center border-bottom bg-secondary">
            <div class="col-sm-4">{{ list.title }}</div>
            <div class="col-sm-2">
                Due Date
            </div>
            <div class="col-sm-2">
                Completed
            </div>
            <a  :href="createTodoUrl"
                class="col-sm-2 btn btn-success"
            >
                Add Todo
            </a>
            <button class="col-sm-2 btn btn-danger"
                    @click="deleteTodoList"
            >
                Delete TodoList
            </button>
        </div>
        <todo
            v-for="(item, index) in items"
            :key="index"
            :item="item"
            @delete-todo="deleteTodo(index)"
        ></todo>
    </div>
</template>

<script>
import Todo from "./Todo";

export default {
    components: {
        Todo,
    },
    data() {
        return {
            items: null,
            createTodoUrl: `/users/${this.user.id}/todolists/${this.list.id}/todos/create`,
        }
    },
    props: {
        user: {
            type: Object,
        },
        list: {
            type: Object,
        }
    },
    methods: {
        deleteTodoList() {
            axios.delete(`/users/${this.user.id}/todolists/${this.list.id}/delete`)
                .catch(error => console.log(error))
                .then(this.$emit('delete-todo-list'));
        },
        deleteTodo(index) {
            this.items.splice(index, 1);
        },
    },
    created() {
        axios.get(`/users/${this.user.id}/todolists/${this.list.id}/todos`)
            .then(response => this.items = response.data);
    },
}
</script>
