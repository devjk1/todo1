<template>
    <div class="container border">
        <div class="row d-flex align-items-center border-bottom">
            <div class="col-sm-8">{{ list.title }}</div>
            <a  href="#"
                class="col-sm-2 btn btn-success"
            >
                Add Todo
            </a>
            <a  href="#"
                class="col-sm-2 btn btn-danger"
            >
                Delete TodoList
            </a>
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
        }
    },
    props: {
        list: {
            type: Object,
        }
    },
    created() {
        axios.get(`/users/${this.list.user_id}/todolists/${this.list.id}/todos`)
            .then(response => this.items = response.data)
            .catch(console.log('error'));
    },
}
</script>
