<template>
    <div class="container border">
        <div class="row d-flex align-items-center border-bottom">
            <div class="col-sm-8">{{ list.title }}</div>
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
            v-for="item in items"
            :key="item.id"
            :item="item"
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
                .catch(console.log("delete todoList error"));
        },
    },
    created() {
        axios.get(`/users/${this.user.id}/todolists/${this.list.id}/todos`)
            .then(response => this.items = response.data);
    },
}
</script>
