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
                v-for="list in lists"
                :key=list.id
                :list="list"
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
            createTodoListUrl: `/users/${this.user.id}/todolists/create`,
        }
    },
    props: {
        user: {
            type: Object,
        },
        lists: {
            type: Array,
        },
    },
}
</script>
