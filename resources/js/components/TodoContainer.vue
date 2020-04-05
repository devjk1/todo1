<template>
    <div class="container border">
        <div class="row">
            <a  :href="createTodoListUrl"
                class="col-sm-2 btn btn-success"
            >
                Create TodoList
            </a>
        </div>
        <div class="row">
            <todo-list
                v-for="(list, index) in lists"
                :key=index
                :list="list"
                :user="user"
                @delete-todo-list="deleteTodoList(index)"
            ></todo-list>
        </div>
    </div>
</template>

<script>
import TodoList from "./TodoList";

export default {
    components: {
        TodoList,
    },
    data() {
        return {
            lists: null,
            createTodoListUrl: `/users/${this.user.id}/todolists/create`,
        }
    },
    props: {
        user: {
            type: Object,
        },
    },
    methods: {
        deleteTodoList(index) {
            this.lists.splice(index, 1);
        },
    },
    created() {
        axios.get(`/users/${this.user.id}/todolists`)
            .then(response => this.lists = response.data);
    },
}
</script>
