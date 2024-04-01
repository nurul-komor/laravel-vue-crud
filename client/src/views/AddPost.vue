<script setup>
import axios from 'axios';
import Title from './components/Title.vue';

</script>
<template>
    <div>
        <Title>
            Add Post
        </Title>
        <form @submit="submit">
            <div class="p-5">
                <div>
                    <label>Title</label>
                    <br>
                    <input type="text" v-model="formData.title" class="p-1 px-2">
                </div>
                <br>
                <div>
                    <label>Description</label>
                    <br>
                    <input type="text" v-model="formData.description" class="p-1 px-2">
                </div>
                <br>
                <button type="submit" class="bg-blue-400 px-2 py-1 rounded cursor-pointer">Submit</button>
            </div>
        </form>
    </div>
</template>

<script>
export default {
    data() {
        return {
            formData: {
                title: '',
                description: '',
            }
        }
    },
    methods: {
        submit(e) {
            e.preventDefault();
            axios.post(`${import.meta.env.VITE_SERVER_URI}/api/post/store`, this.formData)
                .then(response => {
                    alert(response.data)
                })
                .catch(error => {
                    console.log(error);
                })
        }
    }
}
</script>


<style lang="scss" scoped></style>