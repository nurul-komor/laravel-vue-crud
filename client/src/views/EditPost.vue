<script setup>
import Title from './components/Title.vue';
import axios from 'axios';
</script>
<template>
    <div>
        <Title>
            Edit Post
        </Title>
        <form @submit="submit">
            <div class="p-5">
                <div>
                    <label>Title</label>
                    <br>
                    <input type="text" v-model="input.title" class="p-1 px-2">
                </div>
                <br>
                <div>
                    <label>Description</label>
                    <br>
                    <input type="text" v-model="input.description" class="p-1 px-2">
                </div>
                <br>
                <button type="submit" class="bg-blue-400 px-2 py-1 rounded cursor-pointer">Update</button>
            </div>
        </form>
    </div>
</template>

<script>
export default {
    methods: {
        submit(e) {
            e.preventDefault();
            const formData = new FormData();
            formData.append('_method', "PATCH")
            formData.append('title', this.input.title);
            formData.append('description', this.input.description);
            axios.post(`${import.meta.env.VITE_SERVER_URI}/api/post/update/${this.postId}`, formData)
                .then((res) => alert('post updated'))
                .catch((err) => console.log(err));
        },
        fetchPost() {
            axios.get(import.meta.env.VITE_SERVER_URI + "/api/post/" + this.postId)
                .then((res) => this.input = res.data)
                .catch((err) => console.log(err))
        }
    },
    data() {
        return {
            input: {
                title: '',
                description: ''
            },
            postId: null
        }
    },
    mounted() {
        this.postId = this.$route.params.id; //initializing post id
        this.fetchPost()
    }
}
</script>

<style scoped></style>